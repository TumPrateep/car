<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Confirmrepair extends CI_Controller
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
        $this->load->view("garage/confirmrepair/content");
        $this->load->view("garage/layout/footer");
        $this->load->view("garage/layout/foot");
        $this->load->view("garage/confirmrepair/script");
    }
}