<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorgearnumber extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatorgearnumbers");
    }

    function createlubricatorgearnumber_post(){
        $lubricatorgearnumber = $this->post("lubricator_gear_number");
        $lubricatorGear = $this->post("lubricator_gear");
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->lubricatorgearnumbers->data_check_create($lubricatorgearnumber, $lubricatorGear);
        $data = array(
            'number' => $lubricatorgearnumber, 
            'typeId' => $lubricatorGear, 
            'status' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId,
            'activeFlag' => 1
        );

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorgearnumbers,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function searchlubricatorgearnumber_post(){
        $columns = array( 
            0 => null,
            1 => null,
            2 => null,
            3 =>'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        
        $totalData = $this->lubricatorgearnumbers->allLubricatorgearnumbers_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricator_number')) && empty($this->post('status')))
        {            
            $posts = $this->lubricatorgearnumbers->allLubricatorgearnumbers($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('lubricator_number');
            $status = $this->post('status');
            $posts =  $this->lubricatorgearnumbers->lubricatorgearnumbers_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->lubricatorgearnumbers->lubricatorgearnumbers_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['lubricator_numberId'] = $post->numberId;
                $nestedData['lubricator_number'] = $post->number;
                $nestedData['lubricator_gear'] = $post->typeId;
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

    function deletelubricatorgearnumber_get(){
        $lubricator_numberId = $this->get('lubricator_numberId');

        $data_check = $this->lubricatorgearnumbers->getlubricatorgearnumbersById($lubricator_numberId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricator_numberId,
            "model" => $this->lubricatorgearnumbers,
            "image_path" => null
        ];
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $lubricator_numberId = $this->post("lubricator_numberId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data_check_update = $this->lubricatorgearnumbers->getlubricatorgearnumbersById($lubricator_numberId);
        $data = array(
            'numberId' => $lubricator_numberId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->lubricatorgearnumbers
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

    function getLubricatorNumber_post(){
        $lubricator_numberId = $this->post('lubricator_numberId');

        $data_check = $this->lubricatorgearnumbers->getUpdate($lubricator_numberId);
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function updatelubricatorgearnumber_post(){
        $lubricator_numberId = $this->post("lubricator_numberId");
        $lubricatorgearnumber = $this->post("lubricator_gear_number");
        $lubricatorGear = $this->post("lubricator_gear");
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->lubricatorgearnumbers->getlubricatorgearnumbersById($lubricator_numberId);
        $data_check = $this->lubricatorgearnumbers->data_check_update($lubricator_numberId, $lubricatorgearnumber, $lubricatorGear);
        $data = array(
            'numberId' => $lubricator_numberId,
            'number' => $lubricatorgearnumber, 
            'typeId' => $lubricatorGear,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorgearnumbers,
            "image_path" => null,
            "old_image_path" => null
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);

    }
    ///


        function getAllLubricatorNumber_post(){
            $lubricator_gear = $this->post("lubricator_gear");
            $status = 1;
            $lubricator_numberId = $this->post("lubricator_numberId");
            $result = $this->lubricatornumbers->getAllLubricatorNumberByStatus($status, $lubricator_numberId, $lubricator_gear);
            $output["data"] = $result;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
}