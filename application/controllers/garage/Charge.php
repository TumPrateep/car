<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charge extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }

    public function lubricator()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
		$this->load->view("garage/layout/left-menu");
		$this->load->view("garage/charge/lubricator/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/charge/lubricator/script");
	}

	
	public function createlubricator()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
		$this->load->view("garage/layout/left-menu");
		$this->load->view("garage/charge/lubricator/create/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/charge/lubricator/create/script");
	}


	public function spares()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
		$this->load->view("garage/layout/left-menu");
		$this->load->view("garage/charge/spares/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/charge/spares/script");
	}

	public function createspares()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
		$this->load->view("garage/layout/left-menu");
		$this->load->view("garage/charge/spares/create/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/charge/spares/create/script");
	}

	public function tire()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
		$this->load->view("garage/layout/left-menu");
		$this->load->view("garage/charge/tire/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/charge/tire/script");
	}

	
	public function createtire()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
		$this->load->view("garage/layout/left-menu");
		$this->load->view("garage/charge/tire/create/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/charge/tire/create/script");
	}

	public function updatetire()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
		$this->load->view("garage/layout/left-menu");
		$this->load->view("garage/charge/tire/update/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/charge/tire/update/script");
	}


}