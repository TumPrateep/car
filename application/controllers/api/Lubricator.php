<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricator extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    function searchLubricator_post(){
        $lubricator_brandId = $this->post('lubricator_brandId');
        $columns = array( 
            0 => null,
            1 =>'lubricatorName',
            2 =>'lubricator_numberId',
            3 =>'lubricator_gear',
            4 =>'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $this->load->model("Lubricators");
        $totalData = $this->Lubricators->allLubricators_count($lubricator_brandId);
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricatorName')) && empty($this->post('status')))
        {            
            $posts = $this->Lubricators->allLubricators($limit,$start,$order,$dir,$lubricator_brandId);
        }
        else {
            $search = $this->post('lubricatorName');
            $status = $this->post('status');
            $posts =  $this->Lubricators->Lubricator_search($limit,$start,$search,$order,$dir,$status,$lubricator_brandId);
            $totalFiltered = $this->Lubricators->Lubricator_search_count($search,$status,$lubricator_brandId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['lubricatorId'] = $post->lubricatorId;
                $nestedData['lubricator_brandId'] = $post->lubricator_brandId;
                $nestedData['lubricatorName'] = $post->lubricatorName;
                $nestedData['lubricator_numberId'] = $post->lubricator_numberId;
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
        $lubricatorId = $this->post("lubricatorId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'status' => $status,
            'activeFlag' => 1
        );
        $this->load->model("Lubricators");
        $result = $this->Lubricators->updateStatus($lubricatorId,$data);
        if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function createlubricator_post(){
        $lubricatorName = $this->post("lubricatorName");
        $lubricator_brandId = $this->post("lubricator_brandId");
        $lubricator_numberId = $this->post("lubricator_number");

        $this->load->model("lubricators");
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->lubricators->Checklubricator($lubricatorName);
        
        if($isCheck){
            $data = array(
                'lubricatorId' => null,
                'lubricatorName' => $lubricatorName,  
                'lubricator_brandId' =>$lubricator_brandId,
                'lubricator_numberId' =>$lubricator_numberId,
                'status' => 1,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'activeFlag' => 1
            );
            $result = $this->lubricators->insert_lubricator($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }
        else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

}