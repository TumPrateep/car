<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tiremodel extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
	}
	
	public function index($tire_brandId)
	{
		$data['tire_brandId'] = $tire_brandId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/tiremodel/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/tiremodel/script");
	}
	
	public function createTrieModel($tire_brandId)
	{
		$data['tire_brandId'] = $tire_brandId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/tiremodel/create/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/tiremodel/create/script");
	}

	public function updateTrieModel($tire_brandId,$tire_modelId)
	{
		$data['tire_brandId'] = $tire_brandId;
		$data['tire_modelId'] = $tire_modelId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/tiremodel/update/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/tiremodel/update/script");
	}
	

}