<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exportorder extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
	}


	public function show($orderId)
	{
		$data['orderId']=$orderId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/exportorder/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/exportorder/script");
	}
	// public function index1($brandId)
	// {
	// 	$data['brandId']=$orderId;
	// 	$this->load->view("caraccessory/layout/head");
	// 	$this->load->view("caraccessory/layout/header");
	// 	$this->load->view("caraccessory/layout/left-menu");
	// 	$this->load->view("caraccessory/carmodel/content",$data);
	// 	$this->load->view("caraccessory/layout/footer");
	// 	$this->load->view("caraccessory/layout/foot");
	// 	$this->load->view("caraccessory/carmodel/script");
	// }
	// public function createModelCar($brandId)
	// {
	// 	$data['brandId']=$brandId;
	// 	$this->load->view("caraccessory/layout/head");
	// 	$this->load->view("caraccessory/layout/header");
	// 	$this->load->view("caraccessory/layout/left-menu");
	// 	$this->load->view("caraccessory/carmodel/create/content",$data);
	// 	$this->load->view("caraccessory/layout/footer");
	// 	$this->load->view("caraccessory/layout/foot");
	// 	$this->load->view("caraccessory/carmodel/create/script");
	// }
	// public function updateModelCar($brandId,$modelId)
	// {
	// 	$data['modelId'] = $modelId;
	// 	$data['brandId'] = $brandId;
	// 	$this->load->view("caraccessory/layout/head");
	// 	$this->load->view("caraccessory/layout/header");
	// 	$this->load->view("caraccessory/layout/left-menu");
	// 	$this->load->view("caraccessory/carmodel/update/content",$data);
	// 	$this->load->view("caraccessory/layout/footer");
	// 	$this->load->view("caraccessory/layout/foot");
	// 	$this->load->view("caraccessory/carmodel/update/script");
	// }
	

}