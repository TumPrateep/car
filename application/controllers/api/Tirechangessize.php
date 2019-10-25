<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Tirechangessize extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('tirechangessizes');
    }

    public function createtirechangeSize_post(){
        // $tire_changeId = $this->post('tire_changeId');
        $tire_change = $this->post('tire_change');
        $unit_id = $this->post('unit_id');
        $rimId = $this->post('tire_rimId');
        $tire_sizeId = $this->post('tire_sizeId');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->tirechangessizes->data_check_create($rimId ,$tire_sizeId);
        $data = array(
            'tire_size_chargeId' => null,
            'tire_size_price' => $tire_change,
            'unit_id' => $unit_id,
            'rimId' => $rimId,
            'tire_sizeId' => $tire_sizeId,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tirechangessizes,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){

        $tire_size_chargeId = $this->post('tire_size_chargeId');
        $tire_change = $this->post('tire_change');
        $unit_id = $this->post('unit_id');
        $rimId = $this->post('tire_rimId');
        $tire_sizeId = $this->post('tire_sizeId');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->tirechangessizes->getTireChangeById($tire_size_chargeId);
        $data_check = $this->tirechangessizes->data_check_update($tire_size_chargeId, $rimId, $tire_sizeId);
        $data = array(
            'tire_size_chargeId' => $tire_size_chargeId,
            'tire_size_price' => $tire_change,
            'unit_id' => $unit_id,
            'rimId' => $rimId,
            'tire_sizeId' => $tire_sizeId,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tirechangessizes,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deletetirechange_get(){
        $tire_size_chargeId = $this->get('tire_size_chargeId');
        $data_check = $this->tirechangessizes->getTireChangeById($tire_size_chargeId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $tire_size_chargeId,
            "model" => $this->tirechangessizes,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    // public function getalltirechange_post(){
    //     $tire_changeId = $this->post('tire_changeId');
    //     $this->set_response($isCheck, REST_Controller::HTTP_OK);
    //     $getAlldata = $this->tirechanges->getallTire($tire_changeId);
    //     if($getAlldata != null){
    //         $output["data"] = $getAlldata;
    //         $output["message"] = REST_Controller::MSG_SUCCESS;
    //         $this->set_response($output, REST_Controller::HTTP_OK);
    //     }else{
    //         $output["message"] = REST_Controller::MSG_BE_DELETED;
    //         $this->set_response($output, REST_Controller::HTTP_OK);
    //     }
    // }

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
        // $tire_changeId = $this->post("tire_changeId");
        $rimId = $this->post("rimId");

        $totalData = $this->tirechangessizes->alltrieSize_count($rimId);
        $totalFiltered = $totalData; 

        if(empty($this->post('tire_size')) && empty($this->post('status')))
        {            
            $posts = $this->tirechangessizes->allTriesize($limit,$start,$order,$dir,$rimId);

        }else{
            $search = $this->post('tire_size'); 
            $status = $this->post('status'); 
            $posts =  $this->tirechangessizes->trie_size_search($limit,$start,$search,$order,$dir,$rimId,$status);
            $totalFiltered = $this->tirechangessizes->trie_size_search_count($search,$rimId,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['tire_size_chargeId'] = $post->tire_size_chargeId;
                $nestedData['tire_sizeId'] = $post->tire_sizeId;
                $nestedData['tire_size'] = $post->tire_size;
                $nestedData['tire_series'] = $post->tire_series;
                $nestedData['rimId'] = $post->rimId;
                $nestedData['rim'] = $post->rimName;
                $nestedData['unit'] = $post->unit;
                $nestedData['tire_size_price'] = $post->tire_size_price;
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
        $tire_size_chargeId = $this->post('tire_size_chargeId');
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->tirechangessizes->getTireChangeById($tire_size_chargeId);
        $data = array(
            'tire_size_chargeId' => $tire_size_chargeId,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->tirechangessizes
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }  
    
    // function getTireChange_get(){
    //     $tire_changeId = $this->get('tire_changeId');
    //     $data_check = $this->tirechanges->getUpdate($tire_changeId);
    
    //     $option = [
    //         "data_check" => $data_check
    //     ];

    //     $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    // }

    function getTireCh_post(){
        $rimId = $this->post('rimId');
        $data_check = $this->tirechangessizes->getUpdate($rimId);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function getAllunit_get(){
        $result = $this->tirechangessizes->getAllunit();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllRims_get(){
        $rimId = $this->post('rimId');
        $result = $this->tirechangessizes->getAllRims($rimId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getiresizeById_post(){
        $tire_size_chargeId = $this->post('tire_size_chargeId');
        $data_check = $this->tirechangessizes->geTiresizeFromTiresizeBytireId($tire_size_chargeId);
        // var_dump($data_check);
        // exit();
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

}