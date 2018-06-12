<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SparePartCar extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
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
        $this->load->model("Sparesbrand");
        $totalData = $this->Sparesbrand->allSpares_brand_count($spares_undercarriageId);

        $totalFiltered = $totalData; 

        if(empty($this->post('spares_brandName'))  && empty($this->post('status')))
        {            
            $posts = $this->Sparesbrand->allSpares_brand($limit,$start,$order,$dir, $spares_undercarriageId);
        }
        else {
            $search = $this->post('spares_brandName'); 
            $status = $this->post('status'); 

            $posts =  $this->Sparesbrand->spares_brand_search($limit,$start,$search,$order,$dir, $spares_undercarriageId, $status);

            $totalFiltered = $this->Sparesbrand->spares_brand_search_count($search, $spares_undercarriageId, $status);
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
        
        $this->load->model("Sparesbrand");
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->Sparesbrand->isGetBrand($spares_brandName,$spares_undercarriageId);

        if($isCheck){
            $data = array(
                'spares_brandId' => null,
                'spares_brandName' => $spares_brandName,
                'status' => 1,
                'spares_undercarriageId' => $spares_undercarriageId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId
            );
            $result = $this->Sparesbrand->insertBrand($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }

        }
        else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }


    function updateSpareBrand_post(){

        $spares_brandId = $this->post('spares_brandId');
        $spares_brandName = $this->post('spares_brandName');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        
        $this->load->model("Sparesbrand");

        $result = $this->Sparesbrand->wherenotBrand($spares_brandId,$spares_brandName,$spares_undercarriageId);

        if($result){
            $data = array(
                'spares_brandId' => $spares_brandId,
                'spares_brandName' => $spares_brandName,
                'status' => 1,
                'spares_undercarriageId' => $spares_undercarriageId
            );
            $result = $this->Sparesbrand->updateBrand($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }


    function deleteSpareBrand_get(){
        $spares_brandId = $this->get('spares_brandId');

        $this->load->model("Sparesbrand");
        $sparBrand = $this->Sparesbrand->getSpareBrandbyId($spares_brandId);
        if($sparBrand != null){
            $isDelete = $this->Sparesbrand->delete($spares_brandId);
            if($isDelete){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_USED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getBrand_post(){

        $spares_brandId = $this->post('spares_brandId');
        $spares_undercarriageId = $this->post('spares_undercarriageId');

        $this->load->model("Sparesbrand");
        $isCheck = $this->Sparesbrand->checkSpareBrand($spares_brandId,$spares_undercarriageId);

        if($isCheck){
            $output["status"] = true;
            $result = $this->Sparesbrand->getSpareBrandbyId($spares_brandId);
            if($result != null){
                $output["data"] = $result;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_ERROR;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }


    function changeStatus_post(){
        $spares_brandId = $this->post("spares_brandId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'status' => $status
        );
        $this->load->model("Sparesbrand");
        $result = $this->Sparesbrand->updateStatus($spares_brandId,$data);
        if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }


    }
