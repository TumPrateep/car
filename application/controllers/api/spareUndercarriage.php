<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class spareUndercarriage extends BD_Controller {
    function searchspareUndercarriage_post(){
        $columns = array( 
            0 => null,
            1 => 'spares_undercarriageName' 
            
            
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("sparesUndercarriages");
        $totalData = $this->sparesUndercarriages->allSsparesUndercarriages_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('spares_undercarriageName')))
        {            
            $posts = $this->sparesUndercarriages->allsparesUndercarriage($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('spares_undercarriageName'); 

            $posts =  $this->sparesUndercarriages->sparesUndercarriage_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->sparesUndercarriages->sparesUndercarriage_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['spares_undercarriageId'] = $post->spares_undercarriageId;
                $nestedData['spares_undercarriageName'] = $post->spares_undercarriageName;

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
        
        $this->load->model("sparesUndercarriages");
        $isCheck = $this->sparesUndercarriages->getsparesUndercarriageforTF($spares_undercarriageName);

        if($isCheck){
            $data = array(
                'spares_undercarriageId' => null,
                'spares_undercarriageName' => $spares_undercarriageName
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


    function updatespareUndercarriage_post(){

        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $spares_undercarriageName = $this->post('spares_undercarriageName');
        
        $this->load->model("sparesUndercarriages");

        $result = $this->sparesUndercarriages->wherenotsparesUndercarriage($spares_undercarriageId,$spares_undercarriageName);

        if($result){
            $data = array(
                'spares_undercarriageId' => $spares_undercarriageId,
                'spares_undercarriageName' => $spares_undercarriageName
            );
            $result = $this->spareUndercarriages->updatesparesUndercarriage($data);
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
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }


    function deletespareUndercarriage_get(){
        $spares_undercarriageId = $this->get('spares_undercarriageId');

        $this->load->model("sparesUndercarriages");
        $spares_undercarriage = $this->spareUndercarriages->getSparebyId($spares_undercarriageId);
        if($spares_undercarriage != null){
            $isDelete = $this->spareUndercarriages->delete($spares_undercarriageId);
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

    function getspareUndercarriage_post(){

        $spares_undercarriageName = $this->post('spares_undercarriageId');
        $this->load->model("sparesUndercarriages");
        $isCheck = $this->spareUndercarriages->checkSpare($spares_undercarriageName);

        if($isCheck){
            $output["status"] = true;
            $result = $this->spareUndercarriages->getsparesUndercarriage($spares_undercarriageName);
            if($result != null){
                $output["data"] = $result;
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

    function getspareUndercarriage_post(){

        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $this->load->model("sparesUndercarriages");
        $isCheck = $this->spareUndercarriages->getsparesUndercarriagebyId($spares_undercarriageId);

        if($isCheck){
            $output["status"] = true;
            $result = $this->spareUndercarriages->getsparesUndercarriage($spares_undercarriageId);
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

    }
