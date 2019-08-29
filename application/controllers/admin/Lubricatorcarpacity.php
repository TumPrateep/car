<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricatorcarpacity extends CI_Controller {

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
		$this->load->view("admin/lubricatorcarpacity/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorcarpacity/script");
	}

	function carpacity($machineId){
		$this->load->model("machines");
		$data['machineId'] = $machineId;
		$data['machine_type'] = $this->machines->getMachinesById($machineId)->machine_type;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatorcarpacity/carpacity/content", $data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorcarpacity/carpacity/script");
    }
    
    function createcarpacity($machineId){
		$this->load->model("machines");
		$data['machineId'] = $machineId;
		$data['machine_type'] = $this->machines->getMachinesById($machineId)->machine_type;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatorcarpacity/carpacity/create/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorcarpacity/carpacity/create/script");
	}
	
	function updatecarpacity($capacity_id){
		$data['capacity_id'] = $capacity_id;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatorcarpacity/carpacity/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorcarpacity/carpacity/update/script");
	}

}
