<?php defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Selectgarage extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('selectgarages');
        $this->load->model('triesizes');
        $this->load->model('tiredatas');
        $this->load->model('location');
    }

    function search_post(){
        $column = "garage.garageName";
        $sort = "asc";
        if($this->post('column') == 3){
            $column = "status";
        }else if($this->post('column') == 2){
            $sort = "desc";
        }else{
            $sort = "asc";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;

        $tire_sizeId = $this->post('tire_sizeId');
        $tire_modelId = $this->post('tire_modelId');
        $tire_dataId = $this->post('tire_dataId');

        $rimData = $this->triesizes->gettrie_sizeById($tire_sizeId);
        $totalData = $this->selectgarages->select_garage_search_count($rimData->rimId);
        $totalFiltered = $totalData; 
        $posts =  $this->selectgarages->select_garage_search($limit,$start,$order,$dir,$rimData->rimId);
        // $totalFiltered = $this->selectgarages->select_garage_search_count($rimData->rimId);
        // dd();

        $tireData = $this->tiredatas->getTireDataById($tire_dataId);

        $nestedData = array();
        $count = 0;
        // $index = 0;
        if(!empty($posts))
        {
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
            "draw"            => intval($this->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $nestedData   
        );

        $this->set_response($json_data);

    }

}