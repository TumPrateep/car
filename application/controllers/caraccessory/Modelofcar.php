<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelofcar extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }
    function index($brandId,$modelId){
        $data['brandId'] = $brandId;
        $data['modelId'] = $modelId;
        $this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/modelofcar/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/modelofcar/script");
    }
    function create($brandId,$modelId){
        $data['brandId'] = $brandId;
        $data['modelId'] = $modelId;
        $this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/modelofcar/create/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/modelofcar/create/script");
    }
    function update($brandId,$modelId,$modelofcarId){
        $data['brandId'] = $brandId;
        $data['modelId'] = $modelId;
        $data['modelofcarId'] = $modelofcarId;
        $this->load->view("caraccessory/layout/head");
		$this->load->view("caraccessory/layout/header");
		$this->load->view("caraccessory/layout/left-menu");
		$this->load->view("caraccessory/modelofcar/update/content",$data);
		$this->load->view("caraccessory/layout/footer");
		$this->load->view("caraccessory/layout/foot");
		$this->load->view("caraccessory/modelofcar/update/script");
    }
}