<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Complete extends CI_Controller
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
        $this->load->view("garage/complete/content");
        $this->load->view("garage/layout/footer");
        $this->load->view("garage/layout/foot");
        $this->load->view("garage/complete/script");
    }
}