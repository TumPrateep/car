<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Triesize extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("triesizes");
    }
    function createtrieSize_post(){
        $tire_size = $this->post("tire_size");
        $rimId = $this->post("rimId");
        $rim = $this->post('rim');
        $tire_series = $this->post('tire_series');
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->triesizes->gettrie_sizeforrim($tire_size,$rimId,$tire_series,$rim);
        
        if($isCheck){
            $data = array(
                'tire_sizeId' => null,
                'tire_size' => $tire_size,
                'tire_series' => $tire_series,
                'rim' => $rim,
                'status' => 1,
                'rimId' => $rimId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'activeFlag' => 1
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
                'status' => 1,
                'rimId' => $rimId,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                'activeFlag' => 1
            );
            $result = $this->triesizes->updateTriesizes($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    function searchTriesize_post(){
        $columns = array( 
            0 => null,
            1 => 'tire_size',
            2 => 'status'      
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $rimId = $this->post("rimId");
        $totalData = $this->triesizes->alltrieSize_count($rimId);
        $totalFiltered = $totalData; 
        if(empty($this->post('tire_size')) && empty($this->post('status')))
        {            
            $posts = $this->triesizes->allTriesize($limit,$start,$order,$dir, $rimId);
        }
        else {
            $search = $this->post('tire_size'); 
            $status = $this->post('status'); 
            $posts =  $this->triesizes->trie_size_search($limit,$start,$search,$col,$dir,$rimId,$status);
            $totalFiltered = $this->triesizes->trie_size_search_count($search, $rimId,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['tire_sizeId'] = $post->tire_sizeId;
                $nestedData['tire_size'] = $post->tire_size;
                $nestedData['tire_series'] = $post->tire_series;
                $nestedData['rim'] = $post->rim;
                $nestedData['rimId'] = $post->rimId;
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
    function deletetriesize_get(){
        $tire_sizeId = $this->get('tire_sizeId');
        $tire = $this->triesizes->getiresizeById($tire_sizeId);
        if($tire != null){
            $isDelete = $this->triesizes->delete($tire_sizeId);
            if($isDelete){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_USED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    function getiresizeById_post(){
        $tire_sizeId = $this->post('tire_sizeId');
        $rimId = $this->post('rimId');
        $this->load->model("trieSizes");
       
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
    function changeStatus_post(){
        $tire_sizeId = $this->post("tire_sizeId");
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
        $result = $this->triesizes->updateStatus($tire_sizeId,$data);
        if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getAllTireSize_get(){
        $tire_rimId = $this->get("tire_rimId");
        $result = $this->triesizes->getAllTireSizeByrimId($tire_rimId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    
}