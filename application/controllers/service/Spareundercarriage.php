<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spareundercarriage extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model("Spareundercarriageproduct");
        $this->load->model("sparesundercarriages");
        $this->load->model("sparesbrand");
        $this->load->model("brand");
        $this->load->model("model");
        
        
    }
    public function search_post(){
        $column = "spares_undercarriageDataId";
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

        
        $totalData = $this->Spareundercarriageproduct->allSpareData_count();
        $totalFiltered = $totalData;
        
        if(empty($this->post('spares_brandId')) && empty($this->post('spares_undercarriageId'))  && empty($this->post('modelId')) && empty($this->post('brandId'))&& empty($this->post('yearStart'))&& empty($this->post('yerrEnd'))&& empty($this->post('price'))&& empty($this->post('can_change')) && empty($this->post('warranty_distance'))&& empty($this->post('warranty_year')))
        {            
            $posts = $this->Spareundercarriageproduct->allSpareData($limit,$start,$order,$dir);
        }
        else {
            
            $spares_brandId = $this->post('spares_brandId');
            $spares_undercarriageId = $this->post('spares_undercarriageId');
            $modelId =$this->post('modelId');
            $brandId =$this->post('brandId');
            $yearStart =$this->post('yearStart');
            $yearEnd =$this->post('yearEnd');
            $can_change =$this->post('can_change');
            $warranty_distance =$this->post('warranty_distance');
            $warranty_year =$this->post('warranty_year');
            $price = $this->post('price');
            $status = $this->post('status');
            
            
            $posts =  $this->Spareundercarriageproduct->SpareData_search($limit,$start,$order,$dir,$status,$spares_undercarriageId, $spares_brandId, $price,$modelId,$brandId,$yearStart,$yearEnd,$can_change,$warranty_distance,$warranty_year);

            $totalFiltered = $this->Spareundercarriageproduct->SpareDatas_search_count($limit,$start,$order,$dir,$status,$spares_undercarriageId, $spares_brandId, $price,$modelId,$brandId,$yearStart,$yearEnd,$can_change,$warranty_distance,$warranty_year);
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['spares_undercarriageDataId'] = $post->spares_undercarriageDataId;
                $nestedData[$count]['spares_brandName'] = $post->spares_brandName;
                $nestedData[$count]['spares_undercarriageName'] = $post->spares_undercarriageName;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['price'] = $post->price;
                $nestedData[$count]['warranty_year'] = $post->warranty_year;
                $nestedData[$count]['warranty_distance'] = $post->warranty_distance;
                $nestedData[$count]['warranty'] = $post->warranty;
                $nestedData[$count]['spares_undercarriageDataPicture'] = $post->spares_undercarriageDataPicture;
                $nestedData[$count]['brandName'] = $post->brandName;
                $nestedData[$count]['modelName'] = $post->modelName;
                if($post->yearEnd != null){
                    $nestedData[$count]['year'] = $post->yearStart."-".$post->yearEnd;
                }else{
                    $nestedData[$count]['year'] = $post->yearStart;
                }
                
                $data[$index] = $nestedData;
                if($count >= 4){
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

    function getAllSpareundercarriage_get(){
        $result = $this->sparesundercarriages->getAllSpareundercarriage();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllSpareBrand_get(){
        $spares_undercarriageId = $this->get("spares_undercarriageId");
        $result = $this->sparesbrand->getAllSpareBrand($spares_undercarriageId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllBrand_get(){
        $result = $this->brand->getAllBrandforSelect();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllModel_get(){
        $brandId = $this->get("brandId");
        $result = $this->model->getAllmodel($brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    
}