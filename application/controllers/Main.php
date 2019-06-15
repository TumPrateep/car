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
		$this->load->view("public/layout/head_shop");
		$isEmpty = empty($this->session->userdata['logged_in']);
		$isUser = false;
		$userData = null;
		if(!$isEmpty){
			$isUser = $this->session->userdata['logged_in']['isUser'];
			$userData = $this->session->userdata['logged_in'];
			if(!$isUser){
				$this->load->view("public/layout/header");
			}else{
				$this->load->view("public/layout/header_login");
			}
		}else{
			$this->load->view("public/layout/header");
		}
		$data["userData"] = $userData;
		$data["isUser"] = $isUser;
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/layout/banner", $data);
        // $this->load->view("public/layout/main");
		$this->load->view("public/layout/brand");
		$this->load->view("public/layout/footer");
		$this->load->view("public/layout/copyright");
		$this->load->view("public/layout/foot");
		if($isUser){
			$this->load->view("public/layout/script");
		}
    }

}