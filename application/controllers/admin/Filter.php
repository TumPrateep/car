<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filter extends CI_Controller {

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
		$this->load->view("admin/filterbrand/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/filterbrand/script");
	}

	public function createfilterbrand()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/filterbrand/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/filterbrand/create/script");
	}

	public function updatefilterbrand($filter_brandId){
		$data["filter_brandId"] = $filter_brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/filterbrand/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/filterbrand/update/script");
	}
	
	//// ชุดสาม
	public function filters($filter_brandId)
	{
        $data["filter_brandId"] = $filter_brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/filter/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/filter/script");
	}

	public function createfilter($filter_brandId)
	{
		$data["filter_brandId"] = $filter_brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/filter/create/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/filter/create/script");
	}

	public function updatefilter($filter_brandId, $filter_id){
		$data["filter_brandId"] = $filter_brandId;
		$data["filter_id"] = $filter_id;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/filter/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/filter/update/script");
	}

}
