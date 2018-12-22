<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Carprofile extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("carprofiles");
    }

    function getCarProfile_get(){
        $userId = $this->session->userdata['logged_in']['id'];
        $data = $this->carprofiles->getCarProfileByUserId($userId);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    

}