<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Orderdetail extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('orderdetails');
        $this->load->model('orders');
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
        $userId = $this->session->userdata['logged_in']['id'];
        $lubricatorData = $this->getLubricator($orderDetailData, $orderId);
        $tireData = $this->getTire($orderDetailData, $orderId);
        $spareData = $this->getSpare($orderDetailData, $orderId);
        $data["orderDetail"] = $this->getCartData($lubricatorData, $tireData, $spareData);
        $alldata = $this->orderdetails->getIdData($orderId);    
        $data["garage"] = $this->orderdetails->getDatagarage($alldata->garageId);    
        $data["reserve"] = $this->orderdetails->getDatareserve($alldata->reserveId);
        $data["car_profile"] = $this->orderdetails->getDatacarprofile($alldata->car_profileId);
        $data["order"] = $this->orders->getorderByorderId($orderId);
        $orderdetail = $this->orderdetails->getSummaryCostFromOrderDetail($orderId, $userId);
        $data['summary'] = calSummary($orderdetail->cost, $orderdetail->charge);
        $data['costDelivery'] = (float)($this->orderdetails->getSummarycostDelivery($orderId));
        $data['deposit'] = calDeposit($orderdetail->cost, $orderdetail->charge, $orderdetail->chargeGarage, $orderdetail->costCaraccessories);


        $date=date_create($data["garage"]->openingtime);
        $data["garage"]->openingtime = date_format($date,"H:i");

        $date=date_create($data["garage"]->closingtime);
        $data["garage"]->closingtime = date_format($date,"H:i");

        $date=date_create($data["reserve"]->reservetime);
        $data["reserve"]->reservetime = date_format($date,"H:i");

        $date=date_create($data["reserve"]->reserveDate);
        $data["reserve"]->reserveDate = date_format($date,"d/m/Y");

        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    function getCartData($lubricatorData, $tireData, $spareData){
        $data = [];
        if($lubricatorData != null){

            foreach ($lubricatorData as $value){
                $value->group = "lubricator";
                $value->cost = calSummary($value->cost, $value->charge) * $value->quantity;
                $value->charge = 0;
                $option = [
                    'lubricatorId' => $value->lubricatorId
                ];
                $value->picture = getPictureLubricator($option);
                array_push($data,$value);
            }
    
        }
        if($tireData != null){
            foreach($tireData as $value){
                $value->group = "tire";
                $value->cost = calSummary($value->cost, $value->charge) * $value->quantity;
                $value->charge = 0;
                $option = [
                    'tire_brandId' => $value->tire_brandId,
                    'tire_modelId' => $value->tire_modelId,
                    'tire_sizeId' => $value->tire_sizeId,
                    'rimId' => $value->rimId
                ];
                $value->picture = getPictureTire($option);
                array_push($data,$value);
            }
        }
        if($spareData != null){
            foreach($spareData as $value){
                $value->group = "spare";
                $value->cost = calSummary($value->cost, $value->charge) * $value->quantity;
                $value->charge = 0;
                $option = [
                    'spares_undercarriageId' => $value->spares_undercarriageId,
                    'spares_brandId' => $value->spares_brandId,
                    'brandId' => $value->brandId,
                    'modelId' => $value->modelId,
                    'modelofcarId' => $value->modelofcarId
                ];
                $value->picture = getPictureSpare($option);
                array_push($data,$value);
            }
        }

        return $data;
    }

    function getLubricator($data, $orderId = null){
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
        return $this->lubricatordatas->getLubricatorDataForOrderByIdArray($productId, $orderId, "lubricator");
    }

    function getTire($data, $orderId=null){
        $tireArray = array_filter(
            $data, function ($e) { return $e->group == "tire"; }
        );
        $productId = [];
        foreach ($tireArray as $key => $val) {
            $productId[$key] = $val->productId;
        }
        $this->load->model("tiredatas");
        return $this->tiredatas->getTireDataForOrderByIdArray($productId, $orderId, "tire");
    }

    function getSpare($data, $orderId=null){
        $spareArray = array_filter(
            $data, function ($e) { return $e->group == "spare"; }
        );
        $productId = [];
        foreach ($spareArray as $key => $val) {
            $productId[$key] = $val->productId;
        }
        $this->load->model("spare_undercarriagedatas");
        return $this->spare_undercarriagedatas->getSpareDataForOrderByIdArray($productId, $orderId, "spare");
    }

}