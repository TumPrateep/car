<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CarModel extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
    }
    function searchModel_post(){
        $columns = array( 
            0 =>null
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $brandId = $this->post('brandId');

        $this->load->model("Model");
        $totalData = $this->Model->allModel_count($brandId);

        $totalFiltered = $totalData; 

        if(empty($this->post('search'))&& empty($this->post('year')))
        {            
            $posts = $this->Model->allModel($limit,$start,$order,$dir,$brandId);
        }
        else {
            $search = $this->post('search');
            $year = $this->post('year');
            $status = 1;

            $posts =  $this->Model->model_search($limit,$start,$search, $year, $status ,$order,$dir,$brandId);

            $totalFiltered = $this->Model->model_search_count($search, $year, $status, $brandId);
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

    function createModel_post(){

        $modelName = $this->post("modelName");
        $brandId = $this->post("brandId");
        $yearStart = $this->post("yearStart");
        $yearEnd = $this->post("yearEnd");
        $userId = $this->session->userdata['logged_in']['id'];

        if($yearEnd == 0){
            $yearEnd = null;
        }


        $this->load->model("Model");
        $isCheck = $this->Model->get_model($brandId,$modelName,$yearStart,$yearEnd);

        if($isCheck){
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
            $result = $this->Model->insert_model($data);
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
    function deleteModel_get(){
        $modelId = $this->get('modelId');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $this->load->model("Model");
        $model = $this->Model->getmodel($modelId);
        if($model != null){
            $isCheckStatus =$this->Model->checkStatusFromModelCar($modelId,$status,$userId);
            if($isCheckStatus ){
            $isDelete = $this->Model->delete($modelId);
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

    function getModel_post(){
        $modelId = $this->post('modelId');
        $this->load->model("model");
        $modeldata = $this->model->getmodelById($modelId);
        if($modeldata != null){
            $output["data"] = $modeldata;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    
}