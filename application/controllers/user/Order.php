<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function index(){
		$data = ['tire'=>'', 'lubricator' => '', 'garage' => ''];

		load_user_view("users/order/content", "users/order/script", $data);
	}
	
	function orderdetails($orderId){
		$data = ['tire'=>'', 'lubricator' => '', 'garage' => ''];
		$data['orderId'] = $orderId;

		load_user_view("users/orderdetails/content", "users/orderdetails/script", $data);
	}

}