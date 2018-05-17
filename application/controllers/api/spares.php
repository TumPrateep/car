<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class spares extends BD_Controller {
    function searchspares_post(){
        $columns = array( 
            0 => null,
            1 => 'sparesName', 
            
            
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("spares");
        $totalData = $this->spares->allSpares_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('sparesName')))
        {            
            $posts = $this->spares->allSpares($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('sparesName'); 

            $posts =  $this->spares->spare_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->spares->spare_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['sparesbrandId'] = $post->sparesbrandId;
                $nestedData['sparesbrandName'] = $post->sparesbrandName;

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


    function createSpares_post(){

        $sparesbrandName = $this->post("sparesName");
        
        $this->load->model("spares");
        $isCheck = $this->spares->getBrandforTF($sparesName);

        if($isCheck){
            $data = array(
                'sparesId' => null,
                'sparesName' => $sparesName
            );
            $result = $this->Spare->insertSpares($data);
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


    function updateSpare_post(){

        $sparesId = $this->post('sparesId');
        $spareName = $this->post('sparesName');
        
        $this->load->model("spares");

        $result = $this->spares->wherenotspares($sparesId,$sparesName);

        if($result){
            $data = array(
                'sparesId' => $sparesId,
                'sparesName' => $sparesName
            );
            $result = $this->Spare->updateSpares($data);
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


    function deleteSpareBrand_get(){
        $sparesbrandId = $this->get('sparesId');

        $this->load->model("spares");
        $sparBrand = $this->spares->getSparebyId($sparesId);
        if($sparBrand != null){
            $isDelete = $this->Spare->delete($sparesId);
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

    function getSpares_post(){

        $sparesName = $this->post('sparesName');
        $this->load->model("spares");
        $isCheck = $this->spares->checkSpare($sparesName);

        if($isCheck){
            $output["status"] = true;
            $result = $this->spares->getSpares($sparesName);
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

    function getSpare_post(){

        $sparesId = $this->post('sparesId');
        $this->load->model("spares");
        $isCheck = $this->spares->getSparebyId($sparesId);

        if($isCheck){
            $output["status"] = true;
            $result = $this->Spare->getSpare($sparesId);
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
