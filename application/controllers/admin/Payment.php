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

    public function garage_bill($garageId)
    {
        $data['garageId'] = $garageId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/payment/garage/bill/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/payment/garage/bill/script");
    }

    public function garage_create_bill($garageId)
    {
        $data['garageId'] = $garageId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/payment/garage/create/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/payment/garage/create/script");
    }

    public function garage_bill_detail($garageId, $billId)
    {
        $data['garageId'] = $garageId;
        $data['billId'] = $billId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/payment/garage/bill_detail/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/payment/garage/bill_detail/script");
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

    public function caraccessories_bill($userId)
    {
        $data['userId'] = $userId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/payment/caraccessories/bill/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/payment/caraccessories/bill/script");
    }

    public function caraccessories_create_bill($userId)
    {
        $data['userId'] = $userId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/payment/caraccessories/create/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/payment/caraccessories/create/script");
    }

    public function caraccessories_bill_detail($userId, $billId)
    {
        $data['userId'] = $userId;
        $data['billId'] = $billId;
        $this->load->view("admin/layout/head");
        $this->load->view("admin/layout/left-menu");
        $this->load->view("admin/layout/header");
        $this->load->view("admin/payment/caraccessories/bill_detail/content", $data);
        $this->load->view("admin/layout/footer");
        $this->load->view("admin/layout/foot");
        $this->load->view("admin/payment/caraccessories/bill_detail/script");
    }

}