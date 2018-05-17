<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SparePartCar extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'sparesbrandName'
            
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("Sparesbrand");
        $totalData = $this->Sparesbrand->allSparesbrand_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('search')))
        {            
            $posts = $this->Sparesbrand->allSparesbrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('search'); 

            $posts =  $this->Sparesbrand->sparesbrand_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->Sparesbrand->sparesbrand_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['sparesbrandId'] = $post->sparesbrandId;
                $nestedData['sparesbrandName'] = $post->sparesbrandName;

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
        $isCheck = $this->Sparesbrand->getBrandforTF($spares_brandName,$spares_undercarriageId);

        if($isCheck){
            $data = array(
                'spares_brandId' => null,
                'spares_brandName' => $spares_brandName,
                'status' => 1,
                'spares_undercarriageId' => $spares_undercarriageId
                
            );
            $result = $this->Sparesbrand->insertBrand($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else{
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
        $sparesbrandId = $this->get('sparesbrandId');

        $this->load->model("Sparesbrand");
        $sparBrand = $this->SpaSparesbrandre->getSpareBrandbyId($sparesbrandId);
        if($sparBrand != null){
            $isDelete = $this->Sparesbrand->delete($sparesbrandId);
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





    }
