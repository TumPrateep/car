<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Lubricator extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model("lubricatorproduct");
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
        if(empty($this->post('lubricatorId')) && empty($this->post('lubricator_brandId')) && empty($this->post('lubricator_gear')) && empty($this->post('price')))
        {            
            $posts = $this->lubricatorproduct->allLubricatordatas($limit,$start,$order,$dir);
        }else{

            // $lubricatorId = $this->post('lubricatorId');
            // $lubricator_brandId = $this->post('lubricator_brandId');
            // $lubricator_gear = $this->post('lubricator_gear');
            // $price = $this->post('price');
            
            // $status = null; 
            // $posts =  $this->lubricatordatas->LubricatorDatas_search($limit,$start,$order,$dir,$status,$lubricatorId, $lubricator_brandId, $lubricator_gear, $price, $userId);

            // $totalFiltered = $this->lubricatordatas->LubricatorDatas_search_count($lubricatorId, $lubricator_brandId, $lubricator_gear, $price, $userId);
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

}
