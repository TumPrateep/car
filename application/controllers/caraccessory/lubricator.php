<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricator extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
	}
	
	function index(){
		$this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/lubricator/content");
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
    }
    	

}