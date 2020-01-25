<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Payment extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->view("lib");
    }

    // public function index()
    // {
    //     $this->load->view("admin/layout/head");
    //     $this->load->view("admin/layout/left-menu");
    //     $this->load->view("admin/layout/header");
    //     $this->load->view("admin/garagesmanagement/content");
    //     $this->load->view("admin/layout/footer");
    //     $this->load->view("admin/layout/foot");
    //     $this->load->view("admin/garagesmanagement/script");
    // }

    public function garage()
    {
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/payment/garage/content");
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/payment/garage/script");
    }

    public function garage_detail($garageId)
    {
        $data['garageId'] = $garageId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/payment/garage/detail/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/payment/garage/detail/script");
    }

    public function caraccessories()
    {
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/payment/caraccessories/content");
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/payment/caraccessories/script");
    }

    public function caraccessories_detail($userId)
    {
        $data['userId'] = $userId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/payment/caraccessories/detail/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/payment/caraccessories/detail/script");
    }

}