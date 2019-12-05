<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Numbertracking extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("numbertrackings");
    }

    public function getNumbertracking_get()
    {
        $orderId = $this->get("orderId");
        $result = $this->numbertrackings->getNumbertracking($orderId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}