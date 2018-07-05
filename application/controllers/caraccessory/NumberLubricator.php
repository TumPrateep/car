<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NumberLubricator extends CI_Controller {

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
		$this->load->view("caraccessory/numberLubricator/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/numberLubricator/script");
	}

	public function createnumberlubricator()
	{
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/numberLubricator/create/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/numberLubricator/create/script");
	}

	public function updatelubricatorNumber($lubricator_numberId){
		$data['lubricator_numberId'] = $lubricator_numberId;
	$this->load->view("caraccessory/layout/head");
	$this->load->view("caraccessory/layout/header");
	$this->load->view("caraccessory/layout/left-menu");
	$this->load->view("caraccessory/numberLubricator/update/content",$data);
	$this->load->view("caraccessory/layout/footer");
	$this->load->view("caraccessory/layout/foot");
	$this->load->view("caraccessory/numberLubricator/update/script");
}
	

}

