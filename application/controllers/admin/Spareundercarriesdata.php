<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spareundercarriesdata extends CI_Controller {

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
		$this->load->view("admin/Spareundercarriesdata/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/Spareundercarriesdata/script");
    }

	public function createspareundercarriesdata(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/Spareundercarriesdata/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/Spareundercarriesdata/create/script");
	}
	
	public function updatespareundercarriesdata($sparesundercarriageDataId){
		$data['sparesundercarriageDataId'] = $sparesundercarriageDataId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/Spareundercarriesdata/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/Spareundercarriesdata/update/script");
    }
    
}