<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {


	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	function index($tire_dataId, $garageId, $number){
		$data = ['tire'=>'active', 'lubricator' => '', 'garage' => ''];

		$data['tire_dataId'] = $tire_dataId;
		$data['garageId'] = $garageId;
		$data['number'] = $number;

		load_user_view("users/checkout/content", "users/checkout/script", $data, false);
    }

}