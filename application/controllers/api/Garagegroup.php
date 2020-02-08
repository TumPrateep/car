<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Garagegroup extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('garagegroups');
    }

    public function getAllGarageGroup_get()
    {
        $data_check = $this->garagegroups->getAllGarageGroup();

        $option = [
            "data_check" => $data_check,
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

}