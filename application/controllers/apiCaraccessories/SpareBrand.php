<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sparebrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("sparesbrand");
    }
    function createSpareBrand_post(){

        $spares_brandName = $this->post("spares_brandName");
        $spares_undercarriageId = $this->post("spares_undercarriageId");
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->sparesbrand->data_check_create($spares_brandName,$spares_undercarriageId);
            $data = array(
                'spares_brandId' => null,
                'spares_brandName' => $spares_brandName,
                'status' => 2,
                'spares_undercarriageId' => $spares_undercarriageId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'update_at' => null,
                'update_by' => null,
                "activeFlag" => 2
            );
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->sparesbrand,
                "image_path" => null
            ];
    
            $this->set_response(user_decision_create($option), REST_Controller::HTTP_OK);
        }
            
    function searchSpares_post(){
        $column = "spares_brandName";
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
        $spares_undercarriageId = $this->post("spares_undercarriageId");
        
        $totalData = $this->sparesbrand->allSpares_brand_count($spares_undercarriageId);

        $totalFiltered = $totalData; 

        if(empty($this->post('spares_brandName'))  && empty($this->post('status')))
        {            
            $posts = $this->sparesbrand->allSpares_brand($limit,$start,$order,$dir, $spares_undercarriageId);
        }
        else {
            $search = $this->post('spares_brandName'); 
            $status = $this->post('status'); 

            $posts =  $this->sparesbrand->spares_brand_search($limit,$start,$search,$order,$dir, $spares_undercarriageId, $status);

            $totalFiltered = $this->sparesbrand->spares_brand_search_count($search, $spares_undercarriageId, $status);
        }
        $data = array();        
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                $nestedData[$count]['spares_brandId'] = $post->spares_brandId;
                $nestedData[$count]['spares_undercarriageId'] = $post->spares_undercarriageId;
                $nestedData[$count]['spares_brandName'] = $post->spares_brandName;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['create_by'] = $post->create_by;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
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

    function deleteSpareBrand_get(){
        $spares_brandId = $this->get('spares_brandId');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->sparesbrand->getSpareBrandbyId($spares_brandId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $spares_brandId,
            "model" => $this->sparesbrand,
            "image_path" => null
        ];

        $this->set_response(user_decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getSpareBrand_post(){
        $spares_brandId = $this->post('spares_brandId');
        $data_check = $this->sparesbrand->getSpareBrandbyId($spares_brandId);
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
    function updateSpareBrand_post(){

        $spares_brandId = $this->post('spares_brandId');
        $spares_brandName = $this->post('spares_brandName');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->sparesbrand->data_check_update($spares_brandId,$spares_brandName,$spares_undercarriageId);
        $data_check_update = $this->sparesbrand->getSpareBrandbyId($spares_brandId);
       
        $data = array(
                'spares_brandId' => $spares_brandId,
                'spares_brandName' => $spares_brandName,
                'status' => 2,
                'spares_undercarriageId' => $spares_undercarriageId,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId
            );
            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->sparesbrand,
                "image_path" => null,
                "old_image_path" => null,
            ];
    
            $this->set_response(user_decision_update($option), REST_Controller::HTTP_OK);
        }

    function getAllSpareBrand_get(){
        $spares_undercarriageId = $this->get("spares_undercarriageId");
        $result = $this->sparesbrand->getAllSpareBrand();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}