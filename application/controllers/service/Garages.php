<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Garages extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("searchgarage");
    }

    // function getAllGarage_get(){
    //     $data = $this->garage->getAllGarage();
    //     $this->set_response($data, REST_Controller::HTTP_OK);
    // }

    public function search_post(){
        $column = "garageId";
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
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->Searchgarage->allgarage_count();
        $totalFiltered = $totalData; 
        // if(empty($this->post('firstName'))&& empty($this->post('skill')))
        // {            
            $posts = $this->Searchgarage->allgarage($limit,$start,$order,$dir);
        // }
        // else {
        //     $firstname = $this->post('firstName'); 
        //     $skill = $this->post('skill');
        //     $posts =  $this->mechanics->mechanics_search($limit,$start,$order,$dir,$firstname,$skill);
        //     $totalFiltered = $this->mechanics->mechanics_search_count($firstname,$skill);
        // }
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
                
                // $nestedData[$count]['role'] = $post->role;
                // $nestedData[$count]['exp'] = $post->exp;


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

}