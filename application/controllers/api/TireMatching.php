<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class TireMatching extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    
    function searchTirematching_post(){
        $columns = array( 
            0 => null,
            1 => 'brandName', 
            2 => 'modelName',
            3 => 'tire_size',
            4 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $this->load->model("TireMatch");
        $totalData = $this->TireMatch->allTirematching_count();
        $totalFiltered = $totalData; 
        $search = $this->post('modelName');
        if(empty($this->post('modelName')) && empty($this->post('status')))
        {            
            $posts = $this->TireMatch->allTirematching($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('modelName');
            $status = $this->post('status');
            $posts =  $this->TireMatch->tirematching_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->TireMatch->tirematching_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['brandName'] = $post->brandName;
                $nestedData['modelName'] = $post->modelName;
                $nestedData['tire_size'] = $post->tire_size;
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
    function getTireBrandforupdate_post(){
        $tire_brandId = $this->post('tire_brandId');
        $this->load->model("Triebrands");
        $isCheck = $this->Triebrands->checkTireBrandforget($tire_brandId);
        if($isCheck){
            $output["status"] = true;
            $result = $this->Triebrands->getirebrandById($tire_brandId);
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
    function changeStatus_post(){
        $tire_brandId = $this->post("tire_brandId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'status' => $status,
            'activeFlag' => 1
        );
        $this->load->model("Triebrands");
        $result = $this->Triebrands->updateStatus($tire_brandId,$data);
        if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    public function create_post(){
        $rimId = $this->post('tire_rimId');
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $tire_sizeId = $this->post('tire_sizeId');
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model('TireMatch');
        $checkDuplicate = $this->TireMatch->checkduplicate($rimId,$brandId,$modelId,$tire_sizeId);
        if($checkDuplicate){
            $data = array(
                'tire_matchingId' => null,
                'rimId' => $rimId,
                'brandId' => $brandId,
                'modelId' => $modelId,
                'tire_sizeId' => $tire_sizeId,
                "status" => 1,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId,
                "activeFlag" => 1
            );
            $result = $this->TireMatch->insert($data);
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

<<<<<<< HEAD
    function update_post(){
        $tire_matchingId = $this->post('tire_matchingId');
        $rimId = $this->post('rimId');
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $tire_sizeId = $this->post('tire_sizeId');
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model('TireMatch');
        $checkDuplicate = $this->TireMatch->checkduplicateSameId($rimId,$brandId,$modelId,$tire_sizeId,$tire_matchingId);
        if($checkDuplicate){
            $data = array(
                'tire_matchingId' => $tire_matchingId,
                'rimId' => $rimId,
                'brandId' => $brandId,
                'modelId' => $modelId,
                'tire_sizeId' => $tire_sizeId,
                "status" => 1,
                "update_at" => date('Y-m-d H:i:s',time()),
                "update_by" => $userId,
                "activeFlag" => 1
            );
            $isUpdate = $this->TireMatch->update($data,$tire_matchingId);
            $output["status"] = $isUpdate;
            if($isUpdate){
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
    
=======
    function getTireMatching_get(){
        $tire_matchingId = $this->get('tire_matchingId');
        $this->load->model("TireMatch");
        $result = $this->TireMatch->getTireMatchingbyId($tire_matchingId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
>>>>>>> dc5bd376631ddad6d3cdd19a821af49aa4d7bd79
}