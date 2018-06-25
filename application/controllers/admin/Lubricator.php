<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricator extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }
	
	public function index($lubricatorId)
	{
        $data["lubricatorId"] = $lubricatorId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricator/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricator/script");
	}

	public function createlubricator()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricator/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricator/create/script");
	}

	public function updatelubricator($lubricatorId){
		$data["lubricatorId"] = $lubricatorId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricator/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricator/update/script");
	}

}
