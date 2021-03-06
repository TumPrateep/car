<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tirerim extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("rims");
        $this->load->model("tirerims");
    }
    function searchrim_post(){
        $column = "rimName";
        $sort = "asc";
        if($this->post('column') == 3){
            $column = "status";
        }else if($this->post('column') == 2){
            $sort = "desc";
        }else{
            $sort = "asc";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;
        
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
        
        $listTireRim = $this->tirerims->getAllTireRimByName($q, $page);
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
                'status' => 2,
                'activeFlag' => 2
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

    function updaterim_post(){
        $rimId = $this->post('rimId');
        $rimName = $this->post('rimName');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        
        
        $result = $this->rims->wherenotrim($rimId,$rimName);
        if($result){
            $data = array(
                'rimId' => $rimId,
                'rimName' => $rimName,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                'status' => 2,
                'activeFlag' => 2,
            );
            $isCheckStatus =$this->rims->checkStatusFromRim($rimId,$status,$userId);
            if($isCheckStatus ){
                $result = $this->rims->updaterim($data);
                $output["status"] = $result;
                    if($result){
                        $output["message"] = REST_Controller::MSG_SUCCESS;
                        $this->set_response($output, REST_Controller::HTTP_OK);
                    }else{
                        $output["status"] = false;
                        $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                        $this->set_response($output, REST_Controller::HTTP_OK);
                    }
            }else{
                $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

    }

    function getAllTireRims_get(){
        
        $result = $this->rims->getAllRims();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}