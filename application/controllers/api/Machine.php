<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Machine extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("machines");
    }
    function create_post(){
        $machine_type = $this->post('machine_type');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->machines->data_check_create($machine_type);
        $data = array(
            'machineId' => null,
            'machine_type' => $machine_type,
            'status' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->machines,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function update_post(){
        $machineId = $this->post('machineId');
        $machine_type = $this->post('machine_type');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->machines->getMachinesById($machineId);
        $data_check = $this->machines->data_check_update($machineId,$machine_type);
        $data = array(
            'machineId' => $machineId,
            'machine_type' => $machine_type,
            'status' => 1,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->machines,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $machineId = $this->post("machineId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->machines->getMachinesById($machineId);
        $data = array(
            'machineId' => $machineId,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->machines
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }
    
    function delete_get(){
        $machineId = $this->get('machineId');

        $data_check = $this->machines->getMachinesById($machineId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $machineId,
            "model" => $this->machines,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function search_post(){
        $columns = array( 
            0 =>null, 
            1 =>'machine_type',
            2 =>'status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        // $lubricatortypeFormachineId = $this->post('lubricatortypeFormachineId');

        $totalData = $this->machines->allMachines_count();
        $totalFiltered = $totalData; 

        if(empty($this->post('machine_type')) && empty($this->post('status')) )
        {            
            $posts = $this->machines->allMachines($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('machine_type');
            $status = $this->post('status');
            $posts =  $this->machines->machines_search($limit,$start,$search,$dir,$order,$status);
            $totalFiltered = $this->machines->machines_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['machineId'] = $post->machineId;
                $nestedData['machine_type'] = $post->machine_type;
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

        $machineId = $this->post('machineId');

        $data_check = $this->machines->getUpdate($machineId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function getAllmachine_post(){
        $machineId = $this->post('machineId');
        $output['data'] = $this->machines->getAllMachine($machineId);
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllmachine_get(){
        $output['data'] = $this->machines->getAll();
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}