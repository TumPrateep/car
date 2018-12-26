<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class TireChangegarage extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
        $this->load->model('tirechangesgarge');
    }

    public function createtirechange_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $tire_front = $this->post('tire_front');
        $tire_back = $this->post('tire_back');
        $rimId = $this->post('tire_rimId');
        $garageId = $this->post('garageId');
        $data = array();

        $data_check = $this->tirechangesgarge->data_check_create($rimId);
        $data = array(
            'tire_front' => $tire_front,
            'tire_back'  => $tire_back,
            'rimId' => $rimId,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1,
            'garageId' => $gargeId
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tirechangesgarge,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $tire_front = $this->post('tire_front');
        $tire_back = $this->post('tire_back');
        $rimId = $this->post('rimId');
        //$gargeId = $this->post('gargeId');
        $tire_changeId = $this->post('tire_changeId');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->tirechangesgarge->getTireChangeById($tire_changeId);
        $data_check = $this->tirechangesgarge->data_check_update($tire_changeId,$rimId);
        $data = array(
            'tire_changeId' => $tire_changeId,
            'tire_front' => $tire_front,
            'tire_back' => $tire_back,
            'rimId' => $rimId,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tirechangesgarge,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deletetirechange_get(){
        $tire_changeId = $this->get('tire_changeId');
        $data_check = $this->tirechangesgarge->getTireChangeById($tire_changeId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $tire_changeId,
            "model" => $this->tirechangesgarge,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    public function getalltirechange_post(){
        $tire_changeId = $this->post('tire_changeId');
        $this->set_response($isCheck, REST_Controller::HTTP_OK);
        $getAlldata = $this->tirechangesgarge->getallTire($tire_changeId);
        if($getAlldata != null){
            $output["data"] = $getAlldata;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function searchTireChange_post(){
        $columns = array( 
            0 => null,
            1 => 'tire_front', 
            2 => 'tire_back',
            3 => 'rimName',
            4 => 'status'
        );
        $garageId = $this->session->userdata['logged_in']['garageId'];

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->tirechanges->allTirechanges_count($garageId);
        $totalFiltered = $totalData; 
        if(empty($this->post('rimName')))
        {            
            $posts = $this->tirechangesgarge->allTirechanges($limit,$start,$order,$dir,$garageId);
        }
        else {
            $search = $this->post('rimName');
            $status = $this->post('status');
            $posts =  $this->tirechangesgarge->tirechanges_search($limit,$start,$search,$order,$dir,$status,$garageId);
            $totalFiltered = $this->tirechangesgarge->tirechanges_search_count($search,$status,$garageId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['tire_changeId'] = $post->tire_changeId;
                $nestedData['tire_front'] = $post->tire_front;
                $nestedData['tire_back'] = $post->tire_back;
                $nestedData['rimName'] = $post->rimName;
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

    function changeStatus_post(){
        $tire_changeId = $this->post('tire_changeId');
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->tirechangesgarge->getTireChangeById($tire_changeId);
        $data = array(
            'tire_changeId' => $tire_changeId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->tirechangesgarge
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }  
    
    function getTireChange_get(){
        $tire_changeId = $this->get('tire_changeId');
        $data_check = $this->tirechangesgarge->getUpdate($tire_changeId);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
}