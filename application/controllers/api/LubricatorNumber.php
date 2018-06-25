<?php
//ยี่ห้อยาง นะ
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
                2 =>'status'
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
                    // $nestedData['lubricator_typeId'] = $post->lubricator_typeId;
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

    }