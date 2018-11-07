<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SingleProduct extends CI_Controller {

    public function solution(){
        $this->load->view("public/menu/solution");
    }

    public function index(){
        $this->load->view("public/layout/head");
        $this->load->view("public/layout/header");
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/singleproduct/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        // $this->load->view("public/singleproduct/script");
    }

    
}