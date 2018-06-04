<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Triesize extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }

    function createtrieSize_post(){

        $trie_size = $this->post("tire_size");
        $rimId = $this->post("rimId");
        
        $this->load->model("trieSizes");
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->trieSizes->gettrie_sizeforrim($tire_size,$rimId);

        if($isCheck){
            $data = array(
                'tire_sizeId' => null,
                'tire_size' => $tire_size,
                'status' => 1,
                'rimId' => $rimId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId
                
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

    function updatetriesize_post(){

        $trie_sizeId = $this->post('tire_sizeId');
        $trie_size = $this->post('tire_size');
        $rimId = $this->post('rimId');
        
        $this->load->model("trieSizes");

        $result = $this->trieSizes->wherenotTriesize($tire_sizeId,$tire_size,$rimId);

        if($result){
            $data = array(
                'tire_sizeId' => $tire_sizeId,
                'tire_size' => $tire_size,
                'status' => 1,
                'rimId' => $rimId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId
            );
            $result = $this->trieSizes->updateTriesize($data);
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
        $this->load->model("trieSizes");
        $totalData = $this->trieSizes->alltrieSize_count($rimId);

        $totalFiltered = $totalData; 

        if(empty($this->post('tire_size'))  || empty($this->post('rimId')))
        {            
            $posts = $this->trieSizes->allTriesize($limit,$start,$order,$dir, $rimId);
        }
        else {
            $search = $this->post('tire_size'); 

            $posts =  $this->trieSizes->trie_size_search($limit,$start,$search,$col,$dir,$rimId);

            $totalFiltered = $this->trieSizes->trie_size_search_count($search, $rimId);
            
           
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['tire_sizeId'] = $post->tire_sizeId;
                $nestedData['tire_size'] = $post->tire_size;
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
        $trie_sizeId = $this->get('tire_sizeId');
        $this->load->model("trieSizes");
        $tire = $this->trieSizes->getiresizeById($tire_sizeId);
        if($tire != null){
            $isDelete = $this->trieSizes->delete($tire_sizeId);
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
    

}
