<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('orders');
        $this->load->model('orderdetails');
        $this->load->model('tiredatas');
    }

    // function calAllDeposit_post(){
    //     $userId = $this->session->userdata['logged_in']['id'];
    //     $productData = json_decode($this->post("productData"));
    //     $garageId = $this->post("garageId");
    //     $orderdetail = $this->orders->getAllCartByUserIdAndProductId($userId, $productData);
    //     $caraccessoryId = getCaracessoryId($orderdetail);
    //     $costDelivery = getDeliveryCost($caraccessoryId, $orderdetail);

    //     $sum = $this->orders->callDeposit($garageId, $costDelivery, $caraccessoryId, $orderdetail);

    //     $this->set_response(["sum" => $sum], REST_Controller::HTTP_OK);
    // }

    public function createOrderDetail_post()
    {
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
            "created_at" => date('Y-m-d H:i:s', time()),
            "created_by" => $userId,
            "status" => 1,
            "orderId" => "",
        );

        $data['order'] = array(
            'userId' => $userId,
            'create_by' => $userId,
            'car_profileId' => $carProfileId,
            'create_at' => date('Y-m-d H:i:s', time()),
            'status' => 1,
            'statusSuccess' => 1,
            'activeflag' => 1,
            'costDelivery' => $costDelivery,
            'depositflag' => ($isDeposit == "true") ? 1 : 0,
        );

        $data['orderdetail'] = $orderdetail;

        $option = [
            "data_check" => null,
            "data" => $data,
            "model" => $this->orders,
            "image_path" => null,
        ];

        // $this->set_response($data, REST_Controller::HTTP_OK);

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

    }

    public function search_post()
    {
        $userId = $this->session->userdata['logged_in']['id'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $selected = $this->post('selected');
        $order = 'order.create_at';
        $dir = 'desc';

        $totalData = $this->orders->all_count($userId, $selected);
        $totalFiltered = $totalData;
        $posts = $this->orders->searchAllOrder($limit, $start, $order, $dir, $userId, $selected);
        // dd();
        $data = array();
        if (!empty($posts)) {
            $index = 0;
            $count = 0;
            foreach ($posts as $post) {
                $nestedData[$count]['orderId'] = $post->orderId;
                $nestedData[$count]['statusActive'] = $post->statusSuccess;
                $nestedData[$count]['create_at'] = $post->create_at;
                $nestedData[$count]['status'] = $post->status;
                $deliver = $this->orderdetails->getDeliverStatus($post->orderId);
                $nestedData[$count]['deliver'] = (empty($deliver)) ? 1 : 2;
                $nestedData[$count]['create_by'] = $post->userId;
                $nestedData[$count]['cost'] = $this->orderdetails->getSummaryCostFromOrderDetail($post->orderId, $userId);

                $orderDetailData = $this->orderdetails->getOrderDetailByOrderId($post->orderId);
                $alldata = $this->orderdetails->getIdData($post->orderId);
                $productData = $this->getProduct($orderDetailData, $post->orderId);

                $nestedData[$count]["orderDetail"] = $this->getCartData($productData);
                $nestedData[$count]['reserve'] = $this->orderdetails->getDatareserve($alldata->reserveId);
                // $nestedData['costDelivery'] = $this->orderdetails->getSummarycostDelivery($post->orderId);
                // $nestedData['deposit'] = calDeposit($orderdetail->cost, $orderdetail->charge, $orderdetail->chargeGarage, $orderdetail->costCaraccessories);
                $data[$index] = $nestedData;
                if ($count > 2) {
                    $count = -1;
                    $index++;
                    $nestedData = [];
                }

                $count++;
            }
        }
        $json_data = array(
            "draw" => intval($this->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        $this->set_response($json_data);
    }

    public function getCartData($productData)
    {
        $data = [];

        if (!empty($productData['tire'])) {
            foreach ($productData['tire'] as $value) {
                $value->group = "tire";
                // var_dump($productData);
                // exit();
                $value->cost = $value->price_per_unit * $value->quantity;
                $value->product_price = $value->product_price * $value->quantity;
                $value->charge_price = $value->charge_price * $value->quantity;
                $value->delivery_price = $value->delivery_price * $value->quantity;
                $value->garage_service_price = $value->garage_service_price * $value->quantity;

                $option = [
                    'tire_brandId' => $value->tire_brandId,
                    'tire_modelId' => $value->tire_modelId,
                    'tire_sizeId' => $value->tire_sizeId,
                    'rimId' => $value->rimId,
                ];
                $value->picture = getPictureTire($option);
                array_push($data, $value);
            }
        }

        if (!empty($productData['lubricator'])) {
            foreach ($productData['lubricator'] as $value) {
                $value->group = "lubricator";
                // var_dump($productData);
                // exit();
                $value->cost = $value->price_per_unit * $value->quantity;
                $value->product_price = $value->product_price * $value->quantity;
                $value->charge_price = $value->charge_price * $value->quantity;
                $value->delivery_price = $value->delivery_price * $value->quantity;
                $value->garage_service_price = $value->garage_service_price * $value->quantity;

                $option = [
                    'lubricatorId' => $value->lubricatorId
                ];
                $value->picture = getPictureLubricator($option);
                array_push($data, $value);
            }
        }

        return $data;
    }

    public function getProduct($data, $orderId = null)
    {
        $tireArray = array_filter(
            $data, function ($e) {return $e->group == "tire";}
        );
        $lubricatorArray = array_filter(
            $data, function ($e) {return $e->group == "lubricator";}
        );
        $tireId = [];
        foreach ($tireArray as $key => $val) {
            $tireId[$key] = $val->productId;
        }
        $lubricatorId = [];
        foreach ($lubricatorArray as $key => $val) {
            $lubricatorId[$key] = $val->productId;
        }
        $this->load->model("tiredatas");
        $this->load->model("lubricatordatas");

        $product = [];
        $product['tire'] = $this->tiredatas->getTireDataForOrderByIdArray($tireId, $orderId, "tire");
        $product['lubricator'] = $this->lubricatordatas->getLubricatorDataForOrderByIdArray($lubricatorId, $orderId, "lubricator");
        // var_dump($product);
        // exit();
        return $product;
    }

}