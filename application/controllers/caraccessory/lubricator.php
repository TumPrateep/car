<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricator extends CI_Controller {

	function __construct()
  {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
	}
	
	function index($lubricator_brandId){
		$data['lubricator_brandId'] = $lubricator_brandId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/lubricator/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/lubricator/script");
  }

  function createLubricator(){
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/lubricator/create/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/lubricator/create/script");
  }

  function updateLubricator(){
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/lubricator/update/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/lubricator/update/script");
  }
    	

}