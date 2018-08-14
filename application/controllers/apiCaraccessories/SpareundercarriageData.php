<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SpareundercarriageData extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
    }
    public function search_post(){
        $column = "spare_undercarriageDataId";
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

        $this->load->model('spare_undercarriageDatas');
        $totalData = $this->spare_undercarriageDatas->allSpareData_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('spares_brandId')) && empty($this->post('spares_undercarriageId'))  && empty($this->post('price')) )
        {            
            $posts = $this->spare_undercarriageDatas->allSpareData($limit,$start,$order,$dir);
        }
        else {
            
            $spares_brandId = $this->post('spares_brandId');
            $spares_undercarriageId = $this->post('spares_undercarriageId');
            $price = $this->post('price');
            
            $status = null; 
            $posts =  $this->spare_undercarriageDatas->SpareData_search($limit,$start,$order,$dir,$status,$spares_undercarriageId, $spares_brandId, $price);

            $totalFiltered = $this->spare_undercarriageDatas->SpareDatas_search_count($spares_undercarriageId, $spares_brandId, $price);
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['spare_undercarriageDataId'] = $post->spare_undercarriageDataId;
                $nestedData[$count]['spares_brandName'] = $post->spares_brandName;
                $nestedData[$count]['spares_undercarriageName'] = $post->spares_undercarriageName;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['price'] = $post->price;
                $nestedData[$count]['warranty_year'] = $post->warranty_year;
                $nestedData[$count]['warranty_distance'] = $post->warranty_distance;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
                $nestedData[$count]['create_by'] = $post->create_by;
                $nestedData[$count]['warranty'] = $post->warranty;
                
                $data[$index] = $nestedData;
                if($count >= 2){
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
    function createSpareData_post(){
        $spares_brandId = $this->post('spares_brandId');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $userId = $this->session->userdata['logged_in']['id'];
        $price = $this->post('price');
        $warranty = $this->post('warranty');
        $warranty_year = $this->post('warranty_year');
        $warranty_distance = $this->post('warranty_distance');
        $this->load->model('spare_undercarriageDatas');
        $checknotDuplicate = $this->spare_undercarriageDatas->checknotDuplicated($spares_brandId,$spares_undercarriageId);
        if($checknotDuplicate){
           $data = array(
            'spares_undercarriageDataId' => null,
            'spares_brandId' => $spares_brandId,
            'spares_undercarriageId' =>$spares_undercarriageId,
            'status' => 2,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId,
            "activeFlag" => 2,
            'price' => $price,
            'warranty' => $warranty,
            'warranty_year' => $warranty_year,
            'warranty_distance' => $warranty_distance
           );
        $result = $this->spare_undercarriageDatas->insert($data);
        $output["status"] = $result;
           if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
           }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_NOT_CREATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
           }
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    
}
