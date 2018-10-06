<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function index(){
		$this->load->view("public/layout/head");
		if(isset($this->session->userdata['logged_in'])){
			$isUser = $this->session->userdata['logged_in']['isUser'];
			if(!$isUser){
				$this->load->view("public/layout/header");
			}else{
				$this->load->view("public/layout/header_temp");
			}
		}else{
			$this->load->view("public/layout/header");
		}
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/layout/banner");
        $this->load->view("public/layout/main");
		$this->load->view("public/layout/brand");
		$this->load->view("public/layout/footer");
		$this->load->view("public/layout/copyright");
		$this->load->view("public/layout/foot");
		$this->load->view("public/layout/script");
    }

}