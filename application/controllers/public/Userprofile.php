<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userprofile extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
        $this->load->view("lib");
        $this->load->model("userprofiles");
    }
	
	public function index()
	{
        
        $userId = $this->session->userdata['logged_in']['id'];
        $data['user_profile'] = $this->userprofiles->getuserById($userId);
    
        $this->load->view("public/layout/head");
        $this->load->view("public/layout/head_shop");
        $this->load->view("public/layout/header");
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/userprofile/content",$data);
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/userprofile/script");
    }
    
    public function update()
	{
        
        $userId = $this->session->userdata['logged_in']['id'];
        $data['user_profile'] = $this->userprofiles->getuserById($userId);
    
        $this->load->view("public/layout/head");
        $this->load->view("public/layout/head_shop");
        $this->load->view("public/layout/header");
        $this->load->view("public/layout/wishlist");
        $this->load->view("public/layout/menu");
        $this->load->view("public/userprofile/update/content",$data);
        $this->load->view("public/layout/copyright");        
        $this->load->view("public/layout/foot");
        $this->load->view("public/userprofile/update/script");
	}


}