<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sparebrand extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
	}
	
	public function index($spares_undercarriageId)
	{
		$data['spares_undercarriageId']=$spares_undercarriageId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/sparebrand/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/sparebrand/script");
	}
	public function createSpareBrand($spares_undercarriageId)
	{
		$data['spares_undercarriageId'] = $spares_undercarriageId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/Sparebrand/create/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/Sparebrand/create/script");
	}
	public function updateSpareBrand($spares_undercarriageId,$spares_brandId)
	{
		$data['spares_undercarriageId'] = $spares_undercarriageId;
		$data['spares_brandId'] = $spares_brandId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/sparebrand/update/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/sparebrand/update/script");
	}
}