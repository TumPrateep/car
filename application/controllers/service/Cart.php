<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Cart extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("cards");
    }

    function cartDetail_post(){
        $cartData = $this->post('cartData');
        $lubricatorData = $this->getLubricator($cartData);
        $tireData = $this->getTire($cartData);
        $spareData = $this->getSpare($cartData);
        $this->set_response($this->getCartData($lubricatorData, $tireData, $spareData), REST_Controller::HTTP_OK);
    }

    function getCartData($lubricatorData, $tireData, $spareData){
        $data = [];
        if($lubricatorData != null){
            $this->load->model("lubricatorchanges");
            $charge = $this->lubricatorchanges->getLubricatorChangePrice();

            foreach ($lubricatorData as $value){
                $data["lubricator"][$value->lubricator_dataId]["productId"] = $value->lubricator_dataId;
                $data["lubricator"][$value->lubricator_dataId]["price"] =  $value->price + ($value->price*0.1) + $charge->lubricator_price;
                $data["lubricator"][$value->lubricator_dataId]["picture"] = $value->lubricator_dataPicture;
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
                $charge[$cost->rimId] = ($cost->tire_front+$cost->tire_back)/2;
            }
            foreach($tireData as $value){
                $data["tire"][$value->tire_dataId]["productId"] = $value->tire_dataId;
                $data["tire"][$value->tire_dataId]["price"] = $value->price + ($value->price*0.1) + $charge[$value->rimId];
                $data["tire"][$value->tire_dataId]["picture"] = $value->tire_picture;
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
                $data["spare"][$value->spares_undercarriageDataId]["price"] = $value->price+($value->price*0.1) + $charge[$value->spares_undercarriageId];
                $data["spare"][$value->spares_undercarriageDataId]["picture"] = $value->spares_undercarriageDataPicture;
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

    function getLubricatorDetail($productId){
        $this->load->model("lubricatorchanges");
        $charge = $this->lubricatorchanges->getLubricatorChangePrice();
        $this->load->model("lubricatordatas");
        $result = $this->lubricatordatas->getLubricatorDataForCartById($productId);
        $result->price = $result->price + ($result->price*0.1) + $charge->lubricator_price;
        return $result;
    }
    
    function getTireDetail($productId){
        $this->load->model("tirechanges");
        $tirePriceData = $this->tirechanges->getTireChangePrice();
        $charge = [];
        foreach($tirePriceData as $cost){
            $charge[$cost->rimId] = ($cost->tire_front+$cost->tire_back)/2;
        }
        $this->load->model("tireproduct");
        $result = $this->tireproduct->getTireDataForCartById($productId);
        $result->price = $result->price + ($result->price*0.1) + $charge[$result->rimId];
        return $result;
    }
    
    function getSpareDetail($productId){
        $this->load->model("sparechanges");
        $sparePriceData = $this->sparechanges->getSpareChangePrice();
        $charge = [];
        foreach($sparePriceData as $cost){
            $charge[$cost->spares_undercarriageId] = $cost->spares_price;
        }
        $this->load->model("Spareundercarriageproduct");
        $result = $this->Spareundercarriageproduct->getSpareDataForCartById($productId);
        $result->price = $result->price+($result->price*0.1) + $charge[$result->spares_undercarriageId];
        return $result;
    }

    function getDetail_post(){
        $group = $this->post("group");
        $productId = $this->post("productId");
        $data = [];
        if($group == "lubricator"){
            $data = $this->getLubricatorDetail($productId);
        }else if($group == "tire"){
            $data = $this->getTireDetail($productId);
        }else{
            $data = $this->getSpareDetail($productId);
        }
        $this->set_response($data, REST_Controller::HTTP_OK);
    }


    function createCard_post(){
        $cartId = $this->post("cartId");
        $productId = $this->post("productId");
        $group = $this->post("group");
        $quantity = $this->post("quantity");
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->cards->data_check_userId($userId);
        if($data_check != null){
            $data = array(
                'cartId' => $cartId,
                'productId' => $productId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'status' => 1,
                'group' => $group,
                'quantity' => $quantity
            );
            $result = $this->card->update($data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        
            
        }else{
            $data = array(
                'cartId' => null,
                'productId' => $productId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'status' => 1,
                'group' => $group,
                'quantity' => $quantity
            );
            $result = $this->card->insert($data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }
        
    }

}