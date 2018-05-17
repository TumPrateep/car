<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
		if(!isset($this->session->userdata['logged_in'])){
			redirect("auth/login");
		}
	}
	
	function index(){
        echo "ผู้ใช้งาน";
    }

}