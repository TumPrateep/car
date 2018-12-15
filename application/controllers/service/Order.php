<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Order extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('orders');
    }

    function createOrderDetail(){
        $userId = $this->session->userdata['logged_in']['id'];
        $data = array();
        $orderdetail = $this->orders->getAllCartByUserId($userId);
        if($data =! null){
            // phase 2 create order
            $data['order'] = array(
                'orderId' => null,
                'create_by' => $userId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'status' => 1,
                'activeflag' =>1
            );

            $data['orderdetail'] = $orderdetail;
            $result = $this->orders->insert($data);
           
        }
       
        
    }
}