<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Tirebrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }

    function getAllTireBrand_post(){
        $q = $this->post("term");
        $page = $this->post("page");
        $this->load->model("Triebrands");
        $listTireBrand = $this->Triebrands->getAllTireBrandByName($q, $page);
        $output["items"] = [];
        $nestedData = [];
        if($listTireBrand != null){
            foreach ($listTireBrand as $row) {
                $nestedData[] =  array(
                    "id" => $row->tire_brandId,
                    "text" => $row->tire_brandName
                );
            }
        }
        $output["items"] = $nestedData;
        $output["q"] = $q;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function searchTirebrand_post(){
        $columns = array( 
            0 => null
            
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $this->load->model("triebrands");
        $totalData = $this->triebrands->allTirebrand_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('tire_brandName')))
        {            
            $posts = $this->triebrands->allTirebrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('tire_brandName');
            $status = 1;
            $posts =  $this->triebrands->tirebrand_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->triebrands->tirebrand_search_count($search,$status);
        }
        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData[$count]['tire_brandId'] = $post->tire_brandId;
                $nestedData[$count]['tire_brandName'] = $post->tire_brandName;
                $nestedData[$count]['tire_brandPicture'] = $post->tire_brandPicture;
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

    function getTirebrand_post(){
        $tire_brandId = $this->post('tire_brandId');
        $this->load->model("triebrands");
        $Tirebranddata = $this->triebrands->getTirebrandById($tire_brandId);
        if($Tirebranddata != null){
            $output["data"] = $Tirebranddata;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    
    function deleteTireBrand_get(){
        $tire_brandId = $this->get('tire_brandId');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $this->load->model("Triebrands");
        $tireBrand = $this->Tirebrands->getirebrandById($tire_brandId);
        if($tireBrand != null){
            $isCheckStatus =$this->Tirebrands->checkStatusFromTireBrand($tire_brandId,$status,$userId);
            if($isCheckStatus ){
                $isDelete = $this->Tirebrands->delete($tire_brandId);
                if($isDelete){
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
}