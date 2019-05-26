<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Carselect extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("brand");
        $this->load->model("model");
        $this->load->model("modelofcars");
    }

    function getCarBrand_post(){
        $result = $this->brand->getAllBrandofRegister();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getCarBrand_get(){
        $result = $this->brand->getAllBrandofRegister();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getCarModel_get(){
        $brandId = $this->get("brandId");
        $result = $this->model->getAllmodelforcar($brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getCarYear_get(){
        $modelName = $this->get("modelName");
        $result = $this->model->getAllYearanddetailforcar($modelName);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getCarDetail_get(){
        $modelId = $this->get("modelId");
        $result = $this->modelofcars->getAllCarModelForSelect($modelId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}