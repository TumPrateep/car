<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricatorcarpacity extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatorcarpacitys");
        $this->load->model("machines");
	}
	
    function search_post(){
        $columns = array( 
            0 =>null, 
            1 =>'capacity',
            2 =>'status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $machineId = $this->post('machineId');

        $totalData = $this->lubricatorcarpacitys->allCarpacity_count($machineId);
        $totalFiltered = $totalData; 

        if(empty($this->post('capacity')) && empty($this->post('status')) )
        {            
            $posts = $this->lubricatorcarpacitys->allCarpacity($limit,$start,$order,$dir,$machineId);
        }
        else {
            $search = $this->post('capacity');
            $status = $this->post('status');
            $posts =  $this->lubricatorcarpacitys->Carpacity_search($limit,$start,$search,$dir,$order,$status,$machineId);
            $totalFiltered = $this->lubricatorcarpacitys->Carpacity_search_count($search,$status,$machineId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['capacity_id'] = $post->capacity_id;
                $nestedData['capacity'] = $post->capacity;
                $nestedData['status'] = $post->status;
                $nestedData['machineId'] = $post->machineId;

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
    
    function createcarpacity_post(){
        $capacity = $this->post('lubricatorcarpacity');
        $machineId = $this->post('machineId');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->lubricatorcarpacitys->data_check_create($machineId,$capacity);
        $data = array(
            'capacity_id' => null,
            'capacity'  => $capacity,
            'machineId'  => $machineId,
            "create_at" => date('Y-m-d H:i:s',time()),
            "create_by" => $userId,
            'status' => 1 
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorcarpacitys,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_post(){

        $capacity_id = $this->post('capacity_id');
        $data_check = $this->lubricatorcarpacitys->getUpdate($capacity_id);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function delete_get(){
        $capacity_id = $this->get('capacity_id');
        $data_check = $this->lubricatorcarpacitys->getLubricatorcapacityById($capacity_id);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $capacity_id,
            "model" => $this->lubricatorcarpacitys,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function updatecapacity_post(){
        $capacity_id = $this->post('capacity_id');
        $capacity = $this->post('lubricatorcarpacity');
        $machineId = $this->post('machineId');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->lubricatorcarpacitys->getLubricatorcapacityById($capacity_id);
        $data_check = $this->lubricatorcarpacitys->data_check_update($machineId,$capacity_id,$capacity);
        $data = array(
            'capacity_id' => $capacity_id,
            'capacity' => $capacity,
            'status' => 1,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorcarpacitys,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function getAllcapacity_post(){
        
        $output['data'] = $this->lubricatorcarpacitys->getAllcapacity();
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}
