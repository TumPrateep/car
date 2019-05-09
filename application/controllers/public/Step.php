<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Step extends CI_Controller {

    // public function solution(){
    //     $this->load->view("public/menu/solution");
    // }
    // function __construct()
    // {
    //     parent::__construct();
    //     $this->load->view("lib");
    // }

    public function index(){
        $this->load->view("public/layout/head");
		$this->load->view("public/layout/product_style");
        $this->load->view("public/layout/header_login");
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/step/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/step/script");
    }
}