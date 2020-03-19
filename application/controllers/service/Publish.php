<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Publish extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model("advertisements");
    }

    function getadvertisement_picture_post(){
        $data_check = $this->advertisements->advertisement_picture();
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

}