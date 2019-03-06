<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrderDetail extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }

  //   public function show($orderId){
		// $data['orderId'] = $orderId;
		// $this->load->view("garage/layout/head");
		// $this->load->view("garage/layout/left-menu");
		// $this->load->view("garage/layout/header");
		// $this->load->view("garage/orderdetail/content", $data);
		// $this->load->view("garage/layout/footer");
		// $this->load->view("garage/layout/foot");	
		// $this->load->view("garage/orderdetail/script");
  //   }

    public function show(){
		// $data['orderId'] = $orderId;
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/left-menu");
		$this->load->view("garage/layout/header");
		$this->load->view("garage/orderdetail/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");	
		$this->load->view("garage/orderdetail/script");
    }
}