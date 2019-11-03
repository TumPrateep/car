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
		$this->load->view('users/layout/head');
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/menu', $data);
		$this->load->view('users/checkout/content');
		$this->load->view('users/layout/footer');
		$this->load->view('users/layout/foot');
		$this->load->view('users/checkout/script');
		$this->load->view('users/layout/end');
    }

}