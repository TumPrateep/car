<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Car extends CI_Controller {

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
		$this->load->view("admin/car/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/car/script");
	}

	public function createBrand(){
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/car/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/car/create/script");
	}

	public function updateBrand($brandId){
		$data['brandId'] = $brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/car/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/car/update/script");
	}

	public function model($brandId)
	{
		$data['brandId'] = $brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/model/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/model/script");
	}
	
	public function year($brandId,$modelId){
		$data['brandId'] = $brandId;
		$data['modelId'] = $modelId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/year/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/year/script");
	}
	public function createModel($brandId){
		$data['brandId'] = $brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/model/create/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/model/create/script");
	}
	public function updateModel($brandId,$modelId){
		$data['modelId'] = $modelId;
		$data['brandId'] = $brandId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/model/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/model/update/script");
	}
	
	public function carmodel($brandId,$modelId)
	{
		$data["brandId"] = $brandId;
		$data["modelId"] = $modelId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/carmodel/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/carmodel/script");
	}

	function createCarModel($brandId,$modelId){
		$data["brandId"] = $brandId;
		$data["modelId"] = $modelId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/carmodel/create/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/carmodel/create/script");
	}

	public function updateCarmodel($brandId,$modelId,$modelofcarId)
	{
		$data["modelofcarId"] = $modelofcarId;
		$data["brandId"] = $brandId;
		$data["modelId"] = $modelId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/carmodel/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/carmodel/update/script");
	}

	public function machinetype($brandId,$modelId,$modelofcarId)
	{
		$data["modelofcarId"] = $modelofcarId;
		$data["brandId"] = $brandId;
		$data["modelId"] = $modelId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/machinetype/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/machinetype/script");
	}

	public function createMachinetype($brandId,$modelId,$modelofcarId)
	{
		$data["modelofcarId"] = $modelofcarId;
		$data["brandId"] = $brandId;
		$data["modelId"] = $modelId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/machinetype/create/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/machinetype/create/script");
	}
	public function updateMachinetype($brandId,$modelId,$modelofcarId,$machinetypeId)
	{
		$data["modelofcarId"] = $modelofcarId;
		$data["brandId"] = $brandId;
		$data["modelId"] = $modelId;
		$data["machinetypeId"] = $machinetypeId;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/machinetype/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/machinetype/update/script");
	}

}