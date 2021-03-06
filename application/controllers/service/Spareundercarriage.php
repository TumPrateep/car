<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spareundercarriage extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model("spareundercarriageproduct");
        $this->load->model("sparesundercarriages");
        $this->load->model("sparesbrand");
        $this->load->model("brand");
        $this->load->model("model");
        $this->load->model("modelofcars");
        
        
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

        
        $totalData = $this->spareundercarriageproduct->allSpareData_count();
        $totalFiltered = $totalData;
        
        if(empty($this->post('spares_brandId')) 
            && empty($this->post('spares_undercarriageId')) 
            && empty($this->post('modelId')) 
            && empty($this->post('brandId'))
            && empty($this->post('modelofcarId'))
            && empty($this->post('price'))
            && empty($this->post('can_change')))
        {            
        
            // $posts = $this->spareundercarriageproduct->allSpareData($limit,$start,$order,$dir);
        }
        else {
            $spares_brandId = $this->post('spares_brandId');
            $spares_undercarriageId = $this->post('spares_undercarriageId');
            $modelId =$this->post('modelId');
            $brandId =$this->post('brandId');
            $modelName =$this->post('modelName');
            $modelofcarId =$this->post('modelofcarId');
            $can_change =$this->post('can_change');
            $price = $this->post('price');
            $status = $this->post('status');
            
            $posts =  $this->spareundercarriageproduct->SpareData_search($limit,$start,$order,$dir,$spares_undercarriageId, $spares_brandId, $price,$modelId,$brandId,$modelofcarId,$can_change,$modelName);

            $totalFiltered = $this->spareundercarriageproduct->SpareDatas_search_count($spares_undercarriageId, $spares_brandId, $price,$modelId,$brandId,$modelofcarId,$can_change,$modelName);
        }

        $this->load->model("sparechanges");
        $sparePriceData = $this->sparechanges->getSpareChangePrice();
        $charge = [];
        foreach($sparePriceData as $cost){
            $charge[$cost->spares_undercarriageId] = $cost->spares_price;
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
                $nestedData[$count]['price'] = ($post->price*1.1) + $charge[$post->spares_undercarriageId];
                $nestedData[$count]['warranty_year'] = $post->warranty_year;
                $nestedData[$count]['warranty_distance'] = $post->warranty_distance;
                $nestedData[$count]['warranty'] = $post->warranty;
                $nestedData[$count]['spares_undercarriageDataPicture'] = $post->spares_undercarriageDataPicture;
                $nestedData[$count]['brandName'] = $post->brandName;
                $nestedData[$count]['modelName'] = $post->modelName;
                $nestedData[$count]['spares_brandPicture'] = $post->spares_brandPicture;
                $nestedData[$count]['modelofcarName'] = $post->modelofcarName;
                $nestedData[$count]['machineSize'] = $post->machineSize;
                if($post->yearEnd != null){
                    $nestedData[$count]['year'] = $post->yearStart."-".$post->yearEnd ." ".$post->detail;
                }else{
                    $nestedData[$count]['year'] = $post->yearStart." ".$post->detail;
                }

                //picture
                $option = [
                    'spares_undercarriageId' => $post->spares_undercarriageId,
                    'spares_brandId' => $post->spares_brandId,
                    'brandId' => $post->brandId,
                    'modelId' => $post->modelId,
                    'modelofcarId' => $post->modelofcarId
                ];
                $nestedData[$count]['picture'] = getPictureSpare($option);
                
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

    function getAllSpareundercarriage_get(){
        $result = $this->sparesundercarriages->getAllSpareundercarriage();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllSpareBrand_get(){
        // $spares_undercarriageId = $this->get("spares_undercarriageId");
        $result = $this->sparesbrand->getAllSpareBrand();
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

    function getAllModelofcar_get(){
        $modelId = $this->get("modelId");
        $result = $this->modelofcars->getAllmodelofcars($modelId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    function getAllYear_get(){
        $detail = $this->get("detail");
        // $modelId = $this->get("modelId");
        $result = $this->model->getAllYear($detail);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    function getAlldetail_get(){
        $modelName = $this->get("modelName");
        $result = $this->model->getAlldetail($modelName);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    
}