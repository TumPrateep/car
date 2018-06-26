<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LubricatorType extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    function createLubricatorType_post(){

        $lubricator_typeName = $this->post("lubricator_typeName");
        $lubricator_typeSize = $this->post("lubricator_typeSize");
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model("lubricatorTypes");
        $isCheck = $this->lubricatorTypes->ChecklubricatorTypes($lubricator_typeName);

        if($isCheck){
            $data = array(
                'lubricator_typeId' => null,
                'lubricator_typeName'=>$lubricator_typeName,
                'lubricator_typeSize' => $lubricator_typeSize,
                'status' => 2,
                'activeFlag' => 2,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId
                
                
            );
            $result = $this->lubricatorTypes->insert_lubricatorType($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }
        
        else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
}

