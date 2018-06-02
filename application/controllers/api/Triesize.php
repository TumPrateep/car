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

        $trie_size = $this->post("trie_size");
        $rimId = $this->post("rimId");
        
        $this->load->model("trieSizes");
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->trieSizes->gettrie_sizeforrim($trie_size,$rimId);

        if($isCheck){
            $data = array(
                'trie_sizeId' => null,
                'trie_size' => $trie_size,
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

        $trie_sizeId = $this->post('trie_sizeId');
        $trie_size = $this->post('trie_size');
        $rimId = $this->post('rimId');
        
        $this->load->model("trieSizes");

        $result = $this->trieSizes->wherenotTriesize($trie_sizeId,$trie_size,$rimId);

        if($result){
            $data = array(
                'trie_sizeId' => $trie_sizeId,
                'trie_size' => $trie_size,
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
            1 => 'trie_size'
            
            
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $rimId = $this->post("rimId");
        $this->load->model("trieSizes");
        $totalData = $this->trieSizes->alltrieSize_count($rimId);

        $totalFiltered = $totalData; 

        if(empty($this->post('trie_size'))  || empty($this->post('rimId')))
        {            
            $posts = $this->trieSizes->allTriesize($limit,$start,$order,$dir, $rimId);
        }
        else {
            $search = $this->post('trie_size'); 

            $posts =  $this->trieSizes->trie_size_search($limit,$start,$search,$col,$dir,$rimId);

            $totalFiltered = $this->trieSizes->trie_size_search_count($search, $rimId);
            
           
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['trie_sizeId'] = $post->trie_sizeId;
                $nestedData['trie_size'] = $post->trie_size;
                $nestedData['rimId'] = $post->rimId;

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

    

}
