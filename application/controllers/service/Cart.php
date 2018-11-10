<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Cart extends BD_Controller {
    function __construct()
    {
        parent::__construct();
    }

    function carDetail_post(){
        $cartData = $this->post('cartData');
        $lubricatorData = $this->getLubricator($cartData);
        $tireData = $this->getTire($cartData);
        $spareData = $this->getSpare($cartData);

        $this->set_response($this->getCartData($lubricatorData, $tireData, $spareData), REST_Controller::HTTP_OK);
    }

    function getCartData($lubricatorData, $tireData, $spareData){
        $data = [];
        foreach ($lubricatorData as $value){
            $data["lubricator"][$value->lubricator_dataId]["productId"] = $value->lubricator_dataId;
            $data["lubricator"][$value->lubricator_dataId]["price"] = $value->price;
            $data["lubricator"][$value->lubricator_dataId]["picture"] = $value->lubricator_dataPicture;
            $data["lubricator"][$value->lubricator_dataId]["brandName"] = $value->lubricator_brandName;
            $data["lubricator"][$value->lubricator_dataId]["name"] = $value->lubricatorName;
            $data["lubricator"][$value->lubricator_dataId]["lubricatorNumber"] = $value->lubricator_number;
            $data["lubricator"][$value->lubricator_dataId]["capacity"] = $value->capacity;
        }

        foreach($tireData as $value){
            $data["tire"][$value->tire_dataId]["productId"] = $value->tire_dataId;
            $data["tire"][$value->tire_dataId]["price"] = $value->price;
            $data["tire"][$value->tire_dataId]["picture"] = $value->tire_picture;
            $data["tire"][$value->tire_dataId]["brandName"] = $value->tire_brandName;
            $data["tire"][$value->tire_dataId]["name"] = $value->tire_modelName;
            $data["tire"][$value->tire_dataId]["number"] = $value->tire_size;
        }

        foreach($spareData as $value){
            $data["spare"][$value->spares_undercarriageDataId]["productId"] = $value->spares_undercarriageDataId;
            $data["spare"][$value->spares_undercarriageDataId]["price"] = $value->price;
            $data["spare"][$value->spares_undercarriageDataId]["picture"] = $value->spares_undercarriageDataPicture;
            $data["spare"][$value->spares_undercarriageDataId]["brandName"] = $value->brandName;
            $data["spare"][$value->spares_undercarriageDataId]["modelName"] = $value->modelName;
            $data["spare"][$value->spares_undercarriageDataId]["year"] = $value->year;
            $data["spare"][$value->spares_undercarriageDataId]["spares_brandName"] = $value->spares_brandName;
            $data["spare"][$value->spares_undercarriageDataId]["spares_undercarriageName"] = $value->spares_undercarriageName;
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

    

}