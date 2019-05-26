<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lubricatordata extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model("lubricatordatas");
    }

    function delete_get(){

        $lubricator_dataId = $this->get('lubricator_dataId');
        $data_check = $this->lubricatordatas->getlubricatorDatabyId($lubricator_dataId);
        
        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricator_dataId,
            "model" => $this->lubricatordatas,
            "image_path" => null
        ];
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
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

        $userId = $this->session->userdata['logged_in']['id'];
        $totalData = $this->lubricatordatas->allLubricatordata_count($userId);
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricatorId')) && empty($this->post('lubricator_brandId')) && empty($this->post('lubricator_gear')) && empty($this->post('price')))
        {            
            $posts = $this->lubricatordatas->allLubricatordatas($limit,$start,$order,$dir,$userId);
        }else{

            $lubricatorId = $this->post('lubricatorId');
            $lubricator_brandId = $this->post('lubricator_brandId');
            $lubricator_gear = $this->post('lubricator_gear');
            $price = $this->post('price');
            
            $status = null; 
            $posts =  $this->lubricatordatas->LubricatorDatas_search($limit,$start,$order,$dir,$status,$lubricatorId, $lubricator_brandId, $lubricator_gear, $price, $userId);

            $totalFiltered = $this->lubricatordatas->LubricatorDatas_search_count($lubricatorId, $lubricator_brandId, $lubricator_gear, $price, $userId);
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
                $nestedData[$count]['warranty'] = $post->warranty;
                
                $nestedData[$count]['lubricator_gear'] = $post->lubricator_gear;
                $nestedData[$count]['lubricator_typeSize'] = $post->lubricator_typeSize;
                $nestedData[$count]['capacity'] = $post->capacity;
                $nestedData[$count]['lubricator_brandPicture'] = $post->lubricator_brandPicture;
                $nestedData[$count]['lubricator_dataPicture'] = $post->lubricator_dataPicture;
                $option = [
                    'lubricatorId' => $post->lubricatorId
                ];
                $nestedData[$count]['picture'] = getPictureLubricator($option);

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

    public function create_post(){
        $lubricator_brandId = $this->post('lubricator_brandId');
        $price = $this->post('price');
        $warranty_year = $this->post('warranty_year');
        $warranty = $this->post('warranty');
        $warranty_distance = $this->post('warranty_distance');
        $lubricatorId = $this->post('lubricatorId');
        $userId = $this->session->userdata['logged_in']['id'];
        // $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->lubricatordatas->data_check_create($lubricatorId,$lubricator_brandId,$userId);
          
        $data = array(
            'lubricator_dataId' => null,
            'lubricator_brandId' => $lubricator_brandId,
            'lubricatorId' => $lubricatorId,
            'status' => 1,
            'activeFlag' => 1,
            'create_by' => $userId,
            'create_at'=>date('Y-m-d H:i:s',time()),
            'price' => $price,
            'warranty' => $warranty,
            'warranty_year' => $warranty_year,
            'warranty_distance' => $warranty_distance,
            // 'lubricator_dataPicture' => $image,
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatordatas,
            "image_path" => null
        ];
        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
     }
   

    public function update_post(){
        $lubricator_dataId = $this->post('lubricator_dataId');
        $lubricator_brandId = $this->post('lubricator_brandId');
        $lubricatorId = $this->post('lubricatorId');
        $userId = $this->session->userdata['logged_in']['id'];
        $price = $this->post('price');
        $warranty_year = $this->post('warranty_year');
        $warranty = $this->post('warranty');
        $warranty_distance = $this->post('warranty_distance');
        $userId = $this->session->userdata['logged_in']['id'];
    

       
       
        $data_check_update = $this->lubricatordatas->getlubricatorDatabyId($lubricator_dataId);
        $data_check = $this->lubricatordatas->data_check_update($lubricatorId,$lubricator_brandId,$lubricator_dataId);
        
        $data = array(
            'lubricator_dataId' => $lubricator_dataId,
            'lubricator_brandId' => $lubricator_brandId,
            'lubricatorId' => $lubricatorId,
            'status' => 1,
            'activeFlag' => 1,
            'update_by' => $userId,
            'update_at'=>date('Y-m-d H:i:s',time()),
            'price' => $price,
            'warranty' => $warranty,
            'warranty_year' => $warranty_year,
            'warranty_distance' => $warranty_distance,
            // 'lubricator_dataPicture' => $imageName
        );
        
        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatordatas,
            "image_path" => null,
            "old_image_path" => null
        ];
        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        
              
    }
    function getlubricatordata_get(){
        $lubricator_dataId = $this->get('lubricator_dataId');
        $data_check = $this->lubricatordatas->getupdate($lubricator_dataId);
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $lubricator_dataId = $this->post("lubricator_dataId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->lubricatordatas->getlubricatorDatasById($lubricator_dataId);
        $data = array(
            'lubricator_dataId' => $lubricator_dataId,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->lubricatordatas
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}


