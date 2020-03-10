<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

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
		$this->load->view("admin/news/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/news/script");
	}

	public function createnews()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/news/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/news/create/script");
	}

	public function updatenews($lubricator_brandId){
		$data["lubricator_brandId"] = $lubricator_brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/news/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/news/update/script");
	}

}
