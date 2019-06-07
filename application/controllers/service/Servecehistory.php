<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Servecehistory extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('servecehistorys');
        $this->load->model('orders');
        $this->load->model('orderdetails');
    }

    // function searchhistory_post(){
    //     $columns = array( 
    //         0 => null,
    //         // 1 => 'create_by'
    //         // 2 => 'status',
    //     );
    //     $userId = $this->session->userdata['logged_in']['id'];
    //     $limit = $this->post('length');
    //     $start = $this->post('start');
    //     $order = $columns[$this->post('order')[0]['column']];
    //     $dir = $this->post('order')[0]['dir'];
    //     $totalData = $this->servecehistorys->allhistorysorders_count($userId);
    //     $totalFiltered = $totalData; 
    //     $posts = $this->servecehistorys->allhistorysders($limit,$start,$order,$dir,$userId);

    //     $data = array();
    //     if(!empty($posts))
    //     {
    //         foreach ($posts as $post)
    //         {
    //             $nestedData['orderId'] = $post->orderId;
    //             $nestedData['quantity'] = $post->quantity; 
    //             $nestedData['garageId'] = $post->garageId;
    //             $nestedData['group'] = $post->group;
    //             $nestedData['productId'] = $post->productId;
    //             $nestedData['garageName'] = $post->garageName;
    //             $nestedData['costCaraccessories'] = $post->costCaraccessories;
    //             $nestedData['create_at'] = $post->create_at;
    //             $nestedData['data'] = getProductDetail($post->productId, $post->group);

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
        $posts = $this->servecehistorys->searchAllOrder($limit,$start,$order,$dir,$userId);
        
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['orderId'] = $post->orderId;
                // $nestedData['quantity'] = $post->quantity; 
                $nestedData['garageId'] = $post->garageId;
                $nestedData['group'] = $post->group;
                $nestedData['productId'] = $post->productId;
                $nestedData['garageName'] = $post->garageName;
                $nestedData['reserveDate'] = $post->reserveDate;
                $nestedData['reservetime'] = $post->reservetime;
                $nestedData['character_plate'] = $post->character_plate;
                $nestedData['number_plate'] = $post->number_plate;
                $nestedData['provinceName'] = $post->provinceName;
                // $nestedData['costCaraccessories'] = $post->costCaraccessories;
                // $nestedData['create_at'] = $post->create_at;
                $nestedData['data'] = getProductDetail($post->productId, $post->group);
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