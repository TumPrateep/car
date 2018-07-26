<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Garages extends CI_Controller {

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
		$this->load->view("admin/garages/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/garages/script");
	}

	public function updategarages($garageId)
	{
		$data['garageId']=$garageId;		
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/garages/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");
		$this->load->view("admin/garages/update/script");
	}

}