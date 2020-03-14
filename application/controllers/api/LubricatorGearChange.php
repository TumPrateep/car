<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorgearchange extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('lubricatorgearchanges');
    }

    function searchLubricatorGearChange_post(){
        $columns = array( 
            0 => null,
            1 => 'lubricator_gear_changeId', 
            2 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->lubricatorgearchanges->allLubricatorsgearchanges_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricator_gear_changeId')) && empty($this->post('status')))
        {            
            $posts = $this->lubricatorgearchanges->allLubricatorgearchanges($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('lubricator_gear_changeId');
            $status = $this->post('status');
            $posts =  $this->lubricatorgearchanges->lubricatorgearchanges_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->lubricatorgearchanges->lubricatorgearchanges_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['lubricator_gear_changeId'] = $post->lubricator_gear_changeId;
                $nestedData['lubricator_gear_price'] = $post->lubricator_gear_price;
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

    public function createLubricatorgearchange_post(){
        $lubricator_gear_price = $this->post('lubricator_gear_price');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->lubricatorgearchanges->data_check_create();
        $data = array(
            'lubricator_gear_changeId' => null,
            'lubricator_gear_price'  => $lubricator_gear_price,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorgearchanges,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_get(){
        $lubricator_gear_changeId = $this->get('lubricator_gear_changeId');
        $data_check = $this->lubricatorgearchanges->getUpdate($lubricator_gear_changeId);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $lubricator_gear_changeId = $this->post('lubricator_gear_changeId');
        $lubricator_gear_price = $this->post('lubricator_gear_price');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->lubricatorgearchanges->getLubricatorChangeById($lubricator_gear_changeId);
        $data_check = $this->lubricatorgearchanges->data_check_update($lubricator_gear_changeId);
        $data = array(
            'lubricator_gear_changeId' => $lubricator_gear_changeId,
            'lubricator_gear_price'  => $lubricator_gear_price,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorgearchanges,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deleteLubricatorgearChange_get(){
        $lubricator_gear_changeId = $this->get('lubricator_gear_changeId');
        $data_check = $this->lubricatorgearchanges->getLubricatorChangeById($lubricator_gear_changeId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricator_gear_changeId,
            "model" => $this->lubricatorgearchanges,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

}