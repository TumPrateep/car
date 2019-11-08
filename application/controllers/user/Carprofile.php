<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carprofile extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function index(){
		$data = ['tire'=>'', 'lubricator' => '', 'garage' => ''];

		load_user_view("users/car-profile/content", "users/car-profile/script", $data);
    }

}