<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Role extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->view("lib");
    }

    public function index()
    {
        $role = $this->session->userdata['logged_in']['role'];
        if ($role == 1) {
            // Admin
            redirect("admin/paymentapprove");
        } else if ($role == 2) {
            // ร้านอะไหล่
            redirect("caraccessory/orderselect");
        } else if ($role == 3) {
            // อู่
            redirect("garage/reserve");
        } else if ($role == 4) {
            // ผู้ใช้งาน
            redirect("user/carprofile");
        } else {
            // ไม่มี role
            redirect("userprofile");
        }
    }

}