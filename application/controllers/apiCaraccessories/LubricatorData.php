<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LubricatorData extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }

    function delete_get(){

        $lubricator_dataId = $this->get('lubricator_dataId');

        $this->load->model("lubricatordatas");
        $lubricator = $this->lubricatordatas->getlubricatorbyId($lubricator_dataId);
        if($lubricator                 != null){
            $isDelete = $this->lubricatordatas->delete($lubricator_dataId);
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