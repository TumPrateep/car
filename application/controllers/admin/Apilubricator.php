<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apilubricator extends CI_Controller {

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
		$this->load->view("admin/apilubricator/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/apilubricator/script");
	}

	function api($machineId){
		$this->load->model("machines");
		$data['machineId'] = $machineId;
		$data['machine_type'] = $this->machines->getMachinesById($machineId)->machine_type;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/apilubricator/api/content", $data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/apilubricator/api/script");
	}

}
