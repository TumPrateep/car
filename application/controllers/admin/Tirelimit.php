<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tirelimit extends CI_Controller {

	function __construct(){
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
	}

    function GarageGruop()
	{
        $this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/setproductprice/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/setproductprice/script");
	}

	public function tiresizecharge($groupId){
		$data['groupId'] = $groupId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/setproductprice/tirecharge/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/setproductprice/tirecharge/script");
	}
	
	public function createTiresCharge($groupId){
		$data['groupId'] = $groupId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/setproductprice/tirecharge/create/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/setproductprice/tirecharge/create/script");
	}

	public function updateTiresCharge($limitId, $groupId){
		$data['limitId'] = $limitId;
		$data['groupId'] = $groupId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/setproductprice/tirecharge/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/setproductprice/tirecharge/update/script");
	}

}