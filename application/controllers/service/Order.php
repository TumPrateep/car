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
            'userId' => $userId,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
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

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'create_by',
            2 => 'status',
        );
        $userId = $this->session->userdata['logged_in']['id'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->orders->all_count($userId);
        $totalFiltered = $totalData; 
        $posts = $this->orders->searAllOrder($limit,$start,$order,$dir,$userId);

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['create_at'] = $post->create_at;
                $nestedData['status'] = $post->status;
                $nestedData['create_by'] = $post->userId;
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