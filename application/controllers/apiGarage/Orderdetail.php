<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orderdetail extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("orderdetails");
    }

    function searchorder_post(){
        // $column = "	orderId";

        // $sort = "asc";
        // if($this->post('column') == 3){
        //     $column = "status";
        // }else if($this->post('column') == 2){
        //     $sort = "desc";
        // }else{
        //     $sort = "asc";
        // }

        $columns = array( 
            0 => null
        );
        
        $limit = $this->post('length');
        $start = $this->post('start');
        // $order = $column;
        $order = $columns[$this->post('order')[0]['column']];
        // $dir = $sort;
        $dir = $this->post('order')[0]['dir'];
        // $car_accessoriesId = $this->session->userdata['logged_in']['car_accessoriesId'];
        // $totalData = $this->deliverorders->allDeliverorders_count($car_accessoriesId);
        $totalData = $this->orderdetails->allorders_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('orderId')))
        {            
            $posts = $this->orderdetails->allorders($limit,$start,$order,$dir);
        }else{

            $status = $this->post('status');
            $productId = $this->post('productId');
            
            $status = null; 
            $posts =  $this->orderdetails->orders_search($limit,$start,$order,$dir,$status,$orderId);
            $totalFiltered = $this->orderdetails->orders_search_count($orderId);
                
        }
        // $orderId = $this->post('orderId'); 
        // $posts =  $this->orderdetails->orders_search($limit,$start,$order,$dir,$status,$orderId);
        // $totalFiltered = $this->orderdetails->orders_search_count($orderId);
            
        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['orderDetailId'] = $post->orderDetailId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['group'] = $post->group;
                $nestedData['status'] = $post->status;
                $nestedData['productId'] = $post->productId;
                $nestedData['car_accessoriesName'] = $post->car_accessoriesName;
                $nestedData['firstname'] = $post->firstname;
                $nestedData['lastname'] = $post->lastname;
                
                // $nestedData['picture'] = $post->picture;
                $nestedData['data'] = getProductDetail($post->productId, $post->group);

                $data[] = $nestedData;
                // $data[$index] = $nestedData;
                // if($count >= 3){
                //     $count = -1;
                //     $index++;
                //     $nestedData = [];
                // }
                
                // $count++;

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

    function changeStatus_get(){
        $orderDetailId = $this->get("orderDetailId");
        $status = $this->get("status");
        $data = array(
            'orderDetailId' => $orderDetailId,
            'status' => $status
          
        );
        $data_check_update = $this->orderdetails->getorderDetailById($orderDetailId);

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->orderdetails
        ];
        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

    // function getorder_get(){
    //     $lubricator_dataId = $this->get('lubricator_dataId');
    //     $data_check = $this->lubricatordatas->getupdate($lubricator_dataId);
    //     $option = [
    //         "data_check" => $data_check
    //     ];
    //     $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    // }

    // function changeStatus_post(){
    //     $lubricator_dataId = $this->post("lubricator_dataId");
    //     $status = $this->post("status");
    //     if($status == 1){
    //         $status = 2;
    //     }else{
    //         $status = 1;
    //     }

    //     $data_check_update = $this->lubricatordatas->getlubricatorDatasById($lubricator_dataId);
    //     $data = array(
    //         'lubricator_dataId' => $lubricator_dataId,
    //         'status' => $status
    //     );

    //     $option = [
    //         "data_check_update" => $data_check_update,
    //         "data" => $data,
    //         "model" => $this->lubricatordatas
    //     ];

    //     $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    // }

}


