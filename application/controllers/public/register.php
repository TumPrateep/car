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
        echo "garage register";
    }

    public function user()
    {
        echo "user register";
    }

}