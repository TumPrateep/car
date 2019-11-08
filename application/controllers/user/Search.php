<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function lubricator(){
		$data = ['tire'=>'', 'lubricator' => 'active', 'garage' => ''];

		load_user_view("users/main-search/lubricator/content", null, $data);
    }

	function tire(){
		$data = ['tire'=>'active', 'lubricator' => '', 'garage' => ''];

		load_user_view("users/main-search/tire/content", 'users/main-search/tire/script', $data);

	}
}