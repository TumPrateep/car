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
        $this->load->model("tire_dots");
    }

    public function getNumbertracking_get()
    {
        $orderDetailId = $this->get("orderDetailId");
        $output["tracking"] = $this->numbertrackings->getNumbertracking($orderDetailId);
        $output["dot"] = $this->tire_dots->getAllDot($orderDetailId);
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}