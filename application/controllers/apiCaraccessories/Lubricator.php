<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lubricator extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model("lubricators");
    }

    function searchLubricator_post(){
        $column = "lubricatorName";
        $sort = "asc";
        if($this->post('column') == 3){
            $column = "status";
        }else if($this->post('column') == 2){
            $sort = "desc";
        }else{
            $sort = "asc";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;
        $lubricator_brandId = $this->post('lubricator_brandId');
        $totalData = $this->lubricators->allLubricators_count($lubricator_brandId);

        $totalFiltered = $totalData; 

        if(empty($this->post('lubricatorName')))
        {            
            $posts = $this->lubricators->allLubricators($limit,$start,$order,$dir,$lubricator_brandId);
        }
        else {
            $search = $this->post('lubricatorName');
            $status = $this->post('status');
            $posts =  $this->lubricators->Lubricator_search($limit,$start,$search,$col,$dir,$status,$lubricator_brandId);
            $totalFiltered = $this->lubricators->Lubricator_search_count($search,$status,$lubricator_brandId);
        }

        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData[$count]['lubricatorId'] = $post->lubricatorId;
                $nestedData[$count]['lubricator_brandId'] = $post->lubricator_brandId;
                $nestedData[$count]['lubricatorName'] = $post->lubricatorName;
                $nestedData[$count]['lubricator_gear'] = $post->lubricator_gear;
                $nestedData[$count]['lubricator_number'] = $post->lubricator_number;
                $nestedData[$count]['capacity'] = $post->capacity;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
                $nestedData[$count]['create_by'] = $post->create_by;
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

    public function delete_get(){
        $lubricatorId = $this->get('lubricatorId'); 
        $status = 2;
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->lubricators->getlubricatorById($lubricatorId);
        if($isCheck){
            $isCheckStatus = $this->lubricators->checkStatusforUpdate($lubricatorId,$userId,$status);
            if($isCheckStatus){
                $isDelete = $this->lubricators->delete($lubricatorId);
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
    // public function update_post(){
    //     $lubricatorId = $this->post('lubricatorId');
    //     $lubricatorName = $this->post("lubricatorName");
    //     $lubricator_brandId = $this->post("lubricator_brandId");
    //     $lubricator_numberId = $this->post("lubricator_number");
    //     $lubricator_gear = $this->post("lubricator_gear");
    //     $status = 2;
    //     $userId = $this->session->userdata['logged_in']['id'];
    //     $isCheck = $this->lubricators->checkbeforeupdate($lubricatorName,$lubricatorId,$lubricator_brandId,$lubricator_gear);
    //     if($isCheck){
    //         $data = array(
    //             'lubricatorId' => $lubricatorId,
    //             'lubricatorName' => $lubricatorName,
    //             'lubricator_numberId' => $lubricator_numberId,
    //             'update_by' => $userId,
    //             'update_at' => date('Y-m-d H:i:s',time()),
    //             'status' => 2,
    //             'activeFlag' => 2
    //         );
    //         $isCheckStatus = $this->lubricators->checkStatusforUpdate($lubricatorId,$userId,$status);
    //         if($isCheckStatus){
    //             $isUpdate = $this->lubricators->update($data);
    //             $output["status"] = $isUpdate;
    //             if($isUpdate){
    //                 $output["message"] = REST_Controller::MSG_SUCCESS;
    //                 $this->set_response($output, REST_Controller::HTTP_OK);
    //             }else{
    //                 $output["status"] = false;
    //                 $output["message"] = REST_Controller::MSG_NOT_UPDATE;
    //                 $this->set_response($output, REST_Controller::HTTP_OK);
    //             }
    //         }else{
    //             $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
    //             $this->set_response($output, REST_Controller::HTTP_OK);
    //         }
    //     }
    //     else{
    //         $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
    //         $this->set_response($output, REST_Controller::HTTP_OK);
    //     }       
    // }
    
    public function update_post(){
        $lubricatorId = $this->post('lubricatorId');
        $lubricatorName = $this->post("lubricatorName");
        $lubricator_brandId = $this->post("lubricator_brandId");
        $lubricator_numberId = $this->post("lubricator_number");
        $lubricator_gear = $this->post("lubricator_gear");
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->lubricators->getlubricatorbyId($lubricatorId);
        $data_check = $this->lubricators->data_check_update($lubricatorName, $lubricator_brandId, $lubricator_gear,$lubricator_numberId,$lubricatorId);
            $data = array(
                'lubricatorId' => $lubricatorId,
                'lubricatorName' => $lubricatorName,
                'lubricator_numberId' => $lubricator_numberId,
                'update_by' => $userId,
                'update_at' => date('Y-m-d H:i:s',time()),
                'status' => 2,
                'activeFlag' => 2
            );
            
            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->lubricators,
                "image_path" => null,
                "old_image_path" => null,
            ];
    
            $this->set_response(user_decision_update($option), REST_Controller::HTTP_OK);
    
            
    }

    function createlubricator_post(){
        $lubricatorName = $this->post("lubricatorName");
        $lubricator_brandId = $this->post("lubricator_brandId");
        $lubricator_numberId = $this->post("lubricator_numberId");
        $lubricator_gear = $this->post("lubricator_gear");
        $api = $this->post('api');
        $capacity = $this->post('capacity');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->lubricators->data_check_create($lubricatorName, $lubricator_brandId, $lubricator_gear,$lubricator_numberId);
        
        
            $data = array(
                'lubricatorId' => null,
                'lubricatorName' => $lubricatorName,  
                'lubricator_brandId' =>$lubricator_brandId,
                'lubricator_numberId' =>$lubricator_numberId,
                'status' => 2,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'activeFlag' => 2,
                'capacity' => $capacity,
                'api' => $api
            );
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->lubricators,
                "image_path" => null
            ];
    
            $this->set_response(user_decision_create($option), REST_Controller::HTTP_OK);
    }


    function getAllLubricator_get(){
        $lubricator_brandId = $this->get("lubricator_brandId");
        $lubricator_gear = $this->get("lubricator_gear");
        $result = $this->lubricators->getAllLubricator($lubricator_brandId, $lubricator_gear);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getLubricatorforupdate_post(){

        $lubricatorId = $this->post('lubricatorId');
        $isCheck = $this->lubricators->checkLubricatorforget($lubricatorId);

        if($isCheck){
            $output["status"] = true;
            $result = $this->lubricators->getlubricatorbyId($lubricatorId);
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

    function getLubricator_post(){
        $lubricatorId = $this->post('lubricatorId');
        $isCheck = $this->lubricators->checkLubricatorforget($lubricatorId);
        if($isCheck != null){
            $output["data"] = $isCheck;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    
}