<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends BD_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("brand");
    }

    // function getExProvinceforcar_post(){

    //     $output["status"] = true;
    //     $result = $this->locationmodel->getProvincecar();
    //     if($result != null){
    //         $output["data"] = $result;
    //         $output["message"] = REST_Controller::MSG_SUCCESS;
    //         $this->set_response($output, REST_Controller::HTTP_OK);
    //     }else{
    //         $output["status"] = false;
    //         $output["message"] = REST_Controller::MSG_ERROR;
    //         $this->set_response($output, REST_Controller::HTTP_OK);
    //     }
    // }

    function getBrandcar_post(){

        $output["status"] = true;
        $result = $this->brand->getAllBrand();
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