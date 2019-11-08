<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicehistory extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function index(){
		$data = ['tire'=>'', 'lubricator' => '', 'garage' => ''];

		$this->load->view('users/layout/head');
		$this->load->view('users/layout/header_user');
		$this->load->view('users/layout/menu', $data);
		// $this->load->view('users/layout/banner');
		$this->load->view('users/service-history/content');
		$this->load->view('users/layout/footer');
		$this->load->view('users/layout/foot');
		$this->load->view('users/service-history/script');
		$this->load->view('users/layout/end');
    }

}