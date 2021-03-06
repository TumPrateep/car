<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Bill extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->view("lib");
    }

    public function index()
    {
        $this->load->view("garage/layout/head");
        $this->load->view("garage/layout/header");
        $this->load->view("garage/layout/left-menu");
        $this->load->view("garage/bill/content");
        $this->load->view("garage/layout/footer");
        $this->load->view("garage/layout/foot");
        $this->load->view("garage/bill/script");
    }

    public function detail($billId)
    {
        $data['billId'] = $billId;
        $this->load->view("garage/layout/head");
        $this->load->view("garage/layout/header");
        $this->load->view("garage/layout/left-menu");
        $this->load->view("garage/bill/bill_detail/content", $data);
        $this->load->view("garage/layout/footer");
        $this->load->view("garage/layout/foot");
        $this->load->view("garage/bill/bill_detail/script");
    }
}