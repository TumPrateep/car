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

    public function create_post(){
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $machineCode = $this->post('machineCode');
        $machineSize = $this->post('machineSize');
        $modelofcarName = $this->post('modelofcarName');
        $userId = $this->session->userdata['logged_in']['id'];
        
        $data_check = $this->modelofcars->data_check_create($machineSize,$modelofcarName,$modelId,$brandId);
        $data = array(
            'modelofcarId' => null,
            'modelofcarName' => $modelofcarName,
            'brandId' => $brandId,
            'modelId' => $modelId,
            'create_by' => $userId,
            'machineCode' => $machineCode,
            'machineSize' => $machineSize,
            'create_at' =>date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1
        );

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->modelofcars,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $machineCode = $this->post('machineCode');
        $bodyCode = $this->post('bodyCode');
        $modelofcarName = $this->post('modelofcarName');
        $userId = $this->session->userdata['logged_in']['id'];
        $modelofcarId = $this->post('modelofcarId');

        $isCheck = $this->modelofcars->checkduplicateforupdate($modelofcarName,$modelId,$brandId,$modelofcarId);
        if($isCheck){
            $data = array(
                'modelofcarId' => $modelofcarId,
                'brandId' => $brandId,
                'modelId' => $modelId,
                'modelofcarName' => $modelofcarName,
                'activeFlag' => 1,
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
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function delete_get(){
        $modelofcarId = $this->get('modelofcarId');
        $isCheck = $this->modelofcars->Check($modelofcarId);
        if($isCheck){
            $result = $this->modelofcars->delete($modelofcarId);
            if($result){
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

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'machineSize',
            2 => 'modelofcarName',
            3 => 'machineCode',
            4 => 'status'  
        );
        $brandId = $this->post("brandId");
        $modelId = $this->post("modelId");
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->modelofcars->all_modelofcar_count($brandId,$modelId);
        $totalFiltered = $totalData; 
        if(empty($this->post('modelofcarName'))&& empty($this->post('status')))
        {            
            $posts = $this->modelofcars->allmodelofcars($limit,$start,$order,$dir,$brandId,$modelId);
        }
        else {
            $search = $this->post('modelofcarName'); 
            $status = $this->post('status');
            $posts =  $this->modelofcars->modelofcar_search($limit,$start,$search,$order,$dir,$status,$brandId,$modelId);
            $totalFiltered = $this->modelofcars->modelofcar_search_count($search,$status,$brandId,$modelId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['modelofcarId'] = $post->modelofcarId;
                $nestedData['modelofcarName'] = $post->modelofcarName;
                $nestedData['brandId'] = $post->brandId;
                $nestedData['modelId'] = $post->modelId;
                $nestedData['machineCode'] = $post->machineCode;
                $nestedData['machineSize'] = $post->machineSize;
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

    function getAllmodelofcar_get(){
        $modelId = $this->get("modelId");
        $result = $this->modelofcars->getmodelofcar($modelId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    function changeStatus_post(){
        $modelofcarId = $this->post("modelofcarId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'modelofcarId' => $modelofcarId,
            'status' => $status,
            'activeFlag' => 1
        );
        $data_check_update = $this->modelofcars->getCarOfModelById($modelofcarId);

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->modelofcars
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

    function getCarOfModel_post(){
        $modelofcarId = $this->post('modelofcarId');
        $isCheck = $this->modelofcars->Check($modelofcarId);
        if($isCheck){
            $output["status"] = true;
            $result = $this->modelofcars->getCarOfModel($modelofcarId);
            if($result != null){
                $output["data"] = $result;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

}