<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('garage');
        $this->load->model('location');
        $this->load->model('tiredatas');
        $this->load->model('prices');
        $this->load->model('selectgarages');
        $this->load->model('checkouts');
        $this->load->model('checkout_credit');
        $this->load->model('payments');
        $this->load->model('tirechangesgarge');
        $this->load->model('lubricatorchangegarages');
    }

    public function getData_post()
    {
        $product_data = $this->post('product_data');
        $garageId = $this->post('garageId');
        // $number = $this->post('number');

        $garageData = $this->garage->getGarageByGarageId($garageId);

        $garageData->provinceName = $this->location->getProvinceNameByProvinceId($garageData->provinceId);
        $garageData->districtName = $this->location->getDistrictNameByDistrictId($garageData->districtId);
        $garageData->subdistrictName = $this->location->getSubDistrictBySubDistrictId($garageData->subdistrictId);

        if($product_data == null){
            $product_data = [];
        }
        $number_product = [];
        foreach ($product_data as $v) {
            $number_product[$v['group']][$v['productId']] = (!empty($v['number']))?$v['number']:'';
        }

        $lubricatorData = $this->getLubricator($product_data);
        $tireData = $this->getTire($product_data);
        $spareData = $this->getSpare($product_data);

        $products = $this->getCartData($lubricatorData, $tireData, $spareData, $garageId, $number_product);

        $data = [
            "garage_data" => $garageData,
            "products" => $products,
            // 'service' => $serviceData,
        ];
        $this->set_response($data, REST_Controller::HTTP_OK);
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

    function getCartData($lubricatorData, $tireData, $spareData, $garageId, $number_product){
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

                $garage = $this->lubricatorchangegarages->getLubricatorChangeByIdAndMachine($garageId, $value->machine_id);
                $garage_service_price = 0;
                if(!empty($garage)){
                    $garage_service_price = (int)$garage->lubricator_price;
                }

                $data["lubricator"][$value->lubricator_dataId]["number_product"] = $number_product['lubricator'][$value->lubricator_dataId];
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
                
                $garage_service = $this->tirechangesgarge->getTireChangeByIdAndRim($garageId, $value->rimId);
                $garage_service_price = 0;
                if(!empty($garage)){
                    $garage_service_price = (int)$garage_service->tire_price;
                }

                $data["tire"][$value->tire_dataId]["number_product"] = $number_product['tire'][$value->tire_dataId];
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

    public function order_post()
    {
        $tire_dataId = $this->post('tire_dataId');
        $garageId = $this->post('garageId');
        $number = $this->post('quantity');
        $hire_date = $this->post('hire_date_submit');
        $hire_time = $this->post('hire_time_submit');
        $car_profile = $this->post('car_profile');

        $price_per_unit = $this->post('price_per_unit');
        $product_price = $this->post('product_price');
        $charge_price = $this->post('charge_price');
        $delivery_price = $this->post('delivery_price');
        $garage_service_price = $this->post('garage_service_price');

        //payment
        $name = $this->post('name');
        $slipdate = $this->post('slipdate_submit');
        $sliptime = $this->post('sliptime_submit');
        $slip = $this->post('slip');
        $userId = $this->session->userdata['logged_in']['id'];

        $data['order'] = [
            "userId" => $userId,
            "create_by" => $userId,
            "status" => 1,
            "statusSuccess" => 1,
            "activeflag" => 1,
            "create_at" => date('Y-m-d H:i:s', time()),
            "car_profileId" => $car_profile,
        ];

        $tireData = $this->tiredatas->getTireDataById($tire_dataId);
        $minTireData = $this->tiredatas->getMinTireDataById($tire_dataId);
        // $carjaidee_service_price = $this->prices->getPriceCarjaideeChangePrice($tireData->rimId);

        $data['orderdetail'] = [
            "orderId" => null,
            "userId" => $userId,
            "productId" => $tire_dataId,
            "real_productId" => $minTireData->tire_dataId,
            "quantity" => $number,
            "status" => 1,
            "activeflag" => 1,
            "create_at" => date('Y-m-d H:i:s', time()),
            "group" => "tire",
            "orderselect_status" => 0,
            "car_accessoriesId" => $tireData->car_accessoriesId,
            'real_car_accessoriesId' => $minTireData->car_accessoriesId,
            "price_per_unit" => $price_per_unit,
            "product_price" => $product_price,
            'min_product_price' => $minTireData->price,
            'real_product_price' => $minTireData->price * $number,
            "charge_price" => $charge_price,
            "delivery_price" => $delivery_price,
            "garage_service_price" => $garage_service_price,
            "carjaidee_service_price" => $garage_service_price + 50,
        ];

        $data["reserve"] = [
            "reserveDate" => $hire_date,
            "reservetime" => $hire_time,
            "garageId" => $garageId,
            "created_at" => date('Y-m-d H:i:s', time()),
            "created_by" => $userId,
            "status" => 1,
            "orderId" => null,
        ];

        if (!empty($name)) {
            $config['upload_path'] = 'public/image/payment/';
            $img = $this->post("slip");
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $base64 = base64_decode($img);
            $imageName = uniqid() . '.png';
            $file = $config['upload_path'] . '/' . $imageName;
            $success = file_put_contents($file, $base64);
            if (!$success) {
                $output["message"] = REST_Controller::MSG_ERROR;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }

            $data['order']['status'] = 2;
            $data["payments"] = [
                "date" => $slipdate,
                "time" => $sliptime,
                "transfer" => $name,
                "money" => $price_per_unit * $number,
                "slip" => $imageName,
                "orderId" => null,
                "created_by" => $userId,
                "created_at" => date('Y-m-d H:i:s', time()),
                "status" => 1,
            ];
        }

        $option = [
            "data_check" => null,
            "data" => $data,
            "model" => $this->checkouts,
            "image_path" => (!empty($name)) ? $file : null,
        ];
        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

    }

    public function order_credit_post()
    {
        $tire_dataId = $this->post('tire_dataId');
        $garageId = $this->post('garageId');
        $number = $this->post('quantity');
        $hire_date = $this->post('hire_date_submit');
        $hire_time = $this->post('hire_time_submit');
        $car_profile = $this->post('car_profile');

        $price_per_unit = $this->post('price_per_unit');
        $product_price = $this->post('product_price');
        $charge_price = $this->post('charge_price');
        $delivery_price = $this->post('delivery_price');
        $garage_service_price = $this->post('garage_service_price');

        //payment
        $name = $this->post('name');
        $slipdate = $this->post('slipdate_submit');
        $sliptime = $this->post('sliptime_submit');
        $slip = $this->post('slip');
        $userId = $this->session->userdata['logged_in']['id'];

        $data['order'] = [
            "userId" => $userId,
            "create_by" => $userId,
            "status" => 1,
            "statusSuccess" => 1,
            "activeflag" => 1,
            "create_at" => date('Y-m-d H:i:s', time()),
            "car_profileId" => $car_profile,
        ];

        $tireData = $this->tiredatas->getTireDataById($tire_dataId);
        $minTireData = $this->tiredatas->getMinTireDataById($tire_dataId);
        // $carjaidee_service_price = $this->prices->getPriceCarjaideeChangePrice($tireData->rimId);

        $data['orderdetail'] = [
            "orderId" => null,
            "userId" => $userId,
            "productId" => $tire_dataId,
            "real_productId" => $minTireData->tire_dataId,
            "quantity" => $number,
            "status" => 1,
            "activeflag" => 1,
            "create_at" => date('Y-m-d H:i:s', time()),
            "group" => "tire",
            "orderselect_status" => 0,
            "car_accessoriesId" => $tireData->car_accessoriesId,
            'real_car_accessoriesId' => $minTireData->car_accessoriesId,
            "price_per_unit" => $price_per_unit,
            "product_price" => $product_price,
            'min_product_price' => $minTireData->price,
            'real_product_price' => $minTireData->price * $number,
            "charge_price" => $charge_price,
            "delivery_price" => $delivery_price,
            "garage_service_price" => $garage_service_price,
            "carjaidee_service_price" => $garage_service_price + 50,
        ];

        $data["reserve"] = [
            "reserveDate" => $hire_date,
            "reservetime" => $hire_time,
            "garageId" => $garageId,
            "created_at" => date('Y-m-d H:i:s', time()),
            "created_by" => $userId,
            "status" => 1,
            "orderId" => null,
        ];

        $option = [
            "data_check" => null,
            "data" => $data,
            "model" => $this->checkout_credit,
        ];

        $result = $this->checkout_credit->insert($data);
        $return = [];
        if($result){
            $xml = file_get_contents($result['url']);
            $arr = simplexml_load_string($xml);
            if($arr->status == 's'){
                $return['url'] = urldecode($arr->endPointUrl);
                $return["message"] = REST_Controller::MSG_SUCCESS;
            }else{
                $return["message"] = REST_Controller::MSG_NOT_CREATE;
            }
        }else{
            $return["message"] = REST_Controller::MSG_NOT_CREATE;
        }

        $this->set_response($return, REST_Controller::HTTP_OK);
    }

    public function createPaymentDetail_post()
    {
        $userId = $this->session->userdata['logged_in']['id'];
        $data = array();
        $orderId = $this->post("orderId");
        $date = $this->post("date");
        $time = $this->post("time");
        $btransfer = $this->post("bankNameTransfer");
        $breceive = $this->post("bankNameReceive");
        $money = $this->post("money");
        $transfer = $this->post("transfer");
        $paymentdetail = $this->payments->getPaymentId($orderId);
        $config['upload_path'] = 'public/image/payment/';
        $img = $this->post("slip");
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid() . '.png';
        $file = $config['upload_path'] . '/' . $imageName;
        $success = file_put_contents($file, $data);
        if (!$success) {
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
        $data = array(
            'orderId' => $orderId,
            'created_by' => $userId,
            'date' => $date,
            'time' => $time,
            'created_at' => date('Y-m-d H:i:s', time()),
            'receivebank' => $btransfer,
            'transferbankId' => $breceive,
            'transfer' => $transfer,
            // 'slipimage' => NULL,
            'status' => 1,

            "slip" => $imageName,
        );

        if (!empty($paymentdetail)) {
            $option = [
                "data_check_update" => $paymentdetail,
                "data_check" => null,
                "data" => $data,
                "model" => $this->payments,
                "image_path" => $file,
                "old_image_path" => $config['upload_path'] . '/' . $paymentdetail->slip,
            ];

            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        } else {
            $option = [
                "data_check" => null,
                "data" => $data,
                "model" => $this->payments,
                "image_path" => $file,
            ];
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
        }

    }

}