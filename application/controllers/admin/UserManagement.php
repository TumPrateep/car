<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserManagement extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }

    public function index(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/user/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/user/script");
    }
    
	public function createUser(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/user/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/user/create/script");
	}
	
	public function updateUser($id){
		$data['id'] = $id;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/user/update/content", $data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/user/update/script");
	}

	public function editrole($userId,$category){
		$data['userId'] = $userId;
		$data['category'] = $category;
		$this->load->view("admin/layoutwizard/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/user/editrole/content", $data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layoutwizard/foot");	
		$this->load->view("admin/user/editrole/script");
	}
}
