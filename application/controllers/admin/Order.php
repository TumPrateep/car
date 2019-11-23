<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Order extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->view("lib");
    }

    public function index()
    {
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/order/content");
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/order/script");
    }

}