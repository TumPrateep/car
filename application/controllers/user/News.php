<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function index(){
		$data = ['tire'=>'', 'lubricator' => '', 'garage' => ''];
		load_user_view("users/news/content", 'users/news/script', $data, false);
	}
	
	function detail($news_id){
		$data = ['tire'=>'', 'lubricator' => '', 'garage' => ''];
		$this->load->model("promotes");
		$data['news'] = $this->promotes->getNewsDetail($news_id);
		load_user_view("users/news/detail/content", 'users/news/detail/script', $data, false);
    }

}