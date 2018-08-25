<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends BD_Controller {
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("locationmodel");
    }

    function getSubdistrict_post(){

        $districtId = $this->post("districtId");

        $output["status"] = true;
        $result = $this->locationmodel->getSubdistrict($districtId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getDistrict_post(){

        $provinceId = $this->post("provinceId");

        $output["status"] = true;
        $result = $this->locationmodel->getDistrict($provinceId);
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

    function getProvince_post(){

        $output["status"] = true;
        $result = $this->locationmodel->getProvince();
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

    function getProvinceforcar_post(){

        $output["status"] = true;
        $result = $this->locationmodel->getProvincecar();
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
}