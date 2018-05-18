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

        $this->load->model("LocationModel");
        $output["status"] = true;
        $result = $this->LocationModel->getSubdistrict($districtId);
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

        $this->load->model("LocationModel");
        $output["status"] = true;
        $result = $this->LocationModel->getDistrict($provinceId);
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

    function getProvince_post(){

        $this->load->model("LocationModel");
        $output["status"] = true;
        $result = $this->LocationModel->getProvince();
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



}