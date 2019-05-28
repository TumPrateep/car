<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Order extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('orders');
        $this->load->model('orderdetails');
    }

    function calAllDeposit_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $productData = json_decode($this->post("productData"));
        $garageId = $this->post("garageId");
        $orderdetail = $this->orders->getAllCartByUserIdAndProductId($userId, $productData);
        $caraccessoryId = getCaracessoryId($orderdetail);
        $costDelivery = getDeliveryCost($caraccessoryId, $orderdetail);

        $sum = $this->orders->callDeposit($garageId, $costDelivery, $caraccessoryId, $orderdetail);

        $this->set_response(["sum" => $sum], REST_Controller::HTTP_OK);
    }

    function createOrderDetail_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $garageId = $this->post("garageId");
        $reserve_day = $this->post("reserve_day");
        $reserve_time = $this->post("reserve_time");
        $carProfileId = $this->post("carProfileId");
        $productData = json_decode($this->post("productData"));
        $isDeposit = $this->post("isDeposit");

        $data = array();
        $orderdetail = $this->orders->getAllCartByUserIdAndProductId($userId, $productData);

        $caraccessoryId = getCaracessoryId($orderdetail);
        $costDelivery = getDeliveryCost($caraccessoryId, $orderdetail);
        $data['caraccessoryId'] = $caraccessoryId;
        $data["reserve"] = array(
            "reserveDate" => date('Y-m-d H:i:s', changeFormateDateToTime($reserve_day)),
            "reservetime" => $reserve_time,
            "garageId" => $garageId,
            "created_at" => date('Y-m-d H:i:s',time()),
            "created_by" => $userId,
            "status" => 1,
            "orderId" => ""
        );
       
        $data['order'] = array(
            'userId' => $userId,
            'create_by' => $userId,
            'car_profileId' => $carProfileId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'statusSuccess' => 1,
            'activeflag' =>1,
            'costDelivery' => $costDelivery,
            'depositflag' => ($isDeposit == "true")? 1 : 0
        );

        $data['orderdetail'] = $orderdetail;
       
        $option = [
            "data_check" => null,
            "data" => $data,
            "model" => $this->orders,
            "image_path" => null
        ];
        
        // $this->set_response($data, REST_Controller::HTTP_OK);

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
        
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'create_at',
            2 => 'status',
        );
        $userId = $this->session->userdata['logged_in']['id'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->orders->all_count($userId);
        $totalFiltered = $totalData; 
        $posts = $this->orders->searchAllOrder($limit,$start,$order,$dir,$userId);
        
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['statusSuccess'] = $post->statusSuccess;
                $nestedData['create_at'] = $post->create_at;
                $nestedData['status'] = $post->status;
                $nestedData['depositflag'] = $post->depositflag;
                $nestedData['create_by'] = $post->userId;
                $orderdetail = $this->orderdetails->getSummaryCostFromOrderDetail($post->orderId, $userId);
                $nestedData['summary'] = calSummary($orderdetail->cost, $orderdetail->charge);
                $nestedData['costDelivery'] = $this->orderdetails->getSummarycostDelivery($post->orderId);
                $nestedData['deposit'] = calDeposit($orderdetail->cost, $orderdetail->charge, $orderdetail->chargeGarage, $orderdetail->costCaraccessories);
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($this->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );
        $this->set_response($json_data);
    }

}