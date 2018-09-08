<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SparePartCar extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("sparesbrand");
    }

    function searchSpares_post(){
        $columns = array( 
            0 => null,
            1 => 'spares_brandName',
            2 => 'status',   
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

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
            foreach ($posts as $post)
            {
                $nestedData['spares_brandId'] = $post->spares_brandId;
                $nestedData['spares_undercarriageId'] = $post->spares_undercarriageId;
                $nestedData['spares_brandName'] = $post->spares_brandName;
                $nestedData['status'] = $post->status;

                $data[] = $nestedData;

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

    function createSpareBrand_post(){

        $spares_brandName = $this->post("spares_brandName");
        $spares_undercarriageId = $this->post("spares_undercarriageId");
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->sparesbrand->isGetBrand($spares_brandName,$spares_undercarriageId);
            $data = array(
                'spares_brandId' => null,
                'spares_brandName' => $spares_brandName,
                'status' => 1,
                'spares_undercarriageId' => $spares_undercarriageId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'activeFlag' => 1
            );
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->sparesbrand,
                "image_path" => null
            ];
    
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
            
    
    }


    function updateSpareBrand_post(){

        $spares_brandId = $this->post('spares_brandId');
        $spares_brandName = $this->post('spares_brandName');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->sparesbrand-> getSpareBrandbyId($spares_brandId);
        $data_check = $this->sparesbrand->data_check_update($spares_brandId,$spares_brandName,$spares_undercarriageId);

        
            $data = array(
                'spares_brandId' => $spares_brandId,
                'spares_brandName' => $spares_brandName,
                'status' => 1,
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
    
            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }


    function deleteSpareBrand_get(){
        $spares_brandId = $this->get('spares_brandId');

        $data_check = $this->sparesbrand->getSpareBrandbyId($spares_brandId);
            
        $option = [
            "data_check_delete" => $data_check,
            "data" => $spares_brandId,
            "model" => $this->sparesbrand,
            "image_path" => null
        ];
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getBrand_post(){

        $spares_brandId = $this->post('spares_brandId');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        
        
        $data_check = $this->sparesbrand->getUpdate($spares_brandId,$spares_undercarriageId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }


    function changeStatus_post(){
        $spares_brandId = $this->post("spares_brandId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data_check_update = $this->sparesbrand->getSpareBrandbyId($spares_brandId);
        $data = array(
            'spares_brandId' => $spares_brandId,
            'status' => $status,
            'activeFlag' => 1
        );
        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->sparesbrand
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }     
    

}
