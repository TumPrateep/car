<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Machinetype extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("machinetypes");
    }

    function create_post(){

        $machinetype = $this->post("machinetype");
        $modelofcar_modelofcarId = $this->post("modelofcar_modelofcarId");
        $gear = $this->post("gear");
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->model->data_check_create($machinetype,$modelofcar_modelofcarId,$gear);
        $data = array(
            'machinetypeId' => null,
            'machinetype' => $machinetype,
            'modelofcar_modelofcarId' => $modelofcar_modelofcarId,
            'gear' => $gear,
            'status' => 1,
            'activeFlag' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->Machinetypes,
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $machinetypeId = $this->post('machinetypeId');
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->Machinetypes->getmachinetypebyId($machinetypeId);
        $data = array(
            'machinetypeId' => $machinetypeId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->Machinetypes
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }
    

}