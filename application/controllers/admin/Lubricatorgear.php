<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricatorgear extends CI_Controller {

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
		$this->load->view("admin/lubricatorgearbrand/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorgearbrand/script");
	}

	public function createlubricatorgearbrand()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatorgearbrand/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorgearbrand/create/script");
	}

	public function updatelubricatorgearbrand($lubricator_brandId){
		$data["lubricator_brandId"] = $lubricator_brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatorgearbrand/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorgearbrand/update/script");
	}
	
	//// ชุดสาม
	public function lubricatorgears($lubricator_brandId)
	{
        $data["lubricator_brandId"] = $lubricator_brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatorgears/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorgears/script");
	}

	public function createlubricatorgear($lubricator_brandId)
	{
		$data["lubricator_brandId"] = $lubricator_brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatorgears/create/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorgears/create/script");
	}

	public function updatelubricatorgear($lubricator_brandId,$lubricatorId){
		$data["lubricatorId"] = $lubricatorId;
		$data["lubricator_brandId"] = $lubricator_brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/lubricatorgears/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/lubricatorgears/update/script");
	}

}
