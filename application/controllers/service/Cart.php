<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Cart extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("carts");
        $this->load->model('carprofiles');
        $this->load->model('orderdetails');
        $this->load->model('lubricatorchangegarages');
        $this->load->model('tirechangesgarge');
        $this->load->model('garage');
    }

    function cartDetail_post(){
        $cartData = $this->post('cartData');
        if($cartData == null){
            $cartData = [];
        }
        $garageId = [];
        foreach ($cartData as $v) {
            $garageId[$v['group']][$v['productId']] = (!empty($v['garageId']))?$v['garageId']:'';
        }
        $lubricatorData = $this->getLubricator($cartData);
        $tireData = $this->getTire($cartData);
        $spareData = $this->getSpare($cartData);
        $data["caraccessoryId"] = getCaracessoryId($cartData);
        $data["cartData"] = $this->getCartData($lubricatorData, $tireData, $spareData, $garageId);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    function getCartData($lubricatorData, $tireData, $spareData, $garageId){
        $data = [];
        if($lubricatorData != null){
            $this->load->model("prices");
            // $charge = $this->lubricatorchanges->getLubricatorChangePrice();

            foreach ($lubricatorData as $value){

                $carjaidee_change_data = $this->prices->getLubricatorPriceCarjaidee($value->machine_id);
                $carjaidee_price = 0;
                if (!empty($carjaidee_change_data)) {
                    $carjaidee_price = $carjaidee_change_data->price;
                    if ($carjaidee_change_data->unit_id == 1) {
                        $carjaidee_price = $value->price * $carjaidee_change_data->price / 100;
                    }
                }

                $lubricator_service_data = $this->prices->getLubricatorPriceService($value->machine_id);
                $service_price = $lubricator_service_data->price;

                $garage = $this->lubricatorchangegarages->getLubricatorChangeByIdAndMachine($garageId['lubricator'][$value->lubricator_dataId], $value->machine_id);
                $garage_service_price = 0;
                if(!empty($garage)){
                    $garage_service_price = (int)$garage->lubricator_price;
                }

                $data["lubricator"][$value->lubricator_dataId]["garage"] = $garage;
                $data["lubricator"][$value->lubricator_dataId]["machine_id"] = $value->machine_id;
                $data["lubricator"][$value->lubricator_dataId]["productId"] = $value->lubricator_dataId;
                $data["lubricator"][$value->lubricator_dataId]["price"] =  $value->price + $carjaidee_price + $service_price + $garage_service_price;
                $option = [
                    'lubricatorId' => $value->lubricatorId
                ];
                $data["lubricator"][$value->lubricator_dataId]['picture'] = getPictureLubricator($option);
                $data["lubricator"][$value->lubricator_dataId]["brandPicture"] = $value->lubricator_brandPicture;
                $data["lubricator"][$value->lubricator_dataId]["brandName"] = $value->lubricator_brandName;
                $data["lubricator"][$value->lubricator_dataId]["name"] = $value->lubricatorName;
                $data["lubricator"][$value->lubricator_dataId]["lubricatorNumber"] = $value->lubricator_number;
                $data["lubricator"][$value->lubricator_dataId]["capacity"] = $value->capacity;
                $data["lubricator"][$value->lubricator_dataId]["machine_type"] = $value->machine_type;
                $data["lubricator"][$value->lubricator_dataId]["lubricator_type_name"] = $value->lubricator_typeName;
            }
    
        }
        if($tireData != null){
            $this->load->model("tirechanges");
            $this->load->model("prices");

            foreach($tireData as $value){

                $carjaidee_change_data = $this->prices->getPriceCarjaidee($value->rimId, $value->tire_sizeId);
                $carjaidee_price = 0;
                if (!empty($carjaidee_change_data)) {
                    $carjaidee_price = $carjaidee_change_data->price;
                    if ($carjaidee_change_data->unit_id == 1) {
                        $carjaidee_price = $value->price * $carjaidee_change_data->price / 100;
                    }
                }

                $tire_service_data = $this->prices->getPriceService($value->rimId);
                $service_price = $tire_service_data->price;

                // $garage = $this->garage->getGarageByGarageId($garageId['tire'][$value->tire_dataId]);
                
                $garage_service = $this->tirechangesgarge->getTireChangeByIdAndRim($garageId['tire'][$value->tire_dataId], $value->rimId);
                $garage_service_price = 0;
                if(!empty($garage)){
                    $garage_service_price = (int)$garage_service->tire_price;
                }

                $data["tire"][$value->tire_dataId]["garage"] = $garage_service;
                $data["tire"][$value->tire_dataId]["productId"] = $value->tire_dataId;
                $data["tire"][$value->tire_dataId]["price2"] = $garage_service_price;
                $data["tire"][$value->tire_dataId]["price"] = $value->price + $carjaidee_price + $service_price + $garage_service_price;
                $option = [
                    'tire_brandId' => $value->tire_brandId,
                    'tire_modelId' => $value->tire_modelId,
                    'tire_sizeId' => $value->tire_sizeId,
                    'rimId' => $value->rimId
                ];
                $data["tire"][$value->tire_dataId]['picture'] = getPictureTire($option);
                $data["tire"][$value->tire_dataId]["brandPicture"] = $value->tire_brandPicture;
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
                // $data["spare"][$value->spares_undercarriageDataId]["spares_brandPicture"] = $value->spares_brandPicture;
                $data["spare"][$value->spares_undercarriageDataId]["brandName"] = $value->brandName;
                $data["spare"][$value->spares_undercarriageDataId]["modelName"] = $value->modelName;
                $data["spare"][$value->spares_undercarriageDataId]["year"] = $value->year;
                $data["spare"][$value->spares_undercarriageDataId]["spares_brandName"] = $value->spares_brandName;
                $data["spare"][$value->spares_undercarriageDataId]["spares_undercarriageName"] = $value->spares_undercarriageName;
            }
        }

        return $data;
    }

    function searchCarProfile_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $columns = array( 
            0 => 'character_plate'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->carprofiles->allprofile_count($userId);
        $totalFiltered = $totalData; 

        if(empty($this->post('search'))){            
            $posts = $this->carprofiles->allprofile($limit,$start,$order,$dir,$userId);
        } else {
            // $character_plate = $this->post('character_plate'); 
            // $number_plate = $this->post('number_plate');
            // $province_plate = $this->post('province_plate');
            // $provinceforcarName = $this->post('provinceforcarName');
            // $search = $this->post("search");
            // $posts =  $this->carprofiles->profileSearch($limit,$start,$order,$dir,$search,$userId);
            // $totalFiltered = $this->carprofiles->carprofile_search_count($search,$userId);
        }
        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['car_profileId'] = $post->car_profileId;
                $nestedData[$count]['character_plate'] = $post->character_plate;
                $nestedData[$count]['number_plate'] = $post->number_plate;
                $nestedData[$count]['province_plate'] = $post->province_plate;
                $nestedData[$count]['provinceforcarName'] = $post->provinceforcarName;
                $nestedData[$count]['mileage'] = $post->mileage;
                $nestedData[$count]['color'] = $post->color;
                $nestedData[$count]['picture'] = $post->pictureFront;
                $nestedData[$count]['brandpicture'] = base_url()."public/image/brand/".$post->brandPicture;
                $data[$index] = $nestedData;
                if($count >= 3){
                    $count = -1;
                    $index++;
                    $nestedData = [];
                }
                
                $count++;

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
                    $data[$index]["garageId"] = $val['garageId'];
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

    public function delete_get(){
        $productId = $this->get('productId');
        $role = $this->get('role');
        $userId = $this->session->userdata['logged_in']['id'];
        $result = false;
        if(!empty($userId)){
            $data = $this->carts->getCartByProductId($productId, $role, $userId);
            if(!empty($data)){
                $result = $this->carts->delete($data->cardId);
            }
        }

        $this->set_response(["result" => $result], REST_Controller::HTTP_OK);
    }
    
}