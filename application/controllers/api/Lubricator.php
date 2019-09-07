<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricator extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricators");
    }
    function searchLubricator_post(){
        $lubricator_brandId = $this->post('lubricator_brandId');
        $columns = array( 
            0 => null,
            1 =>'lubricatorName',
            2 =>'lubricator_number',
            3 =>'lubricator_gear',
            4 =>'status',
            5 =>'lubricatortypeFormachine'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        
        $totalData = $this->lubricators->allLubricators_count($lubricator_brandId);
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricatorName')) && empty($this->post('status')))
        {            
            $posts = $this->lubricators->allLubricators($limit,$start,$order,$dir,$lubricator_brandId);
        }
        else {
            $search = $this->post('lubricatorName');
            $status = $this->post('status');
            $posts =  $this->lubricators->Lubricator_search($limit,$start,$search,$order,$dir,$status,$lubricator_brandId);
            $totalFiltered = $this->lubricators->Lubricator_search_count($search,$status,$lubricator_brandId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['lubricatorId'] = $post->lubricatorId;
                $nestedData['lubricator_brandId'] = $post->lubricator_brandId;
                $nestedData['lubricatorName'] = $post->lubricatorName;
                // $nestedData['lubricator_numberId'] = $post->lubricator_numberId;
                $nestedData['status'] = $post->status;
                $nestedData['machine'] = $post->machine_type;
                $nestedData['lubricator_number'] = $post->lubricator_number;
                $nestedData['api'] = $post->api;
                $nestedData['capacity'] = $post->capacity;
                $nestedData['lubricator_picture'] = $post->lubricator_picture;
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
        $lubricatorId = $this->post("lubricatorId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'lubricatorId' => $lubricatorId,
            'status' => $status,
            'activeFlag' => 1
        );
        $data_check_update = $this->lubricators->getlubricatorbyId($lubricatorId);

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->lubricators
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

    function createlubricator_post(){
        $lubricatorName = $this->post("lubricatorName");
        $lubricator_brandId = $this->post("lubricator_brandId");
        $lubricator_numberId = $this->post("lubricator_number");
        $lubricator_gear = $this->post("lubricator_gear");
        $api = $this->post('api');
        $capacity = $this->post('capacity');
        $lubricatortypeFormachineId = $this->post('lubricatortypeFormachineId');
        
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->lubricators->checkLubricator($lubricatorName, $lubricator_brandId, $lubricator_gear, $lubricatortypeFormachineId, $lubricator_numberId, $capacity);
        $data = array(
            'lubricatorId' => null,
            'lubricatorName' => $lubricatorName,  
            'lubricator_brandId' =>$lubricator_brandId,
            'lubricator_numberId' =>$lubricator_numberId,
            'status' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId,
            'activeFlag' => 1,
            'capacity' => $capacity,
            'api' => $api,
            'lubricatortypeFormachineId' => $lubricatortypeFormachineId
        );

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricators,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function updatelubricator_post(){
        $lubricatorId = $this->post('lubricatorId');
        $lubricatorName = $this->post("lubricatorName");
        $lubricator_brandId = $this->post("lubricator_brandId");
        $lubricator_numberId = $this->post("lubricator_number");
        $lubricator_gear = $this->post("lubricator_gear");
        $api = $this->post('api');
        $capacity = $this->post('capacity');
        $lubricatortypeFormachineId = $this->post('lubricatortypeFormachineId');
       
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->lubricators->getlubricatorbyId($lubricatorId);
        $data_check = $this->lubricators->checkbeforeupdate($lubricatorName,$lubricatorId,$lubricator_brandId,$lubricator_gear,$lubricatortypeFormachineId,$lubricator_numberId, $capacity);
        $data = array(
            'lubricatorId' => $lubricatorId,
            'lubricatorName' => $lubricatorName,
            'lubricator_numberId' => $lubricator_numberId,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time()),
            'capacity' => $capacity,
            'api' => $api,
            'activeFlag' => 1,
            'lubricatortypeFormachineId' => $lubricatortypeFormachineId
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricators,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    
    public function delete_get(){
        $lubricatorId = $this->get('lubricatorId');
        
        $data_check = $this->lubricators->getlubricatorById($lubricatorId);        
        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricatorId,
            "model" => $this->lubricators,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getlubricator_post(){

        $lubricatorId = $this->post('lubricatorId');

        $data_check = $this->lubricators->getlubricatorbyId($lubricatorId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }


}