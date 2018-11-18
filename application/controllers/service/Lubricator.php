<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Lubricator extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model("lubricatorproduct");
        $this->load->model("lubricatorbrands");
        $this->load->model("lubricators");
        $this->load->model("Lubricatortypeformachines");

        

        
    }

    public function search_post(){
        $column = "lubricator_dataId";
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

        $totalData = $this->lubricatorproduct->allLubricatordata_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricatortypeFormachineId')) 
            && empty($this->post('lubricator_gear')) 
            && empty($this->post('lubricator_brandId')) 
            && empty($this->post('lubricatorId'))
            && empty($this->post('price')))
        {            
            $posts = $this->lubricatorproduct->allLubricatordatas($limit,$start,$order,$dir);
        }else{
            $lubricatortypeFormachineId = $this->post('lubricatortypeFormachineId');
            $lubricatorId = $this->post('lubricatorId');
            $lubricator_brandId = $this->post('lubricator_brandId');
            $lubricator_gear = $this->post('lubricator_gear');
            $price = $this->post('price');
            
            // $status = null; 
            $posts =  $this->lubricatorproduct->LubricatorDatas_search($limit,$start,$order,$dir,$lubricatorId, $lubricator_brandId, $lubricator_gear, $price, $lubricatortypeFormachineId);

            $totalFiltered = $this->lubricatorproduct->LubricatorDatas_search_count($lubricatorId, $lubricator_brandId, $lubricator_gear, $price, $lubricatortypeFormachineId);
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['lubricator_dataId'] = $post->lubricator_dataId;
                $nestedData[$count]['lubricator_typeName'] = $post->lubricator_typeName;
                $nestedData[$count]['lubricator_brandName'] = $post->lubricator_brandName;
                $nestedData[$count]['lubricatorName'] = $post->lubricatorName;
                $nestedData[$count]['lubricator_number'] = $post->lubricator_number;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['price'] = $post->price;
                $nestedData[$count]['warranty_year'] = $post->warranty_year;
                $nestedData[$count]['warranty_distance'] = $post->warranty_distance;
                $nestedData[$count]['warranty'] = $post->warranty;
                $nestedData[$count]['lubricator_dataPicture'] = $post->lubricator_dataPicture;
                $nestedData[$count]['lubricator_gear'] = $post->lubricator_gear;
                $nestedData[$count]['lubricator_typeSize'] = $post->lubricator_typeSize;
                $nestedData[$count]['capacity'] = $post->capacity;
                $nestedData[$count]['lubricator_brandPicture'] = $post->lubricator_brandPicture;
                
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

    function getAllLubricatorBrand_get(){
        $result = $this->lubricatorbrands->getAllLubricatorBrand();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllLubricator_get(){
        $lubricator_brandId = $this->get("lubricator_brandId");
        $result = $this->lubricators->getAllLubricator($lubricator_brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAlllubricatortypeFormachine_get(){
        $result = $this->Lubricatortypeformachines->getAlllubricatortypeFormachine();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}
