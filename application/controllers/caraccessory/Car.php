<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Car extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }
	
	public function index()
	{
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/car/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
	}

	public function createcar()
	{
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/car/create/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
	}

}