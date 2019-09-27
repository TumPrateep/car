<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatormatching extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatormatchings");
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'lubricator_matching.brand_id', 
            2 => 'lubricator_matching.machine_id',
            3 => 'lubricator_brandName',
            4 => 'lubricatorName',
            5 => 'lubricator_matching.status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        
        $totalData = $this->lubricatormatchings->all_count();
        $totalFiltered = $totalData; 
        // if(empty($this->post('lubricator_brandName')) && empty($this->post('status'))){            
            $posts = $this->lubricatormatchings->allLubricatorMatching($limit,$start,$order,$dir);
        // }else{
        //     $search = $this->post('lubricator_brandName');
        //     $status = $this->post('status');
        //     $posts =  $this->lubricatorbrands->lubricatorbrand_search($limit,$start,$search,$order,$dir,$status);
        //     $totalFiltered = $this->lubricatorbrands->lubricatorbrand_search_count($search,$status);
        // }
        // $data = array();
        // if(!empty($posts))
        // {
        //     foreach ($posts as $post)
        //     {
        //         $nestedData['lubricator_brandId'] = $post->lubricator_brandId;
        //         $nestedData['lubricator_brandName'] = $post->lubricator_brandName;
        //         $nestedData['lubricator_brandPicture'] = $post->lubricator_brandPicture;
        //         $nestedData['status'] = $post->status;
        //         $data[] = $nestedData;
        //     }
        // }
        $json_data = array(
            "draw"            => intval($this->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $posts   
        );
        $this->set_response($json_data);
    }
    
    function create_post(){
        $brand_id = $this->post("brand_id");
        $model_name = $this->post("model_name");
        $lubricator_gear = $this->post("lubricator_gear");
        $machine_id = $this->post("machine_id");
        $lubricator_brand_id = $this->post("lubricator_brand_id");
        $lubricator_id = $this->post("lubricator");

        $data['model'] = [
            "brand_id" => $brand_id,
            "model_name" => $model_name,
            "lubricator_gear" => $lubricator_gear,
            "machine_id" => $machine_id
        ];
        $data['lubricator_id'] = $lubricator_id;

        $option = [
            "data_check" => null,
            "data" => $data,
            "model" => $this->lubricatormatchings,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }
    
    function delete_get(){
        $lubricator_matching_id = $this->get('lubricator_matching_id');
        $data_check = $this->lubricatormatchings->getlubricatorMatchingById($lubricator_matching_id);
    
        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricator_matching_id,
            "model" => $this->lubricatormatchings,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $lubricator_matching_id = $this->post("lubricator_matching_id");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data_check_update = $this->lubricatormatchings->getlubricatorMatchingById($lubricator_matching_id);
        $data = array(
            'lubricator_matching_id' => $lubricator_matching_id,
            'status' => $status
        );
        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->lubricatormatchings
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}