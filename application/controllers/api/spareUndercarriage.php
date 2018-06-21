<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SpareUndercarriage extends BD_Controller {
    function searchspareUndercarriage_post(){
        $columns = array( 
            0 => null,
            1 => 'spares_undercarriageName',
            2 => 'status'
            
            
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("sparesUndercarriages");
        $totalData = $this->sparesUndercarriages->allsparesUndercarriages_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('spares_undercarriageName'))&& empty($this->post('status')))
        {            
            $posts = $this->sparesUndercarriages->allsparesUndercarriage($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('spares_undercarriageName'); 
            $status = $this->post('status');

            $posts =  $this->sparesUndercarriages->sparesUndercarriage_search($limit,$start,$search,$order,$dir,$status);

            $totalFiltered = $this->sparesUndercarriages->sparesUndercarriage_search_count($search,$status);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['spares_undercarriageId'] = $post->spares_undercarriageId;
                $nestedData['spares_undercarriageName'] = $post->spares_undercarriageName;
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

    function createspareUndercarriage_post(){

        $spares_undercarriageName = $this->post("spares_undercarriageName");
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model("sparesUndercarriages");
        $isCheck = $this->sparesUndercarriages->checksparesUndercarriage($spares_undercarriageName);

        if($isCheck){
            $data = array(
                'spares_undercarriageId' => null,
                'spares_undercarriageName' => $spares_undercarriageName,
                'status' => 1,
                'activeFlag' => 1,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId
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

        $this->load->model("sparesUndercarriages");
        $spares_undercarriage = $this->sparesUndercarriages->getsparesUndercarriagebyId($spares_undercarriageId);
        if($spares_undercarriage != null){
            $isDelete = $this->sparesUndercarriages->delete($spares_undercarriageId);
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


    function updatesparesUndercarriage_post(){

        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $spares_undercarriageName = $this->post('spares_undercarriageName');
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model("sparesUndercarriages");

        $result = $this->sparesUndercarriages->wherenotsparesUndercarriage($spares_undercarriageId,$spares_undercarriageName);

        if($result){
            $data = array(
                'spares_undercarriageId' => $spares_undercarriageId,
                'spares_undercarriageName' => $spares_undercarriageName,
                'status' => 1,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId
            );
            $result = $this->sparesUndercarriages->updatesparesUndercarriage($data);
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


    function getsparesUndercarriage_post(){

        $spares_undercarriageId = $this->post('spares_undercarriageId');

        $this->load->model("sparesUndercarriages");
        $isCheck = $this->sparesUndercarriages->checksparesUndercarriage($spares_undercarriageId);

        if($isCheck){
            $output["status"] = true;
            $result = $this->sparesUndercarriages->getsparesUndercarriagebyId($spares_undercarriageId);
            if($result != null){
                $output["data"] = $result;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_ERROR;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function changeStatus_post(){
        $spares_undercarriageId = $this->post("spares_undercarriageId");
        $status = $this->post("status");
        $userId = $this->session->userdata['logged_in']['id'];
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'status' => $status,
            'activeFlag' => 1
        );
        $this->load->model("sparesUndercarriages");
        $result = $this->sparesUndercarriages->updateStatus($spares_undercarriageId,$data);
        if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    

    }
