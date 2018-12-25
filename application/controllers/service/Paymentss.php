<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Paymentss extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('payments');
    }

    function createPaymentDetail_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $data = array();
        $paymentId = $this->post("orderId");
        $date = $this->post("date");
        $time = $this->post("time");
        $bank = $this->post("bank");
        $transfer = $this->post("transfer");
        $paymentdetail = $this->payments-> getPaymentId($paymentId);
       
        $data = array(
            'order_orderId' => $paymentId,
            'paymentId' => null,
            'create_by' =>$userId ,
            'date' => $date,
            'time' => $time,
            'create_at' => date('Y-m-d H:i:s',time()),
            'bank' => $bank,
            'transfer' => $transfer,
            'slipimage' => NULL,
            'status' => 1,
            'activeflag' =>1
        );

      
        $option = [
            "data_check" => $paymentdetail,
            "data" => $data,
            "model" => $this->payments,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
        
    }

    // function search_post(){
    //     $columns = array( 
    //         0 => null,
    //         1 => 'create_by',
    //         2 => 'status',
    //     );
    //     $userId = $this->session->userdata['logged_in']['id'];
    //     $limit = $this->post('length');
    //     $start = $this->post('start');
    //     $order = $columns[$this->post('order')[0]['column']];
    //     $dir = $this->post('order')[0]['dir'];
    //     $totalData = $this->orders->all_count($userId);
    //     $totalFiltered = $totalData; 
    //     $posts = $this->orders->searAllOrder($limit,$start,$order,$dir,$userId);

    //     $data = array();
    //     if(!empty($posts))
    //     {
    //         foreach ($posts as $post)
    //         {
    //             $nestedData['orderId'] = $post->orderId;
    //             $nestedData['create_at'] = $post->create_at;
    //             $nestedData['status'] = $post->status;
    //             $nestedData['create_by'] = $post->userId;
    //             $data[] = $nestedData;
    //         }
    //     }
    //     $json_data = array(
    //         "draw"            => intval($this->post('draw')),  
    //         "recordsTotal"    => intval($totalData),  
    //         "recordsFiltered" => intval($totalFiltered), 
    //         "data"            => $data   
    //     );
    //     $this->set_response($json_data);
    // }
}