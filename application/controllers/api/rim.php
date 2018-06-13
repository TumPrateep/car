<?php
// ขอบยาง นะ 
defined('BASEPATH') OR exit('No direct script access allowed');
class Rim extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }
    function deleteRim_get(){
        $rimId = $this->get('rimId');
        $this->load->model("rims");
        $rim = $this->rims->getrimbyId($rimId);
        if($rim != null){
            $isDelete = $this->rims->delete($rimId);
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
    function createRim_post(){
        $rimName = $this->post("rimName");
        $this->load->model("rims");
        $isCheck = $this->rims->checkrim($rimName);
        if($isCheck){
            $data = array(
                'rimId' => null,
                'rimName' => $rimName,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                'status' => 1
            );
            $result = $this->rims->insert_rim($data);
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
    function searchrim_post(){
        $columns = array( 
            0 => null,
            1 => 'rimName',
            2 => 'status'  
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $this->load->model("rims");
        $totalData = $this->rims->allrim_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('rimName'))&& empty($this->post('status')))
        {            
            $posts = $this->rims->allrim($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('rimName'); 
            $status = $this->post('status');
            $posts =  $this->rims->rim_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->rims->rim_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['rimId'] = $post->rimId;
                $nestedData['rimName'] = $post->rimName;
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
    function updaterim_post(){
        $rimId = $this->post('rimId');
        $rimName = $this->post('rimName');
        
        $this->load->model("rims");
        $result = $this->rims->wherenotrim($rimId,$rimName);
        if($result){
            $data = array(
                'rimId' => $rimId,
                'rimName' => $rimName,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                'status' => 1
            );
            $result = $this->rims->updaterim($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }
        else{
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    function getRim_post(){
        $rimId = $this->post('rimId');
        $this->load->model("rims");
        $rimdata = $this->rims->getrimById($rimId);
        if($rimdata != null){
            $output["data"] = $rimdata;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    function changeStatus_post(){
        $rimId = $this->post("rimId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'status' => $status
        );
        $this->load->model("rims");
        $result = $this->rims->updateStatus($rimId,$data);
        if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }     
}