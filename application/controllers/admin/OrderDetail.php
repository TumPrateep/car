<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrderDetail extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }

    public function show($orderId){
		$data['orderId'] = $orderId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/orderdetail/content", $data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/orderdetail/script");
    }
}