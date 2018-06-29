<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LubricatorType extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    function createLubricatorType_post(){

        $lubricator_typeName = $this->post("lubricator_typeName");
        $lubricator_typeSize = $this->post("lubricator_typeSize");
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model("lubricatorTypes");
        $isCheck = $this->lubricatorTypes->ChecklubricatorTypes($lubricator_typeName);

        if($isCheck){
            $data = array(
                'lubricator_typeId' => null,
                'lubricator_typeName'=>$lubricator_typeName,
                'lubricator_typeSize' => $lubricator_typeSize,
                'status' => 2,
                'activeFlag' => 2,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId
                
                
            );
            $result = $this->lubricatorTypes->insert_lubricatorType($data);
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

    
    function searchLubricatorType_post(){
        $column = "lubricator_typeName";
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

        $this->load->model("LubricatorTypes");
        $totalData = $this->LubricatorTypes->allLubricatorTypes_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('lubricator_typeName')))
        {            
            $posts = $this->LubricatorTypes->allLubricatorTypes($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('lubricator_typeName');
            $status = 1; 
            $posts =  $this->LubricatorTypes->lubricatorTypes_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->LubricatorTypes->lubricatorTypes_search_count($search,$status);
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData['lubricator_typeId'] = $post->lubricator_typeId;
                $nestedData['lubricator_typeSize'] = $post->lubricator_typeSize;
                $nestedData['lubricator_typeName'] = $post->lubricator_typeName;
                $nestedData['status'] = $post->status;

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
}

