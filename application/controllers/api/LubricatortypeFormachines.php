<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class lubricatortypeFormachines extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatortypeFormachines");
    }
    function createlubricatortypeFormachines_post(){
        $lubricatortypeFormachine = $this->post('lubricatortypeFormachine');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->lubricatortypeFormachines->data_check_create($lubricatortypeFormachine);
        $data = array(
            'lubricatortypeFormachineId' => null,
            'lubricatortypeFormachine' => $lubricatortypeFormachine,
            'status' => 1,
            'activeFlag' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatortypeFormachines,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function update_post(){
        $lubricatortypeFormachineId = $this->post('lubricatortypeFormachineId');
        $lubricatortypeFormachine = $this->post('lubricatortypeFormachine');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->lubricatortypeFormachines->getlubricatortypeFormachines($lubricatortypeFormachineId);
        $data_check = $this->lubricatortypeFormachines->wherenot($lubricatortypeFormachineId,$lubricatortypeFormachine);
        $data = array(
            'lubricatortypeFormachineId' => $lubricatortypeFormachineId,
            'lubricatortypeFormachine' => $lubricatortypeFormachine,
            'status' => 1,
            'activeFlag' =>1,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatortypeFormachines,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $lubricatortypeFormachineId = $this->post('lubricatortypeFormachineId');
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->lubricatortypeFormachines->getlubricatortypeFormachineById($lubricatortypeFormachineId);
        $data = array(
            'lubricatortypeFormachineId' => $lubricatortypeFormachineId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->lubricatortypeFormachines
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }
    
    function deletelubricatortypeFormachine_get(){
        $lubricatortypeFormachineId = $this->get('lubricatortypeFormachineId');
        $model = $this->lubricatortypeFormachines->getlubricatortypeFormachine($modelId);

        $data_check = $this->lubricatortypeFormachines->getmlubricatortypeFormachine($modelId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricatortypeFormachineId,
            "model" => $this->lubricatortypeFormachines,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }
}