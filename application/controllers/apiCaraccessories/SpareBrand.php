<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SpareBrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
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
                'status' => 2,
                'spares_undercarriageId' => $spares_undercarriageId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'update_at' => null,
                'update_by' => null
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
                $nestedData[$count]['spares_brandId'] = $post->spares_brandId;
                $nestedData[$count]['spares_undercarriageId'] = $post->spares_undercarriageId;
                $nestedData[$count]['spares_brandName'] = $post->spares_brandName;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
                $nestedData[$count]['create_by'] = $post->create_by;
                
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

    function deleteSpareBrand_get(){
        $spares_brandId = $this->get('spares_brandId');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $this->load->model("Sparesbrand");
        $sparBrand = $this->Sparesbrand->getSpareBrandbyId($spares_brandId);
        if($sparBrand != null){
            $isCheckStatus =$this->Sparesbrand->checkStatusFromSpareBrand($spares_brandId,$status,$userId);
            if($isCheckStatus ){
            $isDelete = $this->Sparesbrand->delete($spares_brandId);
                if($isDelete){
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    $output["message"] = REST_Controller::MSG_BE_USED;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }
            }else{
                $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
                $this->set_response($output, REST_Controller::HTTP_OK);
           }
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getSpareBrand_post(){
        $spares_brandId = $this->post('spares_brandId');
        $this->load->model("Sparesbrand");
        $sparBrand = $this->Sparesbrand->getSpareBrandbyId($spares_brandId);
            if($sparBrand != null){
                $output["data"] = $sparBrand;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
    }
}