<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function index(){
		$data = ['tire'=>'active', 'lubricator' => '', 'garage' => ''];
		
		$this->load->view('users/layout/head', $data);
		if(isset($this->session->userdata['logged_in'])){
			$isUser = $this->session->userdata['logged_in']['isUser'];
			if(!$isUser){
				$this->load->view("users/layout/header");
			}else{
				$data['name'] = $this->session->userdata['logged_in']['name'];
				$this->load->view("users/layout/header_user", $data);
			}
		}else{
			$this->load->view("users/layout/header");
        }
		$this->load->view('users/layout/menu');
		$this->load->view('users/layout/banner');
		$this->load->view('users/main-search/tire/content');
		$this->load->view('users/layout/news');
		$this->load->view('users/layout/footer');
		$this->load->view('users/layout/foot');
		$this->load->view('users/main-search/tire/script');
		$this->load->view('users/layout/end');
    }

}