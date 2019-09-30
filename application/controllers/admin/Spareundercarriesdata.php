<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class spareundercarriesdata extends CI_Controller {

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
		$this->load->view("admin/spareundercarriesdata/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/spareundercarriesdata/script");
    }

	public function createspareundercarriesdata(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/spareundercarriesdata/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/spareundercarriesdata/create/script");
	}
	
	public function updatespareundercarriesdata($sparesundercarriageDataId){
		$data['sparesundercarriageDataId'] = $sparesundercarriageDataId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/spareundercarriesdata/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/spareundercarriesdata/update/script");
    }
    
}