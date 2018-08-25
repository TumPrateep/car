<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Triemodel extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("triemodels");
    }
    function deletetriemodel_get(){
        $tire_modelId = $this->get('tire_modelId');
        $tire = $this->triemodels->getireById($tire_modelId);
        if($tire != null){
            $isDelete = $this->triemodels->delete($tire_modelId);
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
        $userId = $this->session->userdata['logged_in']['id'];
        $result = $this->triemodels->wherenotTireModelid($tire_modelId,$tire_modelName);
        if($result){
            $data = array(
                'tire_modelName' => $tire_modelName,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId
            );
            $result = $this->triemodels->updateTireModel($data, $tire_modelId);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
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
        $tire_brandId = $this->post('tire_brandId');
        $result = $this->triemodels->geTireModelNameFromTireModelBytireId($tire_modelId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    function createTireModel_post(){
        $tire_modelName = $this->post("tire_modelName");
        $tire_brandId = $this->post("tire_brandId");
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->triemodels->get_tiremodel($tire_brandId,$tire_modelName);
        if($isCheck){
            $data = array(
                'tire_modelId' => null,
                'tire_modelName' => $tire_modelName,
                'tire_brandId' => $tire_brandId,
                'create_by' => $userId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'status' => 1,
                'activeFlag' => 1
            );
            $result = $this->triemodels->insert_Tiremodel($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
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
            0 => null, 
            1 => 'tire_modelName',
            2 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $tire_brandId = $this->post('tire_brandId');
        $totalData = $this->triemodels->allTireModel_count($tire_brandId);
        $totalFiltered = $totalData; 
        if(empty($this->post('tire_modelName'))  && empty($this->post('status')) )
        {            
            $posts = $this->triemodels->allTireModel($limit,$start,$order,$dir,$tire_brandId);
        }else{
            $search = $this->post('tire_modelName');
            $status = $this->post('status'); 
            $posts =  $this->triemodels->tireModel_search($limit,$start,$search,$order,$dir,$tire_brandId,$status);
            $totalFiltered = $this->triemodels->tireModel_search_count($search,$tire_brandId,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['tire_modelId'] = $post->tire_modelId;
                $nestedData['tire_modelName'] = $post->tire_modelName;
                $nestedData['tire_brandId'] = $post->tire_brandId;
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
    function changeStatus_post(){
        $tire_modelId = $this->post("tire_modelId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'status' => $status,
            'activeFlag' => 1
        );
        $result = $this->triemodels->updateStatus($tire_modelId,$data);
        if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
}