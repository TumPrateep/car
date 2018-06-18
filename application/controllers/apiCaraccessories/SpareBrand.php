<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SpareBrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
    }
    function createSpareBrand_post(){

        $spares_brandName = $this->post("spares_brandName");
        $spares_undercarriageId = $this->post("spares_undercarriageId");
        
        $this->load->model("Sparesbrand");
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->Sparesbrand->isGetBrand($spares_brandName,$spares_undercarriageId);

        if($isCheck){
            $data = array(
                'spares_brandId' => null,
                'spares_brandName' => $spares_brandName,
                'status' => 2,
                'spares_undercarriageId' => $spares_undercarriageId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'update_at' => null,
                'update_by' => null
            );
            $result = $this->Sparesbrand->insertBrand($data);
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

    function deleteSpareBrand_get(){
        $spares_brandId = $this->get('spares_brandId');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $this->load->model("Sparesbrand");
        $sparBrand = $this->Sparesbrand->getSpareBrandbyId($spares_brandId);
        if($sparBrand != null){
            $isCheckStatus =$this->Sparesbrand->checkStatusFromSpareBrand($spares_brandId,$status,$userId);
            if($isCheckStatus ){
            $isDelete = $this->Sparesbrand->delete($spares_brandId);
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
    }
}