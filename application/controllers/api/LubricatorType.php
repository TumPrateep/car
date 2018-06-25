<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class LubricatorType extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }
    function searchLubricatorType_post(){
            $columns = array( 
                0 => null,
                1 =>'lubricator_typeName',
                2 =>'lubricator_typeSize',
                3 =>'status'
            );
            $limit = $this->post('length');
            $start = $this->post('start');
            $order = $columns[$this->post('order')[0]['column']];
            $dir = $this->post('order')[0]['dir'];
            $this->load->model("LubricatorTypes");
            $totalData = $this->LubricatorTypes->allLubricatorTypes_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('lubricator_typeName')) && empty($this->post('status')))
            {            
                $posts = $this->LubricatorTypes->allLubricatorTypes($limit,$start,$order,$dir);
            }
            else {
                $search = $this->post('lubricator_typeName');
                $status = $this->post('status');
                $posts =  $this->LubricatorTypes->lubricatorTypes_search($limit,$start,$search,$order,$dir,$status);
                $totalFiltered = $this->LubricatorTypes->lubricatorTypes_search_count($search,$status);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $nestedData['lubricator_typeId'] = $post->lubricator_typeId;
                    $nestedData['lubricator_typeSize'] = $post->lubricator_typeSize;
                    $nestedData['lubricator_typeName'] = $post->lubricator_typeName;
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
            $lubricator_typeId = $this->post("lubricator_typeId");
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
            $this->load->model("LubricatorTypes");
            $result = $this->LubricatorTypes->updateStatus($lubricator_typeId,$data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }

    }