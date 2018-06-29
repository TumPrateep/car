<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BrandLubricator extends CI_Controller {

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
		$this->load->view("caraccessory/brandLubricator/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/brandLubricator/script");
	}
	
	public function createBrandLubricator()
	{
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/brandLubricator/create/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/brandLubricator/create/script");
	}

	public function updateBrandLubricator($lubricator_brandId)
	{
<<<<<<< HEAD
		$data['lubricator_brandId'] = $lubricator_brandId;
=======
		$data['lubricator_brandId']=$lubricator_brandId;
>>>>>>> 51c7fa6eb3b31dc3f9e0d919856c9da713115c51
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/brandLubricator/update/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/brandLubricator/update/script");
	}

}
