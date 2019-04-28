<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Garages extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("searchgarages");
        $this->load->model("garage");
    }

    function getAllGarage_get(){
        $data = $this->garage->getAllGarage();
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    function getAllGarage_post(){
        $dataType = $this->post("dataType");
        $data = $this->garage->getAllGarageByDataType($dataType);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

   
    function searchgarage_post(){

        // $columns = array( 
        //     0 => 'garageName'
        // );
        $latitude = $this->post('latitude');
        $longitude = $this->post('longitude');

        $column = "garageName";
        $sort = "asc";
        if($this->post('sort') == 2){
            $sort = "desc";
        }else if($this->post('sort') == 3){
            $column = "distance";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;
        $totalData = $this->searchgarages->allgarage_count($latitude,$longitude);
        $totalFiltered = $totalData; 
        if(empty($this->post('garagename')) && empty($this->post('provinceIdSearch')) && empty($this->post('districtIdSearch')) &&
            empty($this->post('subdistrictIdSearch')) && empty($this->post('brandId')) && empty($this->post('service')))
        {            
            $posts = $this->searchgarages->allgarage($limit,$start,$order,$dir,$latitude,$longitude);
        } else {
            $garageName = $this->post('garagename');
            $provinceId = $this->post('provinceIdSearch'); 
            $districtId = $this->post('districtIdSearch'); 
            $subdistrictId = $this->post('subdistrictIdSearch');
            $brandId = $this->post('brandId');
            $service = $this->post('service');
            $posts =  $this->searchgarages->garage_search($limit,$start,$order,$dir,$garageName,$provinceId,$districtId,$subdistrictId,$brandId,$service,$latitude,$longitude);
            $totalFiltered = $this->searchgarages->garage_search_count($garageName,$provinceId,$districtId,$subdistrictId,$brandId,$service,$latitude,$longitude);
        }
        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['garageId'] = $post->garageId;
                $nestedData[$count]['garageName'] = $post->garageName;
                $nestedData[$count]['dayopenhour'] = $post->dayopenhour;
                $nestedData[$count]['opentime'] = $post->openingtime." - ".$post->closingtime;
                $nestedData[$count]['picture'] = $post->picture;
                $nestedData[$count]['garageService'] = $post->garageService;
                $nestedData[$count]['option1'] = $post->option1;
                $nestedData[$count]['option2'] = $post->option2;
                $nestedData[$count]['option3'] = $post->option3;
                $nestedData[$count]['option4'] = $post->option4;
                $nestedData[$count]['latitude'] = (float) $post->latitude;
                $nestedData[$count]['longitude'] = (float) $post->longtitude;
                if(!empty($post->distance)){
                    $nestedData[$count]['distance'] = (float) $post->distance;
                }                
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

    function getgarage_post(){
        $mechanicId = $this->post('garageId');
        $data_check = $this->Searchgarages->getgarageById($garageId);
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
}