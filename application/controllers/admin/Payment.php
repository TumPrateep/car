<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }
	
	// public function index()
	// {
	// 	$this->load->view("admin/layout/head");
	// 	$this->load->view("admin/layout/left-menu");
	// 	$this->load->view("admin/layout/header");
	// 	$this->load->view("admin/garagesmanagement/content");
	// 	$this->load->view("admin/layout/footer");
	// 	$this->load->view("admin/layout/foot");	
	// 	$this->load->view("admin/garagesmanagement/script");
    // }  
    
    
	public function garagesmanagementindex()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/payment/garagesmanagement/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/payment/garagesmanagement/script");
	}

	public function garagesmanagementshow($garageId)
    {
		$data['garageId'] = $garageId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/payment/garagesmanagement/paymentapprove/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/payment/garagesmanagement/paymentapprove/script");
	}

    public function managepartsshopindex()
    {
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/payment/managepartsshop/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/payment/managepartsshop/script");
	}

	public function managepartsshopshow($userId)
    {
		$data['userId'] = $userId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/payment/managepartsshop/paymentapprove/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/payment/managepartsshop/paymentapprove/script");
	}

}