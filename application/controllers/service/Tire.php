<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Tire extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model("tireproduct");
        $this->load->model("triebrands");
        $this->load->model("triemodels");
        $this->load->model("triesizes");
        $this->load->model("rims");
        $this->load->model("brand");
        $this->load->model("model");
        $this->load->model('modelofcars');
        $this->load->model('tirematch');
    }

    function search_post(){
        $column = "tire_dataId";
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
        

        $totalData = $this->tireproduct->allTire_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('tire_brandId')) && empty($this->post('tire_modelId')) && empty($this->post('rimId')) && empty($this->post('tire_sizeId')) && empty($this->post('price')) &&empty($this->post('can_change')) &&empty($this->post('warranty_year')) &&empty($this->post('warranty_distance'))&& empty($this->post('brandId'))&& empty($this->post('modelId'))&& empty($this->post('modelofcarId'))&& empty($this->post('yearStart'))&& empty($this->post('yearEnd'))&& empty($this->post('tire_matchingId')))
        {            
            $posts = $this->tireproduct->allTires($limit,$start,$order,$dir);
        }
        else {
             
            $tire_brandId = $this->post('tire_brandId');
            $tire_modelId = $this->post('tire_modelId');
            $rimId = $this->post('rimId');
            $tire_sizeId = $this->post('tire_sizeId');
            $price = $this->post('price');
            $can_change = $this->post('can_change');
            $status = $this->post('status');
            $warranty_year = $this->post('warranty_year');
            $warranty_distance = $this->post('warranty_distance');
            $brandId = $this->post('brandId');
            $modelId = $this->post('modelId');
            $modelofcarId = $this->post('modelofcarId');
            $yearStart = $this->post('yearStart');
            $yearEnd = $this->post('yearEnd');
            $tire_matchingId = $this->post('tire_matchingId');
            
            // $status = null; 
            $posts =  $this->tireproduct->tireData_search($limit,$start,$order,$dir,$status,$tire_brandId, $tire_modelId, $rimId, $tire_sizeId, $price, $can_change, $can_change,$warranty_year,$warranty_distance,$brandId,$modelId,$modelofcarId,$yearStart,$yearEnd,$tire_matchingId);

            $totalFiltered = $this->tireproduct->TireDatas_search_count($limit,$start,$order,$dir,$tire_brandId, $tire_modelId, $rimId, $tire_sizeId, $price, $can_change, $can_change,$warranty_year,$warranty_distance,$status,$brandId,$modelId,$modelofcarId,$yearStart,$yearEnd,$tire_matchingId);
        }

        $this->load->model("tirechanges");
        $tirePriceData = $this->tirechanges->getTireChangePrice();
        $charge = [];
        foreach($tirePriceData as $cost){
            $charge[$cost->rimId] = $cost->tire_price;
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['tire_dataId'] = $post->tire_dataId;
                $nestedData[$count]['rimName'] = $post->rimName;
                $nestedData[$count]['tire_size'] = $post->tire_size;
                $nestedData[$count]['tire_modelName'] = $post->tire_modelName;
                $nestedData[$count]['tire_brandName'] = $post->tire_brandName;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['price'] = ($post->price*1.1) + $charge[$post->rimId];
                $nestedData[$count]['warranty_year'] = $post->warranty_year;
                $nestedData[$count]['can_change'] = $post->can_change;
                $nestedData[$count]['warranty_distance'] = $post->warranty_distance;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
                $nestedData[$count]['warranty'] = $post->warranty;
                $nestedData[$count]['tire_picture'] = $post->tire_picture;
                $nestedData[$count]['tire_brandPicture'] = $post->tire_brandPicture;
                
                $option = [
                    'tire_brandId' => $post->tire_brandId,
                    'tire_modelId' => $post->tire_modelId,
                    'tire_sizeId' => $post->tire_sizeId,
                    'rimId' => $post->rimId
                ];
                $nestedData[$count]['picture'] = getPictureTire($option);
                
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
    function getAllTireBrand_get(){
        
        $result = $this->triebrands->getAllTriebrands();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllTireModel_get(){
        $tire_brandId = $this->get("tire_brandId");
        
        $result = $this->triemodels->getAllTireModelByTireBrandId($tire_brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllTireSize_get(){
        $rimId = $this->get("rimId");
        
        $result = $this->triesizes->getAllTireSizeByrimId($rimId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    function getAllTireRims_get(){
        
        $result = $this->rims->getAllRims();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllBrand_get(){
        $result = $this->tirematch->getAllBrandforSelect();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    function getAllmodel_get(){
        $brandId = $this->get('brandId');
        $result = $this->tirematch->getAllmodelforSelect($brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllModelofcar_get(){
        $modelId = $this->get('modelId');
        $result = $this->tirematch->getAllmodelofcarforSelect($modelId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllYear_get(){
        $modelId = $this->get("modelId");
        $result = $this->tirematch->getAllYear_get($modelId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    

}