<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Orderdetail extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('orderdetails');
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
        $totalData = $this->orderdetails->all_count($userId);
        $totalFiltered = $totalData; 
        $posts = $this->orderdetails->searAllOrder($limit,$start,$order,$dir,$userId);

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

    function orderDetail_get(){
        $orderId = $this->get("orderId");
        $orderDetailData = $this->orderdetails->getOrderDetailByOrderId($orderId);
        
        $lubricatorData = $this->getLubricator($orderDetailData);
        $tireData = $this->getTire($orderDetailData);
        $spareData = $this->getSpare($orderDetailData);

        $this->set_response($this->getCartData($lubricatorData, $tireData, $spareData), REST_Controller::HTTP_OK);
    }

    function getCartData($lubricatorData, $tireData, $spareData){
        $data = [];
        if($lubricatorData != null){

            foreach ($lubricatorData as $value){
                $value->group = "lubricator";
                $value->cost = calSummary($value->cost, $value->charge) * $value->quantity;
                $value->charge = 0;
                array_push($data,$value);
            }
    
        }
        if($tireData != null){
            foreach($tireData as $value){
                $value->group = "tire";
                $value->cost = calSummary($value->cost, $value->charge) * $value->quantity;
                $value->charge = 0;
                array_push($data,$value);
            }
        }
        if($spareData != null){
            foreach($spareData as $value){
                $value->group = "spare";
                $value->cost = calSummary($value->cost, $value->charge) * $value->quantity;
                $value->charge = 0;
                array_push($data,$value);
            }
        }

        return $data;
    }

    function getLubricator($data){
        $lubricatorArray = array_filter(
            $data, function ($e) { 
                return $e->group == "lubricator"; 
            }
        );
        $productId = [];
        foreach ($lubricatorArray as $key => $val) {
            $productId[$key] = $val->productId;
        }
        $this->load->model("lubricatordatas");
        return $this->lubricatordatas->getLubricatorDataForOrderByIdArray($productId);
    }

    function getTire($data){
        $tireArray = array_filter(
            $data, function ($e) { return $e->group == "tire"; }
        );
        $productId = [];
        foreach ($tireArray as $key => $val) {
            $productId[$key] = $val->productId;
        }
        $this->load->model("tiredatas");
        return $this->tiredatas->getTireDataForOrderByIdArray($productId);
    }

    function getSpare($data){
        $spareArray = array_filter(
            $data, function ($e) { return $e->group == "spare"; }
        );
        $productId = [];
        foreach ($spareArray as $key => $val) {
            $productId[$key] = $val->productId;
        }
        $this->load->model("spare_undercarriagedatas");
        return $this->spare_undercarriagedatas->getSpareDataForOrderByIdArray($productId);
    }

}