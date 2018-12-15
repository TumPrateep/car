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

    function createOrderDetail_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $data = array();
        $orderdetail = $this->orders->getAllCartByUserId($userId);
       
        $data['order'] = array(
            'orderId' => null,
            'userId' => (int)$userId,
            // 'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeflag' =>1
        );

        $data['orderdetail'] = $orderdetail;
        $result = $this->orders->insert($data);
       
        $option = [
            "data_check" => $orderdetail,
            "data" => $data,
            "model" => $this->orders,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
        
    }
}