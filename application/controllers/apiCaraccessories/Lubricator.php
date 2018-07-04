<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lubricator extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
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

        $this->load->model("lubricators");
        $totalData = $this->lubricators->allLubricators_count();

        $totalFiltered = $totalData; 
    
        if(empty($this->post('lubricatorName')))
        {            
            $posts = $this->lubricators->allLubricators($limit,$start,$order,$dir);
        }
        // else {
        //     $search = $this->post('lubricatorName');
        //     $status = 1; 
        //     $posts =  $this->lubricators->Lubricator_search($limit,$start,$search,$order,$dir,$status);
        //     $totalFiltered = $this->lubricators->Lubricator_search_count($search,$status);
        // }

    //     $data = array();
    //     if(!empty($posts))
    //     {
    //         $index = 0;
    //         $count = 0;
    //         foreach ($posts as $post)
    //         {
                
    //             $nestedData[$count]['lubricatorId'] = $post->lubricatorId;
    //             $nestedData[$count]['lubricator_brandId'] = $post->lubricator_brandId;
    //             $nestedData[$count]['lubricatorName'] = $post->lubricatorName;
    //             $nestedData[$count]['lubricator_numberId'] = $post->lubricator_numberId;
    //             $nestedData[$count]['status'] = $post->status;
    //             $nestedData[$count]['activeFlag'] = $post->activeFlag;
    //             $nestedData[$count]['create_by'] = $post->create_by;
                

    //             $data[$index] = $nestedData;
    //             if($count >= 3){
    //                 $count = -1;
    //                 $index++;
    //                 $nestedData = [];
    //             }
                
    //             $count++;

    //         }
    //     }

    //     $json_data = array(
    //         "draw"            => intval($this->post('draw')),  
    //         "recordsTotal"    => intval($totalData),  
    //         "recordsFiltered" => intval($totalFiltered), 
    //         "data"            => $data   
    //     );

    //     $this->set_response($json_data);
    }

    public function delete_get(){
        $lubricator_numberId = $this->post('lubricator_numberId');
        $lubricatorName = $this->post('lubricatorName'); 
        $lubricatorId = $this->post('lubricatorId'); 
        $lubricator_brandId = $this->post('lubricator_brandId'); 
        $this->load->model("lubricators");
        $status = $this->post('status');
        $userId = $this->session->userdata['logged_in']['id'];
        $isCheck = $this->lubricators->checkBeforeDelete($lubricator_numberId,$lubricator_brandId,$lubricatorName);
        if($isCheck){
            $isCheckStatus = $this->lubricators->checkStatusforUpdate($lubricator_numberId,$userId,$status);
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

}