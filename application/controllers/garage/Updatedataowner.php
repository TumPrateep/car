<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Updatedataowner extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		
    }

    public function index()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
        $this->load->view("garage/layout/left-menu");
		$this->load->view("garage/updatedataowner/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/updatedataowner/script");
    }
    


    public function updates($mechanicId)
	{
		$data["mechanicId"] = $mechanicId;
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
		$this->load->view("garage/layout/left-menu");
		$this->load->view("garage/updatedataowner/updates/content",$data);
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/updatedataowner/updates/script");
	}
	

}