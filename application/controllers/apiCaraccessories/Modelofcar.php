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
        $isCheck = $this->modelofcars->checkduplicate($modelofcarName,$modelId,$brandId);
        if($isCheck){
            $data = array(
                'modelofcarId' => null,
                'modelofcarName' => $modelofcarName,
                'brandId' => $brandId,
                'modelId' => $modelId,
                'create_by' => $userId,
                'machineCode' => $machineCode,
                'bodyCode' => $bodyCode,
                'create_at' =>date('Y-m-d H:i:s',time()),
                'status' => 2,
                'activeFlag' => 2,
            );
            $result = $this->modelofcars->insert($data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    function delete_get(){
        $modelofcarId = $this->get('modelofcarId');
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->modelofcars->Check($modelofcarId);
        if($isCheck){
            $Checkpermistion = $this->modelofcars->Checkpermistion($userId,$modelofcarId);
            if($Checkpermistion){
                $result = $this->modelofcars->delete($modelofcarId);
                if($result){
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
    function update_post(){
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $machineCode = $this->post('$machineCode');
        $bodyCode = $this->post('$machineCode');
        $modelofcarName = $this->post('modelofcarName');
        $userId = $this->session->userdata['logged_in']['id'];
        $modelofcarId = $this->post('modelofcarId');
        $isCheck = $this->modelofcars->checkduplicateforupdate($modelofcarName,$modelId,$brandId,$modelofcarId);
        if($isCheck){
            $Checkpermistion = $this->modelofcars->Checkpermistion($userId,$modelofcarId);
            if($Checkpermistion){
                $data = array(
                    'modelofcarId' => $modelofcarId,
                    'brandId' => $brandId,
                    'modelId' => $modelId,
                    'modelofcarName' => $modelofcarName,
                    'status' => 2,
                    'activeFlag' => 2,
                    'machineCode' => $machineCode,
                    'bodyCode' => $bodyCode,
                    'update_by' => $userId,
                    'update_at' =>date('Y-m-d H:i:s',time())
                );
                $result = $this->modelofcars->update($data,$modelofcarId);
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
                $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getallmodelofcar_post(){
        $modelofcarId = $this->post('modelofcarId');
        $result = $this->modelofcars->getAllmodelofcar($modelofcarId);
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

