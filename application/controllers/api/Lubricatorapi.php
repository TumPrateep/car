<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorapi extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatorapis");
    }
    function create_post(){
        $api = $this->post('api');
        $machineId = $this->post('machineId');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->lubricatorapis->data_check_create($machineId,$api);
        $data = array(
            'apiId' => null,
            'api' => $machine_type,
            'machineId' => $machineId,
            'status' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorapis,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function update_post(){
        $apiId = $this->post('apiId');
        $api = $this->post('api');
        $machineId = $this->post('machineId');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->lubricatorapis->getLubricatorapiById($apiId);
        $data_check = $this->lubricatorapis->data_check_update($machineId,$apiId,$api);
        $data = array(
            'apiId' => $apiId,
            'api' => $api,
            'machineId' => $machineId,
            'status' => 1,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorapis,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $apiId = $this->post("apiId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->lubricatorapis->getLubricatorapiById($apiId);
        $data = array(
            'apiId' => $apiId,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->lubricatorapis
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }
    
    function delete_get(){
        $apiId = $this->get('apiId');

        $data_check = $this->machines->getLubricatorapiById($apiId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $apiId,
            "model" => $this->lubricatorapis,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function search_post(){
        $columns = array( 
            0 =>null, 
            1 =>'api',
            2 =>'status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $machineId = $this->post('machineId');

        $totalData = $this->lubricatorapis->allApi_count($machineId);
        $totalFiltered = $totalData; 

        if(empty($this->post('api')) && empty($this->post('status')) )
        {            
            $posts = $this->lubricatorapis->allApi($limit,$start,$order,$dir,$machineId);
        }
        else {
            $search = $this->post('api');
            $status = $this->post('status');
            $posts =  $this->lubricatorapis->api_search($limit,$start,$search,$dir,$order,$status,$machineId);
            $totalFiltered = $this->lubricatorapis->api_search_count($search,$status,$machineId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['apiId'] = $post->apiId;
                $nestedData['api'] = $post->api;
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
    
    function getUpdate_post(){

        $apiId = $this->post('apiId');

        $data_check = $this->lubricatorapis->getUpdate($apiId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function getAllapi_post(){
        $machineId = $this->post('machineId');
        $output['data'] = $this->lubricatorapis->getAllapi($machineId);
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}