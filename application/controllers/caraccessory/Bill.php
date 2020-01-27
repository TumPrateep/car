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
        $this->load->view("caraccessory/layout/head");
        $this->load->view("caraccessory/layout/header");
        $this->load->view("caraccessory/layout/left-menu");
        $this->load->view("caraccessory/bill/content");
        $this->load->view("caraccessory/layout/footer");
        $this->load->view("caraccessory/layout/foot");
        $this->load->view("caraccessory/bill/script");
    }

    public function detail($billId)
    {
        $data['billId'] = $billId;
        $this->load->view("caraccessory/layout/head");
        $this->load->view("caraccessory/layout/header");
        $this->load->view("caraccessory/layout/left-menu");
        $this->load->view("caraccessory/bill/bill_detail/content", $data);
        $this->load->view("caraccessory/layout/footer");
        $this->load->view("caraccessory/layout/foot");
        $this->load->view("caraccessory/bill/bill_detail/script");
    }
}