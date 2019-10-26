<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resultgarage extends CI_Controller {


	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	function index($tire_modelId, $tire_sizeId, $tire_dataId){
		$data = ['tire'=>'active', 'lubricator' => '', 'garage' => ''];
		$data['tire_modelId'] = $tire_modelId;
		$data['tire_sizeId'] = $tire_sizeId;
		$data['tire_dataId'] = $tire_dataId;

		$this->load->view('users/layout/head');
		$this->load->view('users/layout/header');
		$this->load->view('users/layout/menu', $data);
		$this->load->view('users/tire/resultgarage/content');
		$this->load->view('users/layout/footer');
		$this->load->view('users/layout/foot');
		$this->load->view('users/tire/resultgarage/script');
		$this->load->view('users/layout/end');
    }

}