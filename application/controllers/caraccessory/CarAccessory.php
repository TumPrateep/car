<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CarAccessory extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
	}
	
	function index(){
        echo "ร้านอะไหล่";
    }

}