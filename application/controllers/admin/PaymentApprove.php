<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaymentApprove extends CI_Controller {

	function __construct(){
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }

    function index()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/paymentapprove/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/paymentapprove/script");
	}

}