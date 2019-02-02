<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Managegarage extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->view("lib");
    }
    public function index()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
        $this->load->view("garage/layout/left-menu");
		$this->load->view("garage/managegarage/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/managegarage/script");
    }
    

    public function update()//($mechanicId)
	{
		// $data["mechanicId"] = $mechanicId;
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
        $this->load->view("garage/layout/left-menu");
        $this->load->view("garage/managegarage/update/content");
        // $this->load->view("garage/mechanic/update/content", $data);
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/managegarage/update/script");
	}
	    
    // public function show($mechanicId)
	// {
	// 	$data["mechanicId"] = $mechanicId;
	// 	$this->load->view("garage/layout/head");
	// 	$this->load->view("garage/layout/header");
    //  $this->load->view("garage/layout/left-menu");
	// 	$this->load->view("garage/managegarage/show/content", $data);
	// 	$this->load->view("garage/layout/footer");
	// 	$this->load->view("garage/layout/foot");
	// 	$this->load->view("garage/managegarage/show/script");
	// }
	public function test()
	{
		$this->load->view("garage/layout/head");
		$this->load->view("garage/layout/header");
        $this->load->view("garage/layout/left-menu");
		$this->load->view("garage/managegarage/test/content");
		$this->load->view("garage/layout/footer");
		$this->load->view("garage/layout/foot");
		$this->load->view("garage/managegarage/test/script");
    }

}