<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Modelofcar extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("modelofcars");
    }
    function create_post(){
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $machineCode = $this->post('$machineCode');
        $bodyCode = $this->post('$machineCode');
        $modelofcarName = $this->post('modelofcarName');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->modelofcars->data_check_create($modelofcarName,$modelId,$brandId);  
        $data = array(
            'modelofcarId' => null,
            'modelofcarName' => $modelofcarName,
            'brandId' => $brandId,
            'modelId' => $modelId,
            'create_by' => $userId,
            'machineCode' => $machineCode,
            'bodyCode' => $bodyCode,
            'create_at' =>date('Y-m-d H:i:s',time())
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->modelofcars,
            "image_path" => null
        ];

        $this->set_response(user_decision_create($option), REST_Controller::HTTP_OK);
    }
    function delete_get(){
        $modelofcarId = $this->get('modelofcarId');
        $data_check = $this->modelofcars->getModelofcarbyId($modelofcarId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $modelofcarId,
            "model" => $this->modelofcars,
            "image_path" => null
        ];

        $this->set_response(user_decision_delete($option), REST_Controller::HTTP_OK);
    }
    function update_post(){
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $machineCode = $this->post('$machineCode');
        $bodyCode = $this->post('$machineCode');
        $modelofcarName = $this->post('modelofcarName');
        $userId = $this->session->userdata['logged_in']['id'];
        $modelofcarId = $this->post('modelofcarId');
        $data_check_update = $this->modelofcars->getModelofcarbyId($modelofcarId);
        $data_check = $this->modelofcars->data_check_update($modelofcarName,$modelId,$brandId,$modelofcarId);
        $data = array(
            'modelofcarId' => $modelofcarId,
            'brandId' => $brandId,
            'modelId' => $modelId,
            'modelofcarName' => $modelofcarName,
            'machineCode' => $machineCode,
            'bodyCode' => $bodyCode,
            'update_by' => $userId,
            'update_at' =>date('Y-m-d H:i:s',time())
        );
        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->modelofcars,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(user_decision_update($option), REST_Controller::HTTP_OK);
    }

    function getallmodelofcar_post(){
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $result = $this->modelofcars->getAllmodelofcar($brandId,$modelId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    function search_post(){
        $column = "modelofcarName";
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

        $modelofcarId = $this->post("modelofcarId");
        $totalData = $this->modelofcars->all_modelofcar_count($modelofcarId);

        $totalFiltered = $totalData; 

        if(empty($this->post('modelofcarName'))  && empty($this->post('status')))
        {            
            $posts = $this->modelofcars->allmodelofcars($limit,$start,$order,$dir, $modelofcarId);
        }
        else {
            $search = $this->post('modelofcarName'); 
            $status = $this->post('status'); 

            $posts =  $this->modelofcars->modelofcar_search($limit,$start,$search,$order,$dir, $modelofcarId, $status);

            $totalFiltered = $this->modelofcars->modelofcar_search_count($search, $modelofcarId, $status);
        }
        $data = array();        
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                $nestedData[$count]['modelofcarId'] = $post->modelofcarId;
                $nestedData[$count]['modelofcarName'] = $post->modelofcarName;
                $nestedData[$count]['brandId'] = $post->brandId;
                $nestedData[$count]['modelId'] = $post->modelId;
                $nestedData[$count]['machineCode'] = $post->machineCode;
                $nestedData[$count]['bodyCode'] = $post->bodyCode;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['create_by'] = $post->create_by;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
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
}

