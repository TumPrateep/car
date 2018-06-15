<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Triesize extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    
    function getAllTireSize_post(){
        $q = $this->post("term");
        $page = $this->post("page");
        $tireRimId = $this->post("tireRimId");
        $this->load->model("trieSizes");
        $listTireSize = $this->trieSizes->getAllTireSizeByName($q, $page, $tireRimId);
        $output["items"] = [];
        $nestedData = [];
        if($listTireSize != null){
            foreach ($listTireSize as $row) {
                $nestedData[] =  array(
                    "id" => $row->tire_sizeId,
                    "text" => $row->tire_sizeName
                );
            }
        }
        $output["items"] = $nestedData;
        $output["q"] = $q;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    function createtrieSize_post(){
        $tire_size = $this->post("tire_size");
        $rimId = $this->post("rimId");
        $rim = $this->post('rim');
        $tire_series = $this->post('tire_series');
        
        $this->load->model("trieSizes");
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->trieSizes->gettrie_sizeforrim($tire_size,$rimId);
        
        if($isCheck){
            $data = array(
                'tire_sizeId' => null,
                'tire_size' => $tire_size,
                'tire_series' => $tire_series,
                'rim' => $rim,
                'status' => 2,
                'rimId' => $rimId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'update_at' => null,
                'update_by' => null
                
            );
            $result = $this->trieSizes->inserttrie_size($data);
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