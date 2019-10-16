<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tire extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function index(){
		$data = [
			'tire' => 'active', 'lubricator' => '', 'garage' => '',
			'cardata' => 'active', 'tiredata' => '',
			'brandId' => '', 'model_name' => '', 'year' => '', 'modelofcarId' => '',
			'tire_brandId' => '', 'tire_modelId' => '', 'rimId' => '', 'tire_sizeId' => ''
		];

		$brandId = $this->input->get('brandId');
		if(!empty($brandId)){
			$data['cardata'] = 'active';
			$data['brandId'] = $this->input->get('brandId');
			$data['model_name'] = $this->input->get('model_name');
			$data['year'] = $this->input->get('year');
			$data['modelofcarId'] = $this->input->get('modelofcarId');
		}
		
		$tire_brandId = $this->input->get('tire_brandId');
		if(!empty($tire_brandId)){
			$data['tiredata'] = 'active';
			$data['tire_brandId'] = $this->input->get('tire_brandId');
			$data['tire_modelId'] = $this->input->get('tire_modelId');
			$data['rimId'] = $this->input->get('rimId');
			$data['tire_sizeId'] = $this->input->get('tire_sizeId');
		}

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