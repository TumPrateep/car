<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Garage extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("searchgarage");
    }

    // function getAllGarage_get(){
    //     $data = $this->garage->getAllGarage();
    //     $this->set_response($data, REST_Controller::HTTP_OK);
    // }

   
    function searchgarage_post(){

        $columns = array( 
            0 => 'garageName'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->Searchgarages->allgarage_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('garageName'))&& empty($this->post('businessRegistration')))
        {            
            $posts = $this->Searchgarages->allgarage($limit,$start,$order,$dir);
        }
        else {
            $garageName = $this->post('garageName'); 
            $businessRegistration = $this->post('businessRegistration');
            $posts =  $this->Searchgarages->garage_search($limit,$start,$order,$dir,$garageName,$businessRegistration);
            $totalFiltered = $this->Searchgarages->garage_search_count($garageName,$businessRegistration);
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
                $nestedData[$count]['businessRegistration'] = $post->businessRegistration;
                $nestedData[$count]['garageAddress'] = $post->garageAddress;
                $nestedData[$count]['postCode'] = $post->postCode;
                $nestedData[$count]['subdistrictId'] = $post->subdistrictId;
                $nestedData[$count]['districtId'] = $post->districtId;
                $nestedData[$count]['provinceId'] = $post->provinceId;
                $nestedData[$count]['latitude'] = $post->latitude;
                $nestedData[$count]['longtitude'] = $post->longtitude;
              
    

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