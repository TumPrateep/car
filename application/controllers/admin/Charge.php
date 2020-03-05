<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Charge extends CI_Controller {

	function __construct(){
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
	}
	
	function brand(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/brand/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/brand/script");
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

	public function tiresizecharge($rimId){
		$data['rimId'] = $rimId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/tiresizecharge/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/tiresizecharge/script");
	}
	
	public function createtiresizecharge($rimId){
		$data['rimId'] = $rimId;
			
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/tiresizecharge/create/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/tiresizecharge/create/script");
	}
	
	public function updatetiresizecharge($rimId, $tire_sizeId, $tire_size_chargeId){
		$data['rimId'] = $rimId;
		$data['tire_sizeId'] = $tire_sizeId;
		$data['tire_size_chargeId'] = $tire_size_chargeId;		
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/tiresizecharge/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/tiresizecharge/update/script");
	}

    function SpareCharge($brandId)
	{
		$data["brandId"] = $brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/sparecharge/content", $data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/sparecharge/script");
	}
	
	public function createSpareCharge($brandId){
		$this->load->model("sparesundercarriages");

		$data['brandId'] = $brandId;
		// $data['spares'] = $this->sparesundercarriages->getAllSpare();

		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/sparecharge/create/content", $data);
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

	public function tireservice(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/tireservice/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/tireservice/script");
	}

	public function createtireservice(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/tireservice/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/tireservice/create/script");
	}

	public function updatetireservice($tire_serviceId){
		$data['tire_serviceId'] = $tire_serviceId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/tireservice/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/tireservice/update/script");
	}

	public function lubricatorservice(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/lubricatorservice/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/lubricatorservice/script");
	}

	public function createlubricatorservice(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/lubricatorservice/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/lubricatorservice/create/script");
	}

	public function updatelubricatorservice($lubricator_serviceId){
		$data['lubricator_serviceId'] = $lubricator_serviceId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/lubricatorservice/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/lubricatorservice/update/script");
	}
	function LubricatorGearCharge()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/lubricatorgearcharge/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/lubricatorgearcharge/script");
	}
	public function createLubricatorGearCharge(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/lubricatorgearcharge/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/lubricatorgearcharge/create/script");
	}
	public function updateLubricatorGearCharge($lubricator_gear_changeId){
		$data['lubricator_gear_changeId'] = $lubricator_gear_changeId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/charge/lubricatorgearcharge/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/charge/lubricatorgearcharge/update/script");
	}

}