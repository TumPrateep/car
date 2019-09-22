<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricatormatching extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
	}
	
	public function index()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatormatching/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatormatching/script");
	}

	public function createlubricatormatching()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatormatching/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatormatching/create/script");
	}

	public function updatelubricatormatching($lubricatorId){
		$data["lubricatorId"] = $lubricatorId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatormatching/update/content",$data); //,$data
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatormatching/update/script");
	}
}
