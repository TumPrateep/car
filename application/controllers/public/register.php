<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function sparepart()
    {
        $this->load->view("public/layout/head");
        $this->load->view("public/layout/header");
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/register/sparepart/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/register/sparepart/script");
    }

    public function garage()
    {
        $this->load->view("public/layout/head");
        $this->load->view("public/layout/header");
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/register/garage/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/register/garage/script");
    }

    public function user()
    {
        $this->load->view("public/layout/head");
        $this->load->view("public/layout/header");
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/register/user/content");
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/register/user/script");
    }

}