<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function lubricator(){
		$data = ['tire'=>'', 'lubricator' => 'active', 'garage' => ''];

		$this->load->view('users/layout/head');
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/menu', $data);
		$this->load->view('users/layout/banner');
		$this->load->view('users/main-search/lubricator/content');
		$this->load->view('users/layout/footer');
		$this->load->view('users/layout/foot');
		// $this->load->view('users/layout/script');
		$this->load->view('users/layout/end');
    }

	function tire(){
		$data = ['tire'=>'active', 'lubricator' => '', 'garage' => ''];
		$this->load->view('users/layout/head');
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/menu', $data);
		$this->load->view('users/layout/banner');
		$this->load->view('users/main-search/tire/content');
		$this->load->view('users/layout/footer');
		$this->load->view('users/layout/foot');
		$this->load->view('users/main-search/tire/script');
		$this->load->view('users/layout/end');
	}
}