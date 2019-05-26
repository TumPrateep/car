<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Brandcar extends BD_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("brand");
    }

    function getBrandcar_post(){

        $output["status"] = true;
        $result = $this->brand->getAllBrandofRegister();
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getAllBrand_get(){
        $result = $this->brand->getAllBrandNoStatus();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}