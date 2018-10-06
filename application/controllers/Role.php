<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		$this->load->view("lib");
    }

    function index(){
        $role = $this->session->userdata['logged_in']['role'];
        if($role == 1){
            // Admin
            redirect("admin");
        }else if($role == 2){
            // ร้านอะไหล่
            redirect("caraccessory");
        }else if($role == 3){
            // อู่
            redirect("garage");
        }else if($role == 4){
            // ผู้ใช้งาน
            redirect("");
        }else{
            // ไม่มี role
            redirect("userprofile");
        }
    }

}