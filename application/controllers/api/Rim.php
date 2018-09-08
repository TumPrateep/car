<?php
// ขอบยาง นะ 
defined('BASEPATH') OR exit('No direct script access allowed');
class Rim extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("rims");
    }
    function deleteRim_get(){
        $rimId = $this->get('rimId');

        $data_check = $this->rims->getRimById($rimId);        
        $option = [
            "data_check_delete" => $data_check,
            "data" => $rimId,
            "model" => $this->rims,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function createRim_post(){
        $rimName = $this->post("rimName");
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->rims->data_check_create($rimName);
        $data = array(
            'rimId' => null,
            'rimName' => $rimName,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId,
            'status' => 1,
            'activeFlag' => 1
        );

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->rims
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }
    function searchrim_post(){
        $columns = array( 
            0 => null,
            1 => 'rimName',
            2 => 'status'  
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->rims->allrim_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('rimName'))&& empty($this->post('status')))
        {            
            $posts = $this->rims->allrim($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('rimName'); 
            $status = $this->post('status');
            $posts =  $this->rims->rim_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->rims->rim_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['rimId'] = $post->rimId;
                $nestedData['rimName'] = $post->rimName;
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

    function updaterim_post(){
        $rimId = $this->post('rimId');
        $rimName = $this->post('rimName');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->rims->getRimById($rimId);
        $data_check = $this->rims->data_check_update($rimId,$rimName);
        $data = array(
            'rimId' => $rimId,
            'rimName' => $rimName,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId,
            'status' => 1,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->rims,
            "image_path" => null,
            "old_image_path" => null
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function getRim_post(){
        $rimId = $this->post('rimId');

        $data_check = $this->rims->getUpdate($rimId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $rimId = $this->post("rimId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->rims->getRimById($rimId);
        $data = array(
            'rimId' => $rimId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->rims
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }     

    function getAllRims_get(){
        $result = $this->rims->getAllRims();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}