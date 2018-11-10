<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datagarage extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		
    }

    public function index()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
        $this->load->view("garage/layout/left-menu");
		$this->load->view("garage/datagarage/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/datagarage/script");
    }
    


    public function update()//($mechanicId)
	{
		//$data["mechanicId"] = $mechanicId;
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
		$this->load->view("garage/layout/left-menu");
		$this->load->view("garage/datagarage/update/content");//,$data);
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/datagarage/update/script");
	}
	

}