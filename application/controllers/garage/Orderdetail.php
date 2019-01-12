<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mechanic extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->view("lib");
    }
    public function index()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
        $this->load->view("garage/layout/left-menu");
		$this->load->view("garage/mechanic/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/mechanic/script");
    }
    
    public function create()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
        $this->load->view("garage/layout/left-menu");
		$this->load->view("garage/mechanic/create/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/mechanic/create/script");
    }
  
	    

}