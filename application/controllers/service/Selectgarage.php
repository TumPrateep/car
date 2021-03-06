<?php defined('BASEPATH') or exit('No direct script access allowed');

class Selectgarage extends BD_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('selectgarages');
        $this->load->model('triesizes');
        $this->load->model('tiredatas');
        $this->load->model('location');
        $this->load->model('prices');
        $this->load->model('lubricatordatas');
    }

    public function lubricator_search_post()
    {
        $column = "garage.garageName";
        $sort = "asc";
        if ($this->post('column') == 3) {
            $column = "status";
        } else if ($this->post('column') == 2) {
            $sort = "desc";
        } else {
            $sort = "asc";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;

        $machine_id = $this->post('machine_id');
        $lubricator_numberId = $this->post('lubricator_numberId');
        $lubricator_dataId = $this->post('lubricator_dataId');
        $latitude = $this->post('latitude');
        $longitude = $this->post('longitude');

        // $rimData = $this->triesizes->gettrie_sizeById($tire_sizeId);
        $totalData = $this->selectgarages->select_lubricator_garage_search_count($machine_id);
        $totalFiltered = $totalData;
        $posts = $this->selectgarages->select_lubricator_garage_search($limit, $start, $order, $dir, $machine_id, null, $latitude, $longitude);
        // // $totalFiltered = $this->selectgarages->select_garage_search_count($rimData->rimId);
        // // dd();

        // // < ------------

        $lubricatorData = $this->lubricatordatas->getlubricatorDatasById($lubricator_dataId);
        $carjaidee_change_data = $this->prices->getLubricatorPriceCarjaidee($machine_id);
        $carjaidee_price = 0;
        if (!empty($carjaidee_change_data)) {
            $carjaidee_price = $carjaidee_change_data->price;
            if ($carjaidee_change_data->unit_id == 1) {
                $carjaidee_price = $lubricatorData->price * $carjaidee_change_data->price / 100;
            }
        }

        $lubricator_service_data = $this->prices->getLubricatorPriceService($machine_id);
        $service_price = $lubricator_service_data->price;

        $lubricatorData->price = $lubricatorData->price + $carjaidee_price + $service_price;

        // --------------------->

        // // dd($carjaidee_price);

        $nestedData = array();
        $count = 0;
        // // $index = 0;

        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData[$count]['garageId'] = $post->garageId;
                $nestedData[$count]['garageName'] = $post->garageName;
                $nestedData[$count]['phone'] = $post->phone;
                $nestedData[$count]['dayopenhour'] = $post->dayopenhour;
                $nestedData[$count]['openingtime'] = $post->openingtime;
                $nestedData[$count]['closingtime'] = $post->closingtime;
                $nestedData[$count]['latitude'] = (float) $post->latitude;
                $nestedData[$count]['longitude'] = (float) $post->longtitude;
                $nestedData[$count]['picture'] = $post->picture;
                $nestedData[$count]['garageService'] = (float) $post->garageService;
                $nestedData[$count]['lubricator_price'] = $post->lubricator_price;
                $nestedData[$count]['lubricatorData'] = $lubricatorData;

                $nestedData[$count]['service_option1'] = $post->service_option1;
                $nestedData[$count]['service_option1_price'] = $post->service_option1_price;
                $nestedData[$count]['service_option2'] = $post->service_option2;
                $nestedData[$count]['service_option3'] = $post->service_option3;

                $nestedData[$count]['provinceName'] = $this->location->getProvinceNameByProvinceId($post->provinceId);
                $nestedData[$count]['districtName'] = $this->location->getDistrictNameByDistrictId($post->districtId);
                $nestedData[$count]['subdistrictName'] = $this->location->getSubDistrictBySubDistrictId($post->subdistrictId);
                // $data[$index] = $nestedData;
                // if($count >= 3){
                //     $count = -1;
                //     $index++;
                //     $nestedData = [];
                // }

                $count++;
            }
        }

        $json_data = array(
            "draw" => intval($this->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $nestedData,
        );

        $this->set_response($json_data);
    }

    public function search_post()
    {
        $column = "garage.garageName";
        $sort = "asc";
        if ($this->post('column') == 3) {
            $column = "status";
        } else if ($this->post('column') == 2) {
            $sort = "desc";
        } else {
            $sort = "asc";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;

        $tire_sizeId = $this->post('tire_sizeId');
        $tire_modelId = $this->post('tire_modelId');
        $tire_dataId = $this->post('tire_dataId');
        $latitude = $this->post('latitude');
        $longitude = $this->post('longitude');

        $rimData = $this->triesizes->gettrie_sizeById($tire_sizeId);
        $totalData = $this->selectgarages->select_garage_search_count($rimData->rimId);
        $totalFiltered = $totalData;
        $posts = $this->selectgarages->select_garage_search($limit, $start, $order, $dir, $rimData->rimId, null, $latitude, $longitude);
        // $totalFiltered = $this->selectgarages->select_garage_search_count($rimData->rimId);
        // dd();

        // < ------------

        $tireData = $this->tiredatas->getTireDataById($tire_dataId);
        $carjaidee_change_data = $this->prices->getPriceCarjaidee($rimData->rimId, $tire_sizeId);
        $carjaidee_price = 0;
        if (!empty($carjaidee_change_data)) {
            $carjaidee_price = $carjaidee_change_data->price;
            if ($carjaidee_change_data->unit_id == 1) {
                $carjaidee_price = $tireData->price * $carjaidee_change_data->price / 100;
            }
        }

        $tire_service_data = $this->prices->getPriceService($rimData->rimId);
        $service_price = $tire_service_data->price;

        $tireData->price = $tireData->price + $carjaidee_price + $service_price;

        // --------------------->

        // dd($carjaidee_price);

        $nestedData = array();
        $count = 0;
        // $index = 0;

        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData[$count]['garageId'] = $post->garageId;
                $nestedData[$count]['garageName'] = $post->garageName;
                $nestedData[$count]['phone'] = $post->phone;
                $nestedData[$count]['dayopenhour'] = $post->dayopenhour;
                $nestedData[$count]['openingtime'] = $post->openingtime;
                $nestedData[$count]['closingtime'] = $post->closingtime;
                $nestedData[$count]['latitude'] = (float) $post->latitude;
                $nestedData[$count]['longitude'] = (float) $post->longtitude;
                $nestedData[$count]['picture'] = $post->picture;
                $nestedData[$count]['garageService'] = (float) $post->garageService;
                $nestedData[$count]['tire_price'] = $post->tire_price;
                $nestedData[$count]['tireData'] = $tireData;

                $nestedData[$count]['service_option1'] = $post->service_option1;
                $nestedData[$count]['service_option1_price'] = $post->service_option1_price;
                $nestedData[$count]['service_option2'] = $post->service_option2;
                $nestedData[$count]['service_option3'] = $post->service_option3;

                $nestedData[$count]['provinceName'] = $this->location->getProvinceNameByProvinceId($post->provinceId);
                $nestedData[$count]['districtName'] = $this->location->getDistrictNameByDistrictId($post->districtId);
                $nestedData[$count]['subdistrictName'] = $this->location->getSubDistrictBySubDistrictId($post->subdistrictId);
                // $data[$index] = $nestedData;
                // if($count >= 3){
                //     $count = -1;
                //     $index++;
                //     $nestedData = [];
                // }

                $count++;
            }
        }

        $json_data = array(
            "draw" => intval($this->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $nestedData,
        );

        $this->set_response($json_data);

    }

}