<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detailgarage extends CI_Controller {


	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	function index(){
		$data = ['tire'=>'active', 'lubricator' => '', 'garage' => ''];
		$this->load->view('users/layout/head');
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/menu', $data);
		$this->load->view('users/garage/detailgarage/content');
		// $this->load->view('users/garage/detailgarage/script');
		$this->load->view('users/layout/footer');
		$this->load->view('users/layout/foot');
		$this->load->view('users/layout/end');
    }

}