<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Tirechange extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('tirechanges');
        $this->load->model('triesizes');
    }

    public function createtirechange_post(){

        $rimId = $this->post('tire_rimId');
        $tire_price = $this->post('tire_price');
        $unit_id = $this->post('unit_id');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->tirechanges->data_check_create($rimId);
        $data = array(
            'rimId' => $rimId,
            'tire_price' => $tire_price,
            'create_by' => $userId,
            'unit_id' => $unit_id,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tirechanges,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $rimId = $this->post('tire_rimId');
        $tire_price = $this->post('tire_price');
        $tire_changeId = $this->post('tire_changeId');
        $unit_id = $this->post('unit_id');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->tirechanges->getTireChangeById($tire_changeId);
        $data_check = $this->tirechanges->data_check_update($tire_changeId,$rimId);
        $data = array(
            'tire_changeId' => $tire_changeId,
            'tire_price' => $tire_price,
            'rimId' => $rimId,
            'unit_id' => $unit_id,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tirechanges,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deletetirechange_get(){
        $tire_changeId = $this->get('tire_changeId');
        $data_check = $this->tirechanges->getTireChangeById($tire_changeId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $tire_changeId,
            "model" => $this->tirechanges,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    public function getalltirechange_post(){
        $tire_changeId = $this->post('tire_changeId');
        $this->set_response($isCheck, REST_Controller::HTTP_OK);
        $getAlldata = $this->tirechanges->getallTire($tire_changeId);
        if($getAlldata != null){
            $output["data"] = $getAlldata;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function searchTireChange_post(){
        $columns = array( 
            0 => null,
            1 => 'rimName', 
            2 => 'tire_price',
            3 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->tirechanges->allTirechanges_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('rimName')) && empty($this->post('status')))
        {            
            $posts = $this->tirechanges->allTirechanges($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('rimName');
            $status = $this->post('status');
            $posts =  $this->tirechanges->tirechanges_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->tirechanges->tirechanges_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['rimId'] = $post->rimId;
                $nestedData['tire_changeId'] = $post->tire_changeId;
                $nestedData['rimName'] = $post->rimName;
                $nestedData['tire_price'] = $post->tire_price;
                $nestedData['unit'] = $post->unit;
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
        }else{
            $search = $this->post('tire_size'); 
            $status = $this->post('status'); 
            $posts =  $this->triesizes->trie_size_search($limit,$start,$search,$order,$dir,$rimId,$status);
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
                $nestedData['rim'] = $post->rimName;
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
    

    function changeStatus_post(){
        $tire_changeId = $this->post('tire_changeId');
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->tirechanges->getTireChangeById($tire_changeId);
        $data = array(
            'tire_changeId' => $tire_changeId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->tirechanges
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }  
    
    function getTireChange_get(){
        $tire_changeId = $this->get('tire_changeId');
        $data_check = $this->tirechanges->getUpdate($tire_changeId);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function getAllunit_get(){
        $result = $this->tirechanges->getAllunit();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}