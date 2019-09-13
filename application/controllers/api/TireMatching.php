<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Tirematching extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("tirematch");
        $this->load->model("triebrands");
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
        $totalData = $this->tirematch->allTirematching_count();
        $totalFiltered = $totalData; 
        // $search = $this->post('tire_size');
        if(empty($this->post('tire_size')) && empty($this->post('status')))
        {            
            $posts = $this->tirematch->allTirematching($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('tire_size');
            $status = $this->post('status');
            $posts =  $this->tirematch->tirematching_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->tirematch->tirematching_search_count($search,$status);
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
                $nestedData['tire_matchingId'] = $post->tire_matchingId;
                $nestedData['modelofcarName'] = $post->modelofcarName;
                $nestedData['yearStart'] = $post->yearStart;
                $nestedData['yearEnd'] = $post->yearEnd;   
                $nestedData['machineSize'] = $post->machineSize;
                $nestedData['detail'] = $post->detail;
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
        $isCheck = $this->triebrands->checkTireBrandforget($tire_brandId);
        if($isCheck){
            $output["status"] = true;
            $result = $this->triebrands->getirebrandById($tire_brandId);
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
        $tire_matchingId = $this->post("tire_matchingId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data_check_update =$this->tirematch->getTireMatchingbyId($tire_matchingId);
        $data = array(
            'tire_matchingId' => $tire_matchingId,
            'status' => $status,
            'activeFlag' => 1
        );
        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->tirematch
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }     

    public function create_post(){
        $rimId = $this->post('tire_rimId');
        $brandId = $this->post('brandId');
        $modelId    = $this->post('detail');
        $tire_sizeId = $this->post('tire_sizeId');
        $modelofcarId = $this->post('modelofcarId');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->tirematch->data_check_create($rimId,$brandId,$modelId,$tire_sizeId,$modelofcarId);
            $data = array(
                'tire_matchingId' => null,
                'rimId' => $rimId,
                'brandId' => $brandId,
                'modelId' => $modelId,
                'tire_sizeId' => $tire_sizeId,
                'modelofcarId' => $modelofcarId,
                "status" => 1,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId,
                "activeFlag" => 1
            );
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->tirematch,
                "image_path" => null
            ];
    
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function update_post(){
        $tire_matchingId = $this->post('tire_matchingId');
        $rimId = $this->post('tire_rimId');
        $brandId = $this->post('brandId');
        $modelId = $this->post('detail');
        $modelofcarId = $this->post('modelofcarId');
        $tire_sizeId = $this->post('tire_sizeId');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->tirematch->getTireMatchingbyId($tire_matchingId);
        $data_check = $this->tirematch->data_check_update($rimId,$brandId,$modelId,$tire_sizeId,$tire_matchingId);
        
            $data = array(
                'tire_matchingId' => $tire_matchingId,
                'rimId' => $rimId,
                'brandId' => $brandId,
                'modelId' => $modelId,
                'modelofcarId' => $modelofcarId,
                'tire_sizeId' => $tire_sizeId,
                "status" => 1,
                "update_at" => date('Y-m-d H:i:s',time()),
                "update_by" => $userId,
                "activeFlag" => 1
            );
            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->tirematch,
                "image_path" => null,
                "old_image_path" => null
            ];
    
            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }
    
    function getTireMatching_get(){
        $tire_matchingId = $this->get('tire_matchingId');
        $data_check = $this->tirematch->getTireMatchingbyId($tire_matchingId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function delete_get(){
        $tire_matchingId = $this->get('tire_matchingId');
        $data_check = $this->tirematch->checkTireMatching($tire_matchingId);
              
        $option = [
            "data_check_delete" => $data_check,
            "data" => $tire_matchingId,
            "model" => $this->tirematch,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }
    
}