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

    function createTireModel_post(){

        $tire_modelName = $this->post("tire_modelName");
        $trie_brandId = $this->post("trie_brandId");
        
        $userId = $this->session->userdata['logged_in']['id'];


        $this->load->model("Triemodels");
        $isCheck = $this->Triemodels->get_Tiremodel($trie_brandId,$tire_modelName);

        if($isCheck){
            $data = array(
                'tire_modelId' => null,
                'tire_modelName' => $tire_modelName,
                'trie_brandId' => $trie_brandId,
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

}