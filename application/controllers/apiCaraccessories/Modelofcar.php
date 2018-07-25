<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SpareBrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }
    function create_post(){
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $modelofcarName = $this->post('modelofcarName');
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model("modelofcars");
        $isCheck = $this->modelofcars->checkduplicate($modelofcarName,$modelId,$brandId);
        if($isCheck){
            $data = array(
                'modelofcarId' => null,
                'modelofcarName' => $modelofcarName,
                'brandId' => $brandId,
                'modelId' => $modelId,
                'create_by' => $userId,
                'create_at' =>date('Y-m-d H:i:s',time()),
                'status' => 2,
                'activeFlag' => 2,
            );
            $result = $this->modelofcars->insert($data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
}