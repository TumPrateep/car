<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Import extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->view("lib");
    }

    public function tireimport()
    {
        $this->load->view("caraccessory/layout/head");
        $this->load->view("caraccessory/layout/header");
        $this->load->view("caraccessory/layout/left-menu");
        $this->load->view("caraccessory/tiredata/import/content");
        $this->load->view("caraccessory/layout/footer");
        $this->load->view("caraccessory/layout/foot");
        $this->load->view("caraccessory/tiredata/import/script");
    }
}