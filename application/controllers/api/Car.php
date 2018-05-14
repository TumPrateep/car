<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => null, 
            2 =>'brandName'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("Brand");
        $totalData = $this->Brand->allBrand_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('brandName')))
        {            
            $posts = $this->Brand->allBrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('brandName'); 

            $posts =  $this->Brand->brand_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->Brand->brand_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['brandId'] = $post->brandId;
                $nestedData['brandPic'] = '';
                $nestedData['brandName'] = $post->brandName;

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

    function createYear_post(){

        $brandId = $this->post("brandId");
        $modelId = $this->post("modelId");
        $year = $this->post("year");

        $data = array(
            'brandId' => $brandId,
            'modelId' => $modelId,
            'year' => $year,
            'status' => 1
        );

        $this->load->model("Year");
        $isCheck = $this->Year->year_search($data);
        if($isCheck){
            $result = $this->Year->insert_year($data);
            $output["status"] = $result;
            if($result){
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }
        else{
            $output["status"] = false;
            $output["data"] = "year ซ้ำ";
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }
    }


    function createModel_post(){

        $modelName = $this->post("modelName");
        $brandId = $this->post("brandId");
        $status = $this->post("status");

        $this->load->model("Model");
        $isCheck = $this->Model->get_model($modelName);

        if($isCheck){
            $data = array(
                'modelId' => null,
                'modelName' => $modelName,
                'brandId' => $brandId,
                'status' => 1
            );
            $this->Model->insert_model($data);
            $output["status"] = true;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
        else{
            $output["status"] = false;
            $output["data"] = "model ซ้ำ";
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }


    }

    
    function searchModel_post(){
        $columns = array( 
            0 =>null, 
            1 =>null,
            2 =>'modelName'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $brandId = $this->post('brandId');

        $this->load->model("Model");
        $totalData = $this->Model->allModel_count($brandId);

        $totalFiltered = $totalData; 

        if(empty($this->post('modelName')) || empty($this->post('brandId')))
        {            
            $posts = $this->Model->allModel($limit,$start,$order,$dir,$brandId);
        }
        else {
            $search = $this->post('modelName'); 

            $posts =  $this->Model->model_search($limit,$start,$search,$order,$dir,$brandId);

            $totalFiltered = $this->Model->model_search_count($search, $brandId);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['brandId'] = $post->brandId;
                $nestedData['modelId'] = $post->modelId;
                $nestedData['modelName'] = $post->modelName;

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

    function viewBrand(){

        $brandname = $this->post('brandname');
        $this->load->model("Brand");
        $isCheck = $this->Brand->check_brand($brandname);

        if($isCheck){
            $this->load->get_brand($brandName);
        else{
           
        }


    }

}