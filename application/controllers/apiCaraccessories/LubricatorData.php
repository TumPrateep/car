<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LubricatorData extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }

    function delete_get(){

        $lubricator_dataId = $this->get('lubricator_dataId');

        $this->load->model("lubricatordatas");
        $lubricator = $this->lubricatordatas->getlubricatorbyId($lubricator_dataId);
        if($lubricator                 != null){
            $isDelete = $this->lubricatordatas->delete($lubricator_dataId);
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
    function searchLubricatordata_post(){
        $column = "lubricator_dataId";
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

        $this->load->model('lubricatordatas');
        $totalData = $this->lubricatordatas->allLubricatordata_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricator_typeId')) && empty($this->post('lubricator_brandId')) && empty($this->post('lubricatorId')) && empty($this->post('lubricator_numberId')) && empty($this->post('price')))
        {            
            $posts = $this->lubricatordatas->allLubricatordatas($limit,$start,$order,$dir);
        }
        else {

            $lubricator_typeId = $this->post('lubricator_typeId');
            $lubricator_brandId = $this->post('lubricator_brandId');
            $lubricatorId = $this->post('lubricatorId');
            $lubricator_numberId = $this->post('lubricator_numberId');
            $price = $this->post('price');
            
            $status = null; 
            $posts =  $this->lubricatordatas->LubricatorDatas_search($limit,$start,$order,$dir,$status,$lubricator_typeId, $lubricator_brandId, $lubricatorId, $lubricator_numberId, $price);

            $totalFiltered = $this->lubricatordatas->LubricatorDatas_search_count($lubricator_typeId, $lubricator_brandId, $lubricatorId, $lubricator_numberId, $price);
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['lubricator_dataId'] = $post->lubricator_dataId;
                $nestedData[$count]['lubricator_typeName'] = $post->lubricator_typeName;
                $nestedData[$count]['lubricator_brandName'] = $post->lubricator_brandName;
                $nestedData[$count]['lubricatorName'] = $post->lubricatorName;
                $nestedData[$count]['lubricator_number'] = $post->lubricator_number;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['price'] = $post->price;
                $nestedData[$count]['warranty_year'] = $post->warranty_year;
                $nestedData[$count]['warranty_distance'] = $post->warranty_distance;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
                $nestedData[$count]['create_by'] = $post->create_by;
                $nestedData[$count]['warranty'] = $post->warranty;
                $nestedData[$count]['lubricator_picture'] = $post->lubricator_picture;
                
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


}