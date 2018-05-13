<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class brand extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

    }

    function create_post(){
        $name = $this->post('brandname');
        $this->load->model("brand");
        $isCheck = $this->brand->checkBrand($name);
        if($isCheck){
            $output["status"] = true;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["status"] = false;
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    
}