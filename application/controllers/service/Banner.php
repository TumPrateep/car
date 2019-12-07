<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends BD_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("promotes");
    }

    public function getAllBanner_get()
    {
        $result = $this->promotes->getAllBannerWithStatus();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}