<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class LubricatorChange extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('lubricatorchanges');
    }

    function searchLubricatorChange_post(){
        $columns = array( 
            0 => null,
            1 => 'lubricator_changeId', 
            2 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->lubricatorchanges->allLubricatorschanges_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricator_changeId')) && empty($this->post('status')))
        {            
            $posts = $this->lubricatorchanges->allLubricatorchanges($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('lubricator_changeId');
            $status = $this->post('status');
            $posts =  $this->lubricatorchanges->lubricatorchanges_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->lubricatorchanges->lubricatorchanges_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['lubricator_changeId'] = $post->lubricator_changeId;
                $nestedData['lubricator_price'] = $post->lubricator_price;
                $nestedData['status'] = $post->status;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($this->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );
        $this->set_response($json_data);
    }

    public function createLubricatorchange_post(){
        $lubricator_price = $this->post('lubricator_price');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->lubricatorchanges->data_check_create();
        $data = array(
            'lubricator_changeId' => null,
            'lubricator_price'  => $lubricator_price,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorchanges,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_get(){
        $lubricator_changeId = $this->get('lubricator_changeId');
        $data_check = $this->lubricatorchanges->getUpdate($lubricator_changeId);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $lubricator_changeId = $this->post('lubricator_changeId');
        $lubricator_price = $this->post('lubricator_price');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->lubricatorchanges->getLubricatorChangeById($lubricator_changeId);
        $data_check = $this->lubricatorchanges->data_check_update($lubricator_changeId);
        $data = array(
            'lubricator_changeId' => $lubricator_changeId,
            'lubricator_price'  => $lubricator_price,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorchanges,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deleteLubricatorChange_get(){
        $lubricator_changeId = $this->get('lubricator_changeId');
        $data_check = $this->lubricatorchanges->getLubricatorChangeById($lubricator_changeId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricator_changeId,
            "model" => $this->lubricatorchanges,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

}