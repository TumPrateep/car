<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Order extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->load->view("lib");
    }

    public function index()
    {
        $data = ['tire' => '', 'lubricator' => '', 'garage' => ''];

        load_user_view("users/order/content", "users/order/script", $data);
    }

    public function orderdetails($orderId)
    {
        $data = ['tire' => '', 'lubricator' => '', 'garage' => ''];
        $data['orderId'] = $orderId;

        load_user_view("users/orderdetails/content", "users/orderdetails/script", $data);
    }

    public function payment($orderId)
    {
        $data = ['tire' => '', 'lubricator' => '', 'garage' => ''];
        $data['orderId'] = $orderId;

        load_user_view("users/payment/content", "users/payment/script", $data);
    }

}