<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Garages extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("Garage");
        $this->load->model("Location");
    }

    function search_post(){
        $provinceId = $this->post("provinceId");
        $garageName = $this->post("garageName");
        $json["province"] = $this->Location->getProvinceByProvinceId($provinceId);
        $json["garage"] = $this->Garage->listGarageSearchByGarageNameAndProvinceId($garageName, $provinceId);
        $this->set_response($json);
    }

    function getViewGarage_get(){
        $garageId = $this->get("garageId");

        $result = $this->Garage->getViewGarageByGarageId($garageId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getgarage_post(){
        $garageId = $this->post('garageId');

        $this->load->model("garage");
        $result = $this->garage->getGaragebyGarageId($garageId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

}