<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Garages extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("garage");
    }

    function getAllGarage_get(){
        $data = $this->garage->getAllGarage();
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    

}