<?php
// ขอบยาง นะ 
defined('BASEPATH') OR exit('No direct script access allowed');
class Modelofcar extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    public function create_post(){
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $machineCode = $this->post('$machineCode');
        $bodyCode = $this->post('$machineCode');
        $modelofcarName = $this->post('modelofcarName');
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model("modelofcars");
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
                'status' => 1,
                'activeFlag' => 1
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

    public function update_post(){
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $machineCode = $this->post('$machineCode');
        $bodyCode = $this->post('$machineCode');
        $modelofcarName = $this->post('modelofcarName');
        $userId = $this->session->userdata['logged_in']['id'];
        $modelofcarId = $this->post('modelofcarId');
        $this->load->model("modelofcars");
        $isCheck = $this->modelofcars->checkduplicateforupdate($modelofcarName,$modelId,$brandId,$modelofcarId);
        if($isCheck){
            $data = array(
                'modelofcarId' => $modelofcarId,
                'brandId' => $brandId,
                'modelId' => $modelId,
                'modelofcarName' => $modelofcarName,
                'status' => 1,
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
        $this->load->model("modelofcars");
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

}