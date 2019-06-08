<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Cart extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("carts");
  
        $this->load->model('orderdetails');
    }

    function cartDetail_post(){
        $cartData = $this->post('cartData');
        if($cartData == null){
            $cartData = [];
        }
        $lubricatorData = $this->getLubricator($cartData);
        $tireData = $this->getTire($cartData);
        $spareData = $this->getSpare($cartData);
        $data["caraccessoryId"] = getCaracessoryId($cartData);
        $data["cartData"] = $this->getCartData($lubricatorData, $tireData, $spareData);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    function getCartData($lubricatorData, $tireData, $spareData){
        $data = [];
        if($lubricatorData != null){
            $this->load->model("lubricatorchanges");
            $charge = $this->lubricatorchanges->getLubricatorChangePrice();

            foreach ($lubricatorData as $value){
                $data["lubricator"][$value->lubricator_dataId]["productId"] = $value->lubricator_dataId;
                $data["lubricator"][$value->lubricator_dataId]["price"] =  ($value->price*1.1) + $charge->lubricator_price;
                $option = [
                    'lubricatorId' => $value->lubricatorId
                ];
                $data["lubricator"][$value->lubricator_dataId]['picture'] = getPictureLubricator($option);
                // $data["lubricator"][$value->lubricator_dataId]["picture"] = $value->lubricator_dataPicture;
                $data["lubricator"][$value->lubricator_dataId]["brandName"] = $value->lubricator_brandName;
                $data["lubricator"][$value->lubricator_dataId]["name"] = $value->lubricatorName;
                $data["lubricator"][$value->lubricator_dataId]["lubricatorNumber"] = $value->lubricator_number;
                $data["lubricator"][$value->lubricator_dataId]["capacity"] = $value->capacity;
            }
    
        }
        if($tireData != null){
            $this->load->model("tirechanges");
            $tirePriceData = $this->tirechanges->getTireChangePrice();
            $charge = [];
            foreach($tirePriceData as $cost){
                $charge[$cost->rimId] = $cost->tire_price;
            }
            foreach($tireData as $value){
                $data["tire"][$value->tire_dataId]["productId"] = $value->tire_dataId;
                $data["tire"][$value->tire_dataId]["price"] = ($value->price*1.1) + $charge[$value->rimId];
                $option = [
                    'tire_brandId' => $value->tire_brandId,
                    'tire_modelId' => $value->tire_modelId,
                    'tire_sizeId' => $value->tire_sizeId,
                    'rimId' => $value->rimId
                ];
                $data["tire"][$value->tire_dataId]['picture'] = getPictureTire($option);
                // $data["tire"][$value->tire_dataId]["picture"] = $value->tire_picture;
                $data["tire"][$value->tire_dataId]["brandName"] = $value->tire_brandName;
                $data["tire"][$value->tire_dataId]["name"] = $value->tire_modelName;
                $data["tire"][$value->tire_dataId]["number"] = $value->tire_size;
            }
        }
        if($spareData != null){
            $this->load->model("sparechanges");
            $sparePriceData = $this->sparechanges->getSpareChangePrice();
            $charge = [];
            foreach($sparePriceData as $cost){
                $charge[$cost->spares_undercarriageId] = $cost->spares_price;
            }
            foreach($spareData as $value){
                $data["spare"][$value->spares_undercarriageDataId]["productId"] = $value->spares_undercarriageDataId;
                $data["spare"][$value->spares_undercarriageDataId]["price"] = ($value->price*1.1) + $charge[$value->spares_undercarriageId];
                $option = [
                    'spares_undercarriageId' => $value->spares_undercarriageId,
                    'spares_brandId' => $value->spares_brandId,
                    'brandId' => $value->brandId,
                    'modelId' => $value->modelId,
                    'modelofcarId' => $value->modelofcarId
                    // 'spares_brandPicture' => $value->spares_brandPicture
                ];
                $data["spare"][$value->spares_undercarriageDataId]['picture'] = getPictureSpare($option);
                $data["spare"][$value->spares_undercarriageDataId]["spares_brandPicture"] = $value->spares_brandPicture;
                $data["spare"][$value->spares_undercarriageDataId]["brandName"] = $value->brandName;
                $data["spare"][$value->spares_undercarriageDataId]["modelName"] = $value->modelName;
                $data["spare"][$value->spares_undercarriageDataId]["year"] = $value->year;
                $data["spare"][$value->spares_undercarriageDataId]["spares_brandName"] = $value->spares_brandName;
                $data["spare"][$value->spares_undercarriageDataId]["spares_undercarriageName"] = $value->spares_undercarriageName;
            }
        }

        return $data;
    }

    function getLubricator($data){
        $lubricatorArray = array_filter(
            $data, function ($e) { 
                return $e["group"] == "lubricator"; 
            }
        );
        $lubricatorDataIdArray = array_column($lubricatorArray, 'productId');
        $this->load->model("lubricatordatas");
        return $this->lubricatordatas->getLubricatorDataForCartByIdArray($lubricatorDataIdArray);
    }

    function getTire($data){
        $tireArray = array_filter(
            $data, function ($e) { return $e["group"] == "tire"; }
        );
        $tireDataIdArray = array_column($tireArray, 'productId');
        $this->load->model("tiredatas");
        return $this->tiredatas->getTireDataForCartByIdArray($tireDataIdArray);
    }

    function getSpare($data){
        $spareArray = array_filter(
            $data, function ($e) { return $e["group"] == "spare"; }
        );
        $spareDataIdArray = array_column($spareArray, 'productId');
        $this->load->model("Spare_undercarriagedatas");
        return $this->Spare_undercarriagedatas->getSpareDataForCartByIdArray($spareDataIdArray);
    }

    function getDetail_post(){
        $group = $this->post("group");
        $productId = $this->post("productId");
        $data = [];
        if($group == "lubricator"){
            $data = getLubricatorDetail($productId);
        }else if($group == "tire"){
            $data = getTireDetail($productId);
        }else{
            $data = getSpareDetail($productId);
        }
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    function getUserCart_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $result = $this->carts->getCartByUserId($userId);
        $this->set_response($result, REST_Controller::HTTP_OK);
    }


    function createCart_post(){
        $cartData = $this->post("cartData");
        // $this->set_response($cartData, REST_Controller::HTTP_OK);
        $data = [];
        $isLogin = !empty($this->session->userdata['logged_in']);
        if($isLogin){
            $userId = $this->session->userdata['logged_in']['id'];
            $index = 0;
            if($cartData != null){
                foreach ($cartData as $val) {
                    $data[$index]["productId"] = $val['productId'];
                    $data[$index]["group"] = $val['group'];
                    $data[$index]["quantity"] = $val['number'];
                    $data[$index]["create_at"] = date('Y-m-d H:i:s',time());
                    $data[$index]["create_by"] = $userId;
                    $index++;
                }   
            }
        }
        $option = [
            "data_check" => null,
            "data" => $data,
            "model" => $this->carts,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    
    
}