<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends BD_Controller {
    function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->model('garage');
        $this->load->model('location');
        $this->load->model('tiredatas');
        $this->load->model('prices');
        $this->load->model('selectgarages');
    }

    function getData_post(){
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
        if(!empty($carjaidee_change_data)){
            $carjaidee_price = $carjaidee_change_data->price;
            if($carjaidee_change_data->unit_id == 1){
                $carjaidee_price = $tireData->price * $carjaidee_change_data->price / 100;
            }
        }

        $tire_service_data = $this->prices->getPriceService($tireData->rimId);
        $service_price = $tire_service_data->price;

        $garage_service= $this->prices->getPriceFromGarageByGarageId($tireData->rimId, $garageId);

        $tire_price = $tireData->price;
        $tireData->price = ($tire_price + $carjaidee_price + $service_price + $garage_service->tire_price)*$number;
        $tireData->price_per_unit = ($tire_price + $carjaidee_price + $service_price + $garage_service->tire_price);
        $tireData->number = $number;

        $data = [
            "garage_data" => $garageData,
            "tire_data" => $tireData
        ];
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

}