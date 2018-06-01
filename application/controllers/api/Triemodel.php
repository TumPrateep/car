<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Triemodel extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
    }

    function deletetriemodel_get(){
        $tire_modelId = $this->get('tire_modelId');
        $this->load->model("Triemodels");
        $tire = $this->Triemodels->getireById($tire_modelId);
        if($tire != null){
            $isDelete = $this->Triemodels->delete($tire_modelId);
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