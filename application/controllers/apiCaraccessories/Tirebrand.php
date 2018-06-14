<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Tirebrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }

    function getAllTireBrand_post(){
        $data['result'] = $this->post("term");
        $data['page'] = $this->post("page");
        $this->set_response($data, REST_Controller::HTTP_OK);
    }
}