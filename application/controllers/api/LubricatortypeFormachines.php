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
        $data_check = $this->model->data_check_create($lubricatortypeFormachine);
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
            "model" => $this->model,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function update_post(){
        $lubricatortypeFormachineId = $this->post('lubricatortypeFormachineId');
        $lubricatortypeFormachine = $this->post('lubricatortypeFormachine');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->model->getlubricatortypeFormachines($lubricatortypeFormachineId);
        $data_check = $this->model->wherenot($lubricatortypeFormachineId,$lubricatortypeFormachine);
        $data = array(
            'lubricatortypeFormachineId' => $lubricatortypeFormachineId,
            'lubricatortypeFormachine' => $lubricatortypeFormachine,
            'status' => 1,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->model,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    }
}