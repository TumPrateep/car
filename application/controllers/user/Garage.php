<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Garage extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function index(){
		$this->load->view('users/layout/head');
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/menu');
		// $this->load->view('users/layout/banner');
		$this->load->view('users/garage/content');
		$this->load->view('users/layout/footer');
		$this->load->view('users/layout/foot');
		$this->load->view('users/garage/script');
		$this->load->view('users/layout/end');
    }

}