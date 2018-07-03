<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class LubricatorNumber extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }
    function searchLubricatorNumber_post(){
            $columns = array( 
                0 => null,
                1 =>'lubricator_number',
                2 => 'lubricator_gear',
                3 => 'lubricator_typeId',
                4 =>'status'
            );
            $limit = $this->post('length');
            $start = $this->post('start');
            $order = $columns[$this->post('order')[0]['column']];
            $dir = $this->post('order')[0]['dir'];
            $this->load->model("LubricatorNumbers");
            $totalData = $this->LubricatorNumbers->allLubricatorNumbers_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('lubricator_number')) && empty($this->post('status')))
            {            
                $posts = $this->LubricatorNumbers->allLubricatorNumbers($limit,$start,$order,$dir);
            }
            else {
                $search = $this->post('lubricator_number');
                $status = $this->post('status');
                $posts =  $this->LubricatorNumbers->lubricatorNumber_search($limit,$start,$search,$order,$dir,$status);
                $totalFiltered = $this->LubricatorNumbers->lubricatorNumber_search_count($search,$status);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $nestedData['lubricator_numberId'] = $post->lubricator_numberId;
                    $nestedData['lubricator_number'] = $post->lubricator_number;
                    $nestedData['lubricator_typeName'] = $post->lubricator_typeName;
                    $nestedData['lubricator_gear'] = $post->lubricator_gear;
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
        
        function changeStatus_post(){
            $lubricator_numberId = $this->post("lubricator_numberId");
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
            $this->load->model("LubricatorNumbers");
            $result = $this->LubricatorNumbers->updateStatus($lubricator_numberId,$data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }

        function deleteLubricatorNumber_get(){
            $lubricator_numberId = $this->get('lubricator_numberId');
    
            $this->load->model("LubricatorNumbers");
            $lubricator_number = $this->LubricatorNumbers->getLubricatorNumber($lubricator_numberId);
            if($lubricator_number != null){
                $isDelete = $this->LubricatorNumbers->delete($lubricator_numberId);
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

        function createLubricatorNumber_post(){
            $lubricatorNumber = $this->post("lubricator_number");
            $lubricatorGear = $this->post("lubricator_gear");
            $lubricatorTypeId = $this->post("lubricator_typeId");
            
            $this->load->model("LubricatorNumbers");
            $userId = $this->session->userdata['logged_in']['id'];
            $isCheck = $this->LubricatorNumbers->checkLubricatorNumber($lubricatorNumber, $lubricatorGear, null);
            
            if($isCheck){
                $data = array(
                    'lubricator_number' => $lubricatorNumber, 
                    'lubricator_typeId' => $lubricatorTypeId,
                    'lubricator_gear' => $lubricatorGear, 
                    'status' => 1,
                    'create_at' => date('Y-m-d H:i:s',time()),
                    'create_by' => $userId,
                    'activeFlag' => 1
                );
                $result = $this->LubricatorNumbers->insertLubricatorNumber($data);
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

        function getLubricatorNumber_post(){
            $lubricator_numberId = $this->post('lubricator_numberId');
            $this->load->model("LubricatorNumbers");
            $data = $this->LubricatorNumbers->getlubricatorNumberById($lubricator_numberId);
            if($data != null){
                $output["data"] = $data;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }
        
        function updateLubricatorNumber_post(){
            $lubricatorNumberId = $this->post("lubricator_numberId");
            $lubricatorNumber = $this->post("lubricator_number");
            $lubricatorGear = $this->post("lubricator_gear");
            $lubricatorTypeId = $this->post("lubricator_typeId");
            
            $this->load->model("LubricatorNumbers");
            $userId = $this->session->userdata['logged_in']['id'];
            $isCheck = $this->LubricatorNumbers->checkLubricatorNumber($lubricatorNumber, $lubricatorGear, $lubricatorNumberId);
            
            if($isCheck){
                $data = array(
                    'lubricator_numberId' => $lubricatorNumberId,
                    'lubricator_number' => $lubricatorNumber, 
                    'lubricator_typeId' => $lubricatorTypeId,
                    'lubricator_gear' => $lubricatorGear, 
                    'update_at' => date('Y-m-d H:i:s',time()),
                    'update_by' => $userId,
                    'activeFlag' => 1
                );
                $result = $this->LubricatorNumbers->updateLubricatorNumber($data);
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
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }
}