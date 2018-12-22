<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Orderdetail extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('OrderDetails');
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
        $totalData = $this->OrderDetails->all_count($userId);
        $totalFiltered = $totalData; 
        $posts = $this->OrderDetails->searAllOrder($limit,$start,$order,$dir,$userId);

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['orderDetailId'] = $post->orderDetailId;
                $nestedData['create_at'] = $post->create_at;
                $nestedData['status'] = $post->status;
                $nestedData['orderId'] = $post->orderId;
                $nestedData['productId'] = $post->productId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['price'] = $post->price;
                $nestedData['activeflag'] = $post->activeflag;
                $nestedData['group'] = $post->group;
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