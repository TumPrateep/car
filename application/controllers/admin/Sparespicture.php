<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sparespicture extends CI_Controller {

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
		$this->load->view("admin/sparespicture/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/sparespicture/script");
    }
	public function createsparespicture(){
		// $data['spares_undercarriageId'] = $spares_undercarriageId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/sparespicture/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/sparespicture/create/script");
	}

	public function updatesparespicture($spare_pictire_id){
		$data['spare_pictire_id'] = $spare_pictire_id;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/sparespicture/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/sparespicture/update/script");
	}
}