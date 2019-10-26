<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


	public function caraccessory(){
        $data = [
			'tire' => 'active', 'lubricator' => '', 'garage' => '',
			'cardata' => 'active', 'tiredata' => '',
			'brandId' => '', 'model_name' => '', 'year' => '', 'modelofcarId' => '',
			'tire_brandId' => '', 'tire_modelId' => '', 'rimId' => '', 'tire_sizeId' => ''
        ];
        
        $this->load->view('users/layout/head');
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/menu', $data);
		// $this->load->view('users/layout/banner');
		$this->load->view('users/register/caraccessory/content');
		$this->load->view('users/layout/footer');
		$this->load->view('users/layout/foot');
		$this->load->view('users/register/caraccessory/script');
		$this->load->view('users/layout/end');
	}

}