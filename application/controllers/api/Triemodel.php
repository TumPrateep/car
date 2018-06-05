<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Triemodel extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
    }

    function deletetriemodel_get(){
        $tire_modelId = $this->get('tire_modelId');
        $this->load->model("Triemodels");
        $tire = $this->Triemodels->getireById($tire_modelId);
        if($tire != null){
            $isDelete = $this->Triemodels->delete($tire_modelId);
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
    function updateTireModel_post(){

        $tire_modelId = $this->post('tire_modelId');
        $tire_modelName = $this->post('tire_modelName');
        $tire_brandId = $this->post('tire_brandId');
        
        $this->load->model("triemodels");

        $result = $this->triemodels->wherenotTireModelid($tire_modelId,$tire_modelName,$tire_brandId);

        if($result){
            $data = array(
                'tire_modelId' => $tire_modelId,
                'tire_modelName' => $tire_modelName,
                'status' => 1,
                'tire_brandId' => $tire_brandId
            );
            $result = $this->triemodels->updateTireModel($data);
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
    function getireById_post(){

        $tire_modelId = $this->post('tire_modelId');

        $this->load->model("triemodels");
        $isCheck = $this->triemodels->checktireModelId($tire_modelId);

        if($isCheck){
            $output["status"] = true;
            $result = $this->sparesModel->getModelbyId($tire_modelId);
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

    function createTireModel_post(){

        $tire_modelName = $this->post("tire_modelName");
        $tire_brandId = $this->post("tire_brandId");
        
        $userId = $this->session->userdata['logged_in']['id'];


        $this->load->model("Triemodels");
        $isCheck = $this->Triemodels->get_tiremodel($tire_brandId,$tire_modelName);

        if($isCheck){
            $data = array(
                'tire_modelId' => null,
                'tire_modelName' => $tire_modelName,
                'tire_brandId' => $tire_brandId,
                'create_by' => $userId,
                'update_by' => null,
                'create_at' => date('Y-m-d H:i:s',time()),
                'update_at' => null,
                'status' => 1
            );
            $result = $this->Triemodels->insert_Tiremodel($data);
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

     
    function searchTireModel_post(){
        $columns = array( 
            0 =>null, 
            1 =>'tire_modelName',
            2 => 'status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $tire_brandId = $this->post('tire_brandId');

        $this->load->model("Triemodels");
        $totalData = $this->Triemodels->allTireModel_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('tire_modelName')))
        {            
            $posts = $this->Triemodels->allTireModel($limit,$start,$order,$dir,$tire_brandId);
        }
        else {
            $search = $this->post('tire_modelName'); 

            $posts =  $this->Triemodels->tirebrand_search($limit,$start,$search,$order,$dir,$tire_brandId);

            $totalFiltered = $this->Triemodels->tirebrand_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['tire_brandId'] = $post->tire_brandId;
                $nestedData['tire_modelId'] = $post->tire_modelId;
                $nestedData['tire_modelName'] = $post->tire_modelName;
                $nestedData['status'] = $post->status;

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
}