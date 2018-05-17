<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
		if(!isset($this->session->userdata['logged_in'])){
			redirect("auth/login");
		}
    }
	
	public function index()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/layout/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/layout/script");
	}

	public function car()
	{
		$this->load->view("admin/brandcar/head");
		$this->load->view("admin/brandcar/left-menu");
		$this->load->view("admin/brandcar/header");
		$this->load->view("admin/brandcar/content");
		$this->load->view("admin/brandcar/footer");
		$this->load->view("admin/brandcar/foot");	
		$this->load->view("admin/brandcar/script");
	}

	public function test()
	{
		$this->load->view("auth/register");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */