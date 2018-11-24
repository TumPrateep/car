<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charge extends CI_Controller {

	function __construct(){
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }

    function LubricatorCharge()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/lubricatorcharge/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/lubricatorcharge/script");
	}
	
	public function createLubricatorCharge(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/lubricatorcharge/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/lubricatorcharge/create/script");
	}

	public function updateLubricatorCharge($lubricator_changeId){
		$data['lubricator_changeId'] = $lubricator_changeId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/lubricatorcharge/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/lubricatorcharge/update/script");
	}

    function TiresCharge()
	{
        $this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/tirecharge/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/tirecharge/script");
	}
	
	public function createTiresCharge(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/tirecharge/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/tirecharge/create/script");
	}

	public function updateTiresCharge($tire_changeId){
		$data['tire_changeId'] = $tire_changeId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/tirecharge/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/tirecharge/update/script");
	}

    function SpareCharge()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/sparecharge/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/sparecharge/script");
	}
	
	public function createSpareCharge(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/sparecharge/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/sparecharge/create/script");
	}

	public function updateSpareCharge($spares_changeId){
		$data['spares_changeId'] = $spares_changeId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/sparecharge/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/sparecharge/update/script");
	}
}