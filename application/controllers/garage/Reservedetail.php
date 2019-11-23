<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Reservedetail extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->view("lib");
    }

    public function reservedetail($orderId)
    {
        $data['orderId'] = $orderId;
        $this->load->view("garage/layout/head");
        $this->load->view("garage/layout/left-menu");
        $this->load->view("garage/layout/header");
        $this->load->view("garage/reservedetail/content", $data);
        $this->load->view("garage/layout/footer");
        $this->load->view("garage/layout/foot");
        $this->load->view("garage/reservedetail/script");
    }
}