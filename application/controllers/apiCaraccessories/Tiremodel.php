<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Tiremodel extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }

    function getAllTireModel_post(){
        $q = $this->post("term");
        $page = $this->post("page");
        $tireBrandId = $this->post("tireBrandId");
        $this->load->model("Triemodels");
        $listTireModel = $this->Triemodels->getAllTireModelByName($q, $page, $tireBrandId);
        $output["items"] = [];
        $nestedData = [];
        if($listTireModel != null){
            foreach ($listTireModel as $row) {
                $nestedData[] =  array(
                    "id" => $row->tire_modelId,
                    "text" => $row->tire_modelName
                );
            }
        }
        $output["items"] = $nestedData;
        $output["q"] = $q;
        $this->set_response($output, REST_Controller::HTTP_OK);
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
                'status' => 2
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
            0 => null
            
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $tire_brandId = $this->post('tire_brandId');

        $this->load->model("Triemodels");
        $totalData = $this->Triemodels->allTireModel_count($tire_brandId);

        $totalFiltered = $totalData; 
        if(empty($this->post('tire_modelName')))
        {            
            $posts = $this->Triemodels->allTireModel($limit,$start,$order,$dir,$tire_brandId);
        }
        else {
            $search = $this->post('tire_modelName');
            $status = 1; 
            $posts =  $this->Triemodels->tireModel_search($limit,$start,$search,$order,$dir,$tire_brandId,$status);
            $totalFiltered = $this->Triemodels->tireModel_search_count($search,$tire_brandId,$status);
        }
        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData[$count]['tire_modelId'] = $post->tire_modelId;
                $nestedData[$count]['tire_modelName'] = $post->tire_modelName;
                $nestedData[$count]['tire_brandId'] = $post->tire_brandId;
                $nestedData[$count]['status'] = $post->status;
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

    function getTireModel_post(){
        $tire_modelId = $this->post('tire_modelId');
        $tire_brandId = $this->post('tire_brandId');
        $this->load->model("triemodels");
        
        $this->set_response($isCheck, REST_Controller::HTTP_OK);
        
        $result = $this->triemodels->geTireModelNameFromTireModelBytireId($tire_modelId,$tire_brandId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    
}