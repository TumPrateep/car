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

        $sparesbrandName = $this->post("sparesbrandName");
        
        $this->load->model("Spare");
        $isCheck = $this->Spare->getBrandforTF($sparesbrandName);

        if($isCheck){
            $data = array(
                'sparesbrandId' => null,
                'sparesbrandName' => $sparesbrandName
            );
            $result = $this->Spare->insertBrand($data);
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

        $sparesbrandId = $this->post('sparesbrandId');
        $sparesbrandName = $this->post('sparesbrandName');
        
        $this->load->model("Spare");

        $result = $this->Spare->wherenotBrand($sparesbrandId,$sparesbrandName);

        if($result){
            $data = array(
                'sparesbrandId' => $sparesbrandId,
                'sparesbrandName' => $sparesbrandName
            );
            $result = $this->Spare->updateBrand($data);
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

        $this->load->model("Spare");
        $sparBrand = $this->Spare->getSpareBrandbyId($sparesbrandId);
        if($sparBrand != null){
            $isDelete = $this->Spare->delete($sparesbrandId);
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

        $sparesbrandName = $this->post('sparesbrandName');
        $this->load->model("Spare");
        $isCheck = $this->Spare->checkSpareBrand($sparesbrandName);

        if($isCheck){
            $output["status"] = true;
            $result = $this->Spare->getBrand($sparesbrandName);
            if($result != null){
                $output["data"] = $result;
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

    function getSpare_post(){

        $sparesId = $this->post('sparesId');
        $this->load->model("Spare");
        $isCheck = $this->Spare->getSparebyId($sparesId);

        if($isCheck){
            $output["status"] = true;
            $result = $this->Spare->getSpare($sparesId);
            if($result != null){
                $output["data"] = $result;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }


    }



    }
