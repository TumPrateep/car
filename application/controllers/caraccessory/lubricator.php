<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricator extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
	}
	
	public function index()
	{
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/lubricatorbrand/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");	
		$this->load->view("caraccessory/lubricatorbrand/script");
	}

	public function createlubricatorbrand()
	{
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/lubricatorbrand/create/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");	
		$this->load->view("caraccessory/lubricatorbrand/create/script");
	}

	public function updatelubricatorbrand($lubricator_brandId){
		$data["lubricator_brandId"] = $lubricator_brandId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/lubricatorbrand/update/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");	
		$this->load->view("caraccessory/lubricatorbrand/update/script");
	}
	
	public function lubricators($lubricator_brandId)
	{
        $data["lubricator_brandId"] = $lubricator_brandId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/lubricator/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");	
		$this->load->view("caraccessory/lubricator/script");
	}

	public function createlubricator($lubricator_brandId)
	{
		$data["lubricator_brandId"] = $lubricator_brandId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/lubricator/create/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");	
		$this->load->view("caraccessory/lubricator/create/script");
	}

	public function updatelubricator($lubricatorId){
		$data["lubricatorId"] = $lubricatorId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/lubricator/update/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");	
		$this->load->view("caraccessory/lubricator/update/script");
	}

}
