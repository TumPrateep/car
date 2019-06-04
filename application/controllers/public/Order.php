<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

    public function solution(){
        $this->load->view("public/menu/solution");
    }

    public function Orders(){
        if(!isset($this->session->userdata['logged_in'])){
			redirect(base_url());
        }
        // $data["orderId"] = $orderId;    
        $this->load->view("public/layout/head");
		$this->load->view("public/layout/product_style");
        $this->load->view("public/layout/header_login");
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/shop/order/breadcrumb");
        $this->load->view("public/layout/left-menu");
        $this->load->view("public/shop/order/content");//, $data
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/shop/order/script");
    }
}