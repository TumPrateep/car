<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SpareBrand extends CI_Controller {

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
		$this->load->view("caraccessory/SpareBrand/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/SpareBrand/script");
	}
	public function createSpareBrand($spares_undercarriageId)
	{
		$data['spares_undercarriageId'] = $spares_undercarriageId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/SpareBrand/create/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/SpareBrand/create/script");
	}
	public function updateSpareBrand($spares_undercarriageId)
	{
		$data['spares_undercarriageId'] = $spares_undercarriageId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/SpareBrand/update/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/SpareBrand/update/script");
	}
}