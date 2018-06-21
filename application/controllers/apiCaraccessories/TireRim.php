<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TireRim extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
    }
    function searchrim_post(){
        $columns = array( 
            0 => null 
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $this->load->model("rims");
        $totalData = $this->rims->allrim_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('rimName')))
        {            
            $posts = $this->rims->allrim($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('rimName'); 
            $status = 1;
            $posts =  $this->rims->rim_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->rims->rim_search_count($search,$status);
        }
        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData[$count]['rimId'] = $post->rimId;
                $nestedData[$count]['rimName'] = $post->rimName;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
                $nestedData[$count]['create_by'] = $post->create_by;
                $data[$index] = $nestedData;
                if($count >= 3){
                    $count = -1;
                    $index++;
                    $nestedData = [];
                }
                
                $count++;
                
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

    function getAllTireRim_post(){
        $q = $this->post("term");
        $page = $this->post("page");
        $this->load->model("Tirerims");
        $listTireRim = $this->Tirerims->getAllTireRimByName($q, $page);
        $output["items"] = [];
        $nestedData = [];
        if($listTireRim != null){
            foreach ($listTireRim as $row) {
                $nestedData[] =  array(
                    "id" => $row->rimId,
                    "text" => $row->rimName
                );
            }
        }
        $output["items"] = $nestedData;
        $output["q"] = $q;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function createRim_post(){
        $rimName = $this->post("rimName");
        $this->load->model("rims");
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->rims->checkrim($rimName);
        if($isCheck){
            $data = array(
                'rimId' => null,
                'rimName' => $rimName,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'update_at' => null,
                'update_by' => null,
                'status' => 2
            );
            $result = $this->rims->insert_rim($data);
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
    
    function deleteRim_get(){
        $rimId = $this->get('rimId');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $this->load->model("rims");
        $rim = $this->rims->getrimbyId($rimId);
        if($rim != null){
            $isCheckStatus =$this->rims->checkStatusFromRim($rimId,$status,$userId);
            if($isCheckStatus ){
            $isDelete = $this->rims->delete($rimId);
                if($isDelete){
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    $output["message"] = REST_Controller::MSG_BE_USED;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }
        }else{
            $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
       }
    }
    function getRim_post(){
        $rimId = $this->post('rimId');
        $this->load->model("rims");
        $rimdata = $this->rims->getrimById($rimId);
        if($rimdata != null){
            $output["data"] = $rimdata;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

}