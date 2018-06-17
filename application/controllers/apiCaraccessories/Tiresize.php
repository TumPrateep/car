<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tiresize extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    
    function getAllTireSize_post(){
        $q = $this->post("term");
        $page = $this->post("page");
        $tireRimId = $this->post("tireRimId");
        $this->load->model("trieSizes");
        $listTireSize = $this->trieSizes->getAllTireSizeByName($q, $page, $tireRimId);
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
        
        $this->load->model("trieSizes");
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->trieSizes->isDuplicate($tire_size, $tire_series, $rim, $rimId);
        
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
                'update_at' => null,
                'update_by' => null
                
            );
            $result = $this->trieSizes->inserttrie_size($data);
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
        $columns = array( 
            0 => null    
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $rimId = $this->post("rimId");
        $this->load->model("trieSizes");
        $totalData = $this->trieSizes->alltrieSize_count($rimId);
        $totalFiltered = $totalData; 
        if(empty($this->post('tire_size')) &&empty($this->post('rimId')))
        {            
            $posts = $this->trieSizes->allTriesize($limit,$start,$order,$dir, $rimId);
        }
        else {
            $search = $this->post('tire_size');
            $rimId = $this->post('rimId'); 
            $posts =  $this->trieSizes->trie_size_search($limit,$start,$search,$col,$dir,$rimId,$status);
            $totalFiltered = $this->trieSizes->trie_size_search_count($search, $rimId,$status);
            
           
        }
        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData[$count]['tire_sizeId'] = $post->tire_sizeId;
                $nestedData[$count]['tire_size'] = $post->tire_size;
                $nestedData[$count]['tire_series'] = $post->tire_series;
                $nestedData[$count]['rim'] = $post->rim;
                $nestedData[$count]['status'] = $post->status;
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
}