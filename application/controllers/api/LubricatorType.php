<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LubricatorType extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    function createtrieSize_post(){
        $lubricator_typeName = $this->post("lubricator_typeName");
        $lubricator_typeSize = $this->post("lubricator_typeSize");
        
        $this->load->model("lubricatorTypes");
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->lubricatorTypes->ChecklubricatorTypes($lubricator_typeName);
        
        if($isCheck){
            $data = array(
                'lubricator_typeId' => null,
                'lubricator_typeName' => $lubricator_typeName,
                'lubricator_typeSize' => $lubricator_typeSize,  
                'status' => 1,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'activeFlag' => 1
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