<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Garages extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("reserves");
        $this->load->model("location");
        $this->load->model("garage");
    }

    public function getGarageData_get()
    {
        $orderId = $this->get('orderId');
        $garage = $this->reserves->getGarageDataFromOrderId($orderId);
        $garageData = $this->garage->getGarageByGarageId($garage->garageId);

        $garageData->provinceName = $this->location->getProvinceNameByProvinceId($garageData->provinceId);
        $garageData->districtName = $this->location->getDistrictNameByDistrictId($garageData->districtId);
        $garageData->subdistrictName = $this->location->getSubDistrictBySubDistrictId($garageData->subdistrictId);

        $this->set_response($garageData, REST_Controller::HTTP_OK);
    }

}