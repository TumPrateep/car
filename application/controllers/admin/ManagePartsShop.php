<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ManagePartsShop extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }

    public function index()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/managepartsshop/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/managepartsshop/script");
	}
	
	public function updatePartsShop($car_accessoriesId){
		$data['car_accessoriesId'] = $car_accessoriesId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/managepartsshop/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/managepartsshop/update/script");
	}
    
    


}