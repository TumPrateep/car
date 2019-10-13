<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tire extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function index(){
		$data = ['tire'=>'active', 'lubricator' => '', 'garage' => ''];
		$data['brandId'] = $this->input->get('brandId');
		$data['model_name'] = $this->input->get('model_name');
		$data['year'] = $this->input->get('year');
		$data['modelofcarId'] = $this->input->get('modelofcarId');

		$this->load->view('users/layout/head');
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/menu', $data);
		// $this->load->view('users/layout/banner');
		$this->load->view('users/tire/content');
		$this->load->view('users/layout/footer');
		$this->load->view('users/layout/foot');
		$this->load->view('users/tire/script');
		$this->load->view('users/layout/end');
    }

}