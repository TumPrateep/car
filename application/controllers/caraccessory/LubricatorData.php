<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricatordata extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
	}
	
	public function index()
	{
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/lubricatordata/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");	
		$this->load->view("caraccessory/lubricatordata/script");
	}

	public function create()
	{
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/lubricatordata/create/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");	
		$this->load->view("caraccessory/lubricatordata/create/script");
	}

	public function update($lubricator_dataId)
	{
		$data['lubricator_dataId']=$lubricator_dataId;
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/lubricatordata/update/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");	
		$this->load->view("caraccessory/lubricatordata/update/script");
	}
}
