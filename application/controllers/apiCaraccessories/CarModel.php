<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CarModel extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("model");
    }
    function searchModel_post(){
        $column = "modelName";
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
        $brandId = $this->post('brandId');
        
        $totalData = $this->model->allModel_count($brandId);

        $totalFiltered = $totalData; 

        if(empty($this->post('search'))&& empty($this->post('year')))
        {            
            $posts = $this->model->allModel($limit,$start,$order,$dir,$brandId);
        }
        else {
            $search = $this->post('search');
            $year = $this->post('year');
            $status = 1;

            $posts =  $this->model->model_search($limit,$start,$search, $year, $status ,$order,$dir,$brandId);

            $totalFiltered = $this->model->model_search_count($search, $year, $status, $brandId);
        }

        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData[$count]['brandId'] = $post->brandId;
                $nestedData[$count]['modelId'] = $post->modelId;
                $nestedData[$count]['modelName'] = $post->modelName;
                $nestedData[$count]['yearStart'] = $post->yearStart;
                $nestedData[$count]['yearEnd'] = $post->yearEnd;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
                $nestedData[$count]['create_by'] = $post->create_by;
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

    function create_post(){

        $modelName = $this->post("modelName");
        $brandId = $this->post("brandId");
        $yearStart = $this->post("yearStart");
        $yearEnd = $this->post("yearEnd");
        $userId = $this->session->userdata['logged_in']['id'];

        if($yearEnd == 0){
            $yearEnd = null;
        }

        $data_check = $this->model->data_check_create($brandId,$modelName,$yearStart,$yearEnd);
        $data = array(
            'modelId' => null,
            'modelName' => $modelName,
            'brandId' => $brandId,
            'yearStart' => $yearStart,
            'yearEnd' => $yearEnd,
            'status' => 2,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId,
            'update_at' => null,
            'update_by' => null,
            'activeFlag' => 2
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->model,
            "image_path" => null
        ];

        $this->set_response(user_decision_create($option), REST_Controller::HTTP_OK);

        
    }
    function deleteModel_get(){
        $modelId = $this->get('modelId');
        $data_check = $this->model->getModelbyId($modelId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $modelId,
            "model" => $this->model,
            "image_path" => null
        ];

        $this->set_response(user_decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getModel_post(){
        $modelId = $this->post('modelId');
        $modeldata = $this->model->getModelById($modelId);
        if($modeldata != null){
            $output["data"] = $modeldata;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function updateCarModel_post(){
        $modelId = $this->post('modelId');
        $modelName = $this->post('modelName');
        $brandId = $this->post('brandId');
        $yearStart = $this->post('yearStart');
        $yearEnd = $this->post('yearEnd');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        
        if($yearEnd == 0){
            $yearEnd = null;
        }

        $data_check_update = $this->model->getModelbyId($modelId);
        $data_check = $this->model->data_check_update($modelId,$modelName,$yearStart, $yearEnd,$brandId);
        $data = array(
            'modelId' => $modelId,
            'modelName' => $modelName,
            'brandId' => $brandId,
            'yearStart' => $yearStart,
            'yearEnd' => $yearEnd,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId,
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->model,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(user_decision_update($option), REST_Controller::HTTP_OK);


    }
    
    
}

