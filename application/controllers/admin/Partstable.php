<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partstable extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
		$this->load->model('partsproducts');
	}
	
	public function index()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/partstable/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/partstable/script");
	}

	public function create()
	{
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/partstable/create/content");
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/partstable/create/script");
	}

	public function update($parts_table_id){
		$data["parts_table_id"] = $parts_table_id;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/partstable/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/partstable/update/script");
	}
	
	public function lists($parts_table_id){
		$data["parts_table_id"] = $parts_table_id;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/partstable/lists/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/partstable/lists/script");
	}
	
	public function createlists($parts_table_id){
		$data["parts_table_id"] = $parts_table_id;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/partstable/lists/create/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/partstable/lists/create/script");
	}
	
	public function updatelists($parts_table_id, $parts_table_list_id){
		$data["parts_table_id"] = $parts_table_id;
		$data["parts_table_list_id"] = $parts_table_list_id;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/partstable/lists/update/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/partstable/lists/update/script");
	}
	
	public function product($parts_table_id){
		$data["parts_table_id"] = $parts_table_id;
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/partstable/product/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/partstable/product/script");
	}

	public function product_edit($parts_table_id, $partId){
		$data["parts_table_id"] = $parts_table_id;
		$data["partId"] = $partId;
		$data['partdata'] = $this->partsproducts->getUpdate($partId);
		$this->load->view("admin/layout/head");
		$this->load->view("admin/layout/left-menu");
		$this->load->view("admin/layout/header");
		$this->load->view("admin/partstable/productedit/content",$data);
		$this->load->view("admin/layout/footer");
		$this->load->view("admin/layout/foot");	
		$this->load->view("admin/partstable/productedit/script");
	}
}