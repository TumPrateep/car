<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorgear extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatorsgears");
        $this->load->model("lubricatorgearnumbers");
    }

    function createlubricatogears_post(){
        $lubricatorName = $this->post("lubricatorName");
        $gear_brandId = $this->post("lubricator_brandId");
        $lubricator_numberId = $this->post("lubricator_number");// หาตาราง save ไม่ได้ที่
        $lubricator_gear = $this->post("lubricator_gear");
        
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->lubricatorsgears->checkLubricator($lubricatorName, $gear_brandId, $lubricator_gear, $lubricator_numberId);
        $data = array(
            'gearId' => null,
            'lubricatorName' => $lubricatorName,  
            'gear_brandId' =>$gear_brandId,
            'numberId' =>$lubricator_gear,
            'status' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId,
            'activeFlag' => 1
        );

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorsgears,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function searchLubricatorgears_post(){
        $gear_brandId = $this->post('lubricator_brandId');
        $columns = array( 
            0 => null,
            1 =>'lubricatorName',
            2 =>'lubricator_number',
            3 =>'lubricator_gear',
            4 =>'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        
        $totalData = $this->lubricatorsgears->allLubricatorsgears_count($gear_brandId);
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricatorName')) && empty($this->post('status')))
        {            
            $posts = $this->lubricatorsgears->allLubricatorsgears($limit,$start,$order,$dir,$gear_brandId);
        }
        else {
            $search = $this->post('lubricatorName');
            $status = $this->post('status');
            $posts =  $this->lubricatorsgears->Lubricatorgears_search($limit,$start,$search,$order,$dir,$status,$gear_brandId);
            $totalFiltered = $this->lubricatorsgears->Lubricatorgears_search_count($search,$status,$gear_brandId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['lubricatorId'] = $post->gearId;
                $nestedData['gear_brandId'] = $post->gear_brandId;
                $nestedData['lubricatorName'] = $post->lubricatorName;
                $nestedData['lubricator_gear'] = $post->numberId;
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

    public function delete_get(){
        $gearId = $this->get('lubricatorId');
        
        $data_check = $this->lubricatorsgears->getlubricatorById($gearId);        
        $option = [
            "data_check_delete" => $data_check,
            "data" => $gearId,
            "model" => $this->lubricatorsgears,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getlubricatorgears_post(){

        $gearId = $this->post('lubricatorId');

        $data_check = $this->lubricatorsgears->getlubricatorbyId($gearId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function updatelubricatogears_post(){
        $gear_brandId = $this->post("lubricator_brandId");
        $gearId = $this->post('lubricatorId');
        $lubricatorName = $this->post("lubricatorName");
        $lubricator_numberId = $this->post("lubricator_number");
        $lubricator_gear = $this->post("lubricator_gear");
       
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->lubricatorsgears->getlubricatorbyId($gearId);
        $data_check = $this->lubricatorsgears->checkbeforeupdate($lubricatorName, $gearId, $gear_brandId, $lubricator_gear, $lubricator_numberId);
        $data = array(
            'gearId' => $gearId,
            'lubricatorName' => $lubricatorName,
            'numberId' => $lubricator_gear,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time()),
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorsgears,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $gearId = $this->post("lubricatorId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'gearId' => $gearId,
            'status' => $status,
            'activeFlag' => 1
        );
        $data_check_update = $this->lubricatorsgears->getlubricatorbyId($gearId);

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->lubricatorsgears
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

    function getAllLubricatorgearsnumber_post(){
        $lubricator_gear = $this->post("lubricator_gear");
        $status = 1;
        // $lubricator_numberId = $this->post("lubricator_numberId");
        $result = $this->lubricatorgearnumbers->getAllLubricatorNumberByStatus($status, $lubricator_gear);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    ///

    function getAlllubricator_post(){

        $lubricator_gear = $this->post('lubricator_gear');
        $lubricator_brandId = $this->post('lubricator_brandId');
        $machine_id = $this->post('machine_id');

        $data_check = $this->lubricators->getAllLubricatorBy($lubricator_brandId, $lubricator_gear, $machine_id);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

}