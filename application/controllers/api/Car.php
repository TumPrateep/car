<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }

    function search_post(){
        $columns = array( 
            0 =>'brandId', 
            1 =>'brandPic',
            2 =>'brandName'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("Brand");
        $totalData = $this->Brand->allBrand_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('search')['value']))
        {            
            $posts = $this->Brand->allBrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('search')['value']; 

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

    function year_post(){

        $brandId = $this->post("brandId");
        $modelId = $this->post("modelId");
        $year = $this->post("year");

        $data = array(
            'brandId' => $brandId,
            'modelId' => $modelId,
            'year' => $year
        );

        $this->load->model("Brand");
        $isCheck = $this->Brand->year_search($data);
        if($isCheck){
            $this->Brand->insert_year($data);
            $output["status"] = true;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
        else{
            $output["status"] = false;
            $output["data"] = "year ซ้ำ";
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }
    }


    function model_post(){

        $modelName = $this->post("modelName");

        $this->load->model("Brand");
        $isCheck = $this->Brand->model_search($modelName);

        if($isCheck){
            $data = array(
                'modelId' => null,
                'modelName' => $modelName,
            );
            $this->Brand->insert_model($data);
            $output["status"] = true;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
        else{
            $output["status"] = false;
            $output["data"] = "model ซ้ำ";
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }


    }

    

}