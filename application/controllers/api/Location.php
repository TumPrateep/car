<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends BD_Controller {
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }

    function getSubdistrict_post(){

        $districtId = $this->post("districtId");

        $this->load->model("locationModel");
        $output["status"] = true;
        $result = $this->locationModel->getSubdistrict($districtId);
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

        $this->load->model("locationModel");
        $output["status"] = true;
        $result = $this->locationModel->getDistrict($provinceId);
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

        $this->load->model("locationModel");
        $output["status"] = true;
        $result = $this->locationModel->getProvince();
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

        $this->load->model("locationModel");
        $output["status"] = true;
        $result = $this->locationModel->getProvincecar();
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