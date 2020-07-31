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
    }

    public function getData_post()
    {
        $tire_dataId = $this->post('tire_dataId');
        $garageId = $this->post('garageId');
        $number = $this->post('number');

        $garageData = $this->garage->getGarageByGarageId($garageId);

        $garageData->provinceName = $this->location->getProvinceNameByProvinceId($garageData->provinceId);
        $garageData->districtName = $this->location->getDistrictNameByDistrictId($garageData->districtId);
        $garageData->subdistrictName = $this->location->getSubDistrictBySubDistrictId($garageData->subdistrictId);

        $tireData = $this->tiredatas->getTireDataById($tire_dataId);
        $carjaidee_change_data = $this->prices->getPriceCarjaidee($tireData->rimId, $tireData->tire_sizeId);
        $carjaidee_price = 0;
        if (!empty($carjaidee_change_data)) {
            $carjaidee_price = $carjaidee_change_data->price;
            if ($carjaidee_change_data->unit_id == 1) {
                $carjaidee_price = $tireData->price * $carjaidee_change_data->price / 100;
            }
        }

        $tire_service_data = $this->prices->getPriceService($tireData->rimId);
        $service_price = $tire_service_data->price;

        $garage_service = $this->prices->getPriceFromGarageByGarageId($tireData->rimId, $garageId);

        $tire_price = $tireData->price;
        $tireData->price = ($tire_price + $carjaidee_price + $service_price + ($garage_service->tire_price + 50)) * $number;
        $tireData->price_per_unit = ($tire_price + $carjaidee_price + $service_price + ($garage_service->tire_price + 50));
        $tireData->number = $number;

        $serviceData = [
            'price_per_unit' => $tireData->price_per_unit,
            'product_price' => $tire_price,
            'charge_price' => $carjaidee_price,
            'delivery_price' => $service_price,
            'garage_service_price' => $garage_service->tire_price,
        ];

        $data = [
            "garage_data" => $garageData,
            "tire_data" => $tireData,
            'service' => $serviceData,
        ];
        $this->set_response($data, REST_Controller::HTTP_OK);
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