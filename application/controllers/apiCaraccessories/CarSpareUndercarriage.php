<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CarSpareUndercarriage extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
    }
    function searchspareUndercarriage_post(){
        $columns = array( 
            0 => null
        );
            
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("sparesUndercarriages");
        $totalData = $this->sparesUndercarriages->allsparesUndercarriages_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('spares_undercarriageName')))
        {            
            $posts = $this->sparesUndercarriages->allsparesUndercarriage($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('spares_undercarriageName'); 
            $status = 2; 

            $posts =  $this->sparesUndercarriages->sparesUndercarriage_search($limit,$start,$search,$order,$dir,$status);

            $totalFiltered = $this->sparesUndercarriages->sparesUndercarriage_search_count($search,$status);
        }

        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData[$count]['spares_undercarriageId'] = $post->spares_undercarriageId;
                $nestedData[$count]['spares_undercarriageName'] = $post->spares_undercarriageName;
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

    function createspareUndercarriage_post(){

        $spares_undercarriageName = $this->post("spares_undercarriageName");
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model("sparesUndercarriages");
        $isCheck = $this->sparesUndercarriages->checksparesUndercarriage($spares_undercarriageName);

        if($isCheck){
            $data = array(
                'spares_undercarriageId' => null,
                'spares_undercarriageName' => $spares_undercarriageName,
                'status' => 2,
                'activeFlag' => 2,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                
            );
            $result = $this->sparesUndercarriages->insertsparesUndercarriage($data);
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

    function deletespareUndercarriage_get(){
        $spares_undercarriageId = $this->get('spares_undercarriageId');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $this->load->model("sparesUndercarriages");
        $spares_undercarriage = $this->sparesUndercarriages->getsparesUndercarriagebyId($spares_undercarriageId);
        if($spares_undercarriage != null){
            $isCheckStatus =$this->sparesUndercarriages->checkStatusFromSpareUnderCarriages($spares_undercarriageId,$status,$userId);
            if($isCheckStatus ){
                $isDelete = $this->sparesUndercarriages->delete($spares_undercarriageId);
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

    function getspareUndercarriage_post(){
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $this->load->model("sparesUndercarriages");
        $spares_undercarriage = $this->sparesUndercarriages->getsparesUndercarriagebyId($spares_undercarriageId);
            if($spares_undercarriage != null){
                $output["data"] = $spares_undercarriage;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
    }

    function updateSpareUnderCarriages_post(){
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $spares_undercarriageName = $this->post('spares_undercarriageName');
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model("sparesUndercarriages");
        $status = 2 ;
        
        
        $result = $this->sparesUndercarriages->wherenotsparesUndercarriage($spares_undercarriageId,$spares_undercarriageName);
        if($result){
            $data = array(
                'spares_undercarriageId' => $spares_undercarriageId,
                'spares_undercarriageName' => $spares_undercarriageName,
                'status' => 2,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                'activeFlag' => 2
        );
            $isCheckStatus =$this->sparesUndercarriages->checkStatusFromSpareUnderCarriages($spares_undercarriageId,$status,$userId);
            if($isCheckStatus ){
                $result = $this->sparesUndercarriages->updatesparesUndercarriage($data);
                $output["status"] = $result;
                    if($result){
                        $output["message"] = REST_Controller::MSG_SUCCESS;
                        $this->set_response($output, REST_Controller::HTTP_OK);
                    }else{
                        $output["status"] = false;
                        $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                        $this->set_response($output, REST_Controller::HTTP_OK);
                    }
            }else{
                $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

    }

}