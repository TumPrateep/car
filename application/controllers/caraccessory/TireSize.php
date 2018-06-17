<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TireSize extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }
	
	public function index($rimId)
	{
        $data['rimId'] = $rimId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/tiresize/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/tiresize/script");
	}

	public function createTrieSize($rimId)
	{
        $data['rimId'] = $rimId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/tiresize/create/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		
	}
	
	public function createTireSize($tire_rimId,$tire_sizeId)
	{
		$data['tire_rimId'] = $tire_rimId;
		$data['tire_sizeId'] = $tire_sizeId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/tiresize/create/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/tiresize/create/script");
	}

}

