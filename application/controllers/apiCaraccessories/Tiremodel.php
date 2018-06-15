<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Tiremodel extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
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
}