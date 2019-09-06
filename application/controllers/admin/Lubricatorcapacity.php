<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricatorcapacity extends CI_Controller {

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
		$this->load->view("admin/lubricatorcapacity/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorcapacity/script");
	}

	function capacity($machineId){
		$this->load->model("machines");
		$data['machineId'] = $machineId;
		$data['machine_type'] = $this->machines->getMachinesById($machineId)->machine_type;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatorcapacity/capacity/content", $data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorcapacity/capacity/script");
    }
    
    function createcapacity($machineId){
		$this->load->model("machines");
		$data['machineId'] = $machineId;
		$data['machine_type'] = $this->machines->getMachinesById($machineId)->machine_type;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatorcapacity/capacity/create/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorcapacity/capacity/create/script");
	}
	
	function updatecapacity($capacity_id,$machineId){
		$data['capacity_id'] = $capacity_id;
		$this->load->model("machines");
		$data['machineId'] = $machineId;
		// $data['machine_type'] = $this->machines->getMachinesById($machineId)->machine_type;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatorcapacity/capacity/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorcapacity/capacity/update/script");
	}

}
