<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tiresize extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("triesizes");
        $this->load->model("rims");
    }
    
    function getAllTireSize_post(){
        $q = $this->post("term");
        $page = $this->post("page");
        $tireRimId = $this->post("tireRimId");
        
        $listTireSize = $this->triesizes->getAllTireSizeByName($q, $page, $tireRimId);
        $output["items"] = [];
        $nestedData = [];
        if($listTireSize != null){
            foreach ($listTireSize as $row) {
                $nestedData[] =  array(
                    "id" => $row->tire_sizeId,
                    "text" => $row->tire_sizeName
                );
            }
        }
        $output["items"] = $nestedData;
        $output["q"] = $q;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    function createtrieSize_post(){
        $tire_size = $this->post("tire_size");
        $rimId = $this->post("rimId");
        $rim = $this->post('rim');
        $tire_series = $this->post('tire_series');
        
        
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->triesizes->isDuplicate($tire_size, $tire_series, $rim, $rimId);
        
        if($isCheck){
            $data = array(
                'tire_sizeId' => null,
                'tire_size' => $tire_size,
                'tire_series' => $tire_series,
                'rim' => $rim,
                'status' => 2,
                'rimId' => $rimId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'activeFlag' => 2
                
            );
            $result = $this->triesizes->inserttrie_size($data);
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

    function searchTiresize_post(){
        $column = "tire_size";
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
        $rimId = $this->post("rimId");
        
        $totalData = $this->triesizes->alltrieSize_count($rimId);
        $totalFiltered = $totalData; 
        if(empty($this->post('tire_size')))
        {            
            $posts = $this->triesizes->allTriesize($limit,$start,$order,$dir, $rimId);
        }
        else {
            $search = $this->post('tire_size');
            $rimId = $this->post('rimId'); 
            $posts =  $this->triesizes->trie_size_search($limit,$start,$search,$col,$dir,$rimId,$status);
            $totalFiltered = $this->triesizes->trie_size_search_count($search, $rimId,$status);
            
           
        }
        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData[$count]['rimId'] = $post->rimId;
                $nestedData[$count]['tire_sizeId'] = $post->tire_sizeId;
                $nestedData[$count]['tire_size'] = $post->tire_size;
                $nestedData[$count]['tire_series'] = $post->tire_series;
                $nestedData[$count]['rim'] = $post->rim;
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
    function deletetriesize_get(){
        $tire_sizeId = $this->get('tire_sizeId');
        // $tire_series = $this->get('tire_series');
        // $rim = $this->get('rim');
        $rimId = $this->get('rimId');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $tire = $this->triesizes->getiresizeById($tire_sizeId);
        if($tire != null){
            $isCheckStatus =$this->triesizes->checkStatusFromTireSize($tire_sizeId,$status,$userId);
            if($isCheckStatus ){
                $isDelete = $this->triesizes->delete($tire_sizeId);
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
    function getiresize_post(){
        $tire_sizeId = $this->post('tire_sizeId');
        $rimId = $this->post('rimId');
        
       
        $this->set_response($isCheck, REST_Controller::HTTP_OK);
        $result = $this->triesizes->geTiresizeFromTiresizeBytireId($tire_sizeId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
       
    }
    function updatetriesize_post(){
        $tire_sizeId = $this->post('tire_sizeId');
        $tire_size = $this->post('tire_size');
        $rimId = $this->post('rimId');
        $rim = $this->post('rim');
        $tire_series = $this->post('tire_series');
        $userId = $this->session->userdata['logged_in']['id'];
        
        $result = $this->triesizes->wherenotTriesize($tire_sizeId,$tire_size,$rimId);
        if($result){
            $data = array(
                'tire_sizeId' => $tire_sizeId,
                'tire_size' => $tire_size,
                'tire_series' => $tire_series,
                'rim' => $rim,
                'status' => 2,
                'rimId' => $rimId,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                'activeFlag' => 2
            );
            $status = $this->triesizes->getiresizeById($tire_sizeId)->status;
            $isCheckStatus = $this->triesizes->checkStatusFromTireSize($tire_sizeId,$status,$userId);
            if($isCheckStatus ){
                $result = $this->triesizes->updateTriesizes($data);
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

    function getAllTireSize_get(){
        $rimId = $this->get("tire_rimId");
        
        $result = $this->triesizes->getAllTireSizeByrimId($rimId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}