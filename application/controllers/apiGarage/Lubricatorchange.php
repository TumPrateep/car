<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorchange extends BD_Controller {
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('Lubricatorchangegarages');
    }

    public function createLubricatorchangegarage_post(){
        $lubricator_price = $this->post('lubricator_price');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->Lubricatorchangegarages->data_check_create();
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
            "model" => $this->Lubricatorchangegarages,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_get(){
        $lubricator_changeId = $this->get('lubricator_changeId');
        $garageId = $this ->get('garageId');
        $data_check = $this->Lubricatorchangegarages->getUpdate($lubricator_changeId,$garageId);
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
    public function update_post(){
        $lubricator_changeId = $this->post('lubricator_changeId');
        $garageId = $this->post('garageId');
        $lubricator_price = $this->post('lubricator_price');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->Lubricatorchangegarage->getLubricatorChangeById($lubricator_changeId,$garageId);
        $data_check = $this->Lubricatorchangegarage->data_check_update($lubricator_changeId,$garageId);

        $data = array(
            'lubricator_changeId' => $lubricator_changeId,
            'garageId' => $garageId,
            'lubricator_price'  => $lubricator_price,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->Lubricatorchangegarage,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deleteLubricatorchangegarage_get(){
        $lubricator_changeId = $this->get('lubricator_changeId');
        $garageId = $this->get('garageId');
        $data_check = $this->Lubricatorchangegarages->getLubricatorChangeById($lubricator_changeId,$garageId);


        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricator_changeId,
            "data" => $garageId,
            "model" => $this->Lubricatorchangegarages,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function searchLubricatorChange_post(){
        $columns = array( 
            0 => null,
            1 => 'lubricator_changeId'
        );
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->Lubricatorchangegarages->allLubricatorschanges_count($garageId);
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricator_price')))
        {            
            $posts = $this->Lubricatorchangegarages->allLubricatorchanges($limit,$start,$order,$dir,$garageId);
        }
        else {
            $search = $this->post('lubricator_price');
            $posts =  $this->Lubricatorchangegarages->lubricatorchanges_search($limit,$start,$search,$order,$dir,$status,$garageId);
            $totalFiltered = $this->Lubricatorchangegarages->lubricatorchanges_search_count($search,$status,$garageId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['lubricator_changeId'] = $post->lubricator_changeId;
                $nestedData['garageId'] = $post->garageId;
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

}
