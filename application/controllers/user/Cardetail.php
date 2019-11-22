<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cardetail extends CI_Controller {


	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	function index(){
		$data = ['tire'=>'active', 'lubricator' => '', 'garage' => ''];
		load_user_view("users/cardetail/content", null, $data);
    }

}