<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatortypeformachine extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model("Lubricatortypeformachines");
    }
    function createlubricatortypeFormachines_post(){
        $lubricatortypeformachine = $this->post('lubricatortypeformachine');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->Lubricatortypeformachines->data_check_create($lubricatortypeformachine);
        $data = array(
            'lubricatortypeformachine' => null,
            'lubricatortypeformachine' => $lubricatortypeformachine,
            'status' => 1,
            'activeFlag' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->Lubricatortypeformachines,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function update_post(){
        $lubricatortypeformachineId = $this->post('lubricatortypeformachineId');
        $lubricatortypeformachine = $this->post('lubricatortypeformachine');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->Lubricatortypeformachines->getlubricatortypeFormachines($lubricatortypeformachineId);
        $data_check = $this->Lubricatortypeformachines->wherenot($lubricatortypeformachineId,$lubricatortypeformachine);
        $data = array(
            'lubricatortypeformachineId' => $lubricatortypeformachineId,
            'lubricatortypeformachine' => $lubricatortypeformachine,
            'status' => 1,
            'activeFlag' =>1,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->Lubricatortypeformachines,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $lubricatortypeformachineId = $this->post('lubricatortypeformachineId');
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->Lubricatortypeformachines->getlubricatortypeFormachineById($lubricatortypeformachineId);
        $data = array(
            'lubricatortypeformachineId' => $lubricatortypeformachineId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->Lubricatortypeformachines
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }
    
    function deletelubricatortypeFormachine_get(){
        $lubricatortypeformachineId = $this->get('lubricatortypeformachineId');
        $model = $this->Lubricatortypeformachines->getlubricatortypeFormachine($lubricatortypeFormachineId);

        $data_check = $this->Lubricatortypeformachines->getmlubricatortypeFormachine($lubricatortypeFormachineId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricatortypeFormachineId,
            "model" => $this->Lubricatortypeformachines,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getAllLubricatortypeformachine_get(){
        $output['data'] = $this->lubricatortypeformachines->getAllLubricatortypeformachine();
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}