<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatortypeformachine extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatortypeformachines");
    }
    function createlubricatortypeFormachines_post(){
        $lubricatortypeformachine = $this->post('lubricatortypeformachine');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->lubricatortypeformachines->data_check_create($lubricatortypeformachine);
        $data = array(
            'lubricatortypeformachine' => null,
            'lubricatortypeformachine' => $lubricatortypeformachine,
            'status' => 1,
            'activeFlag' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatortypeformachines,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function update_post(){
        $lubricatortypeformachineId = $this->post('lubricatortypeformachineId');
        $lubricatortypeformachine = $this->post('lubricatortypeformachine');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->lubricatortypeformachines->getLubricatortypeFormachinesById($lubricatortypeformachineId);
        $data_check = $this->lubricatortypeformachines->data_check_update($lubricatortypeformachineId,$lubricatortypeformachine);
        $data = array(
            'lubricatortypeformachineId' => $lubricatortypeformachineId,
            'lubricatortypeformachine' => $lubricatortypeformachine,
            'status' => 1,
            'activeFlag' =>1,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatortypeformachines,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $lubricatortypeformachineId = $this->post('lubricatortypeformachineId');
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->lubricatortypeformachines->getLubricatortypeFormachinesById($lubricatortypeformachineId);
        $data = array(
            'lubricatortypeformachineId' => $lubricatortypeformachineId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->lubricatortypeformachines
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }
    
    function deletelubricatortypeFormachine_get(){
        $lubricatortypeformachineId = $this->get('lubricatortypeformachineId');
        $model = $this->lubricatortypeformachines->getlubricatortypeFormachine($lubricatortypeFormachineId);

        $data_check = $this->lubricatortypeformachines->getmlubricatortypeFormachine($lubricatortypeFormachineId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricatortypeFormachineId,
            "model" => $this->lubricatortypeformachines,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getAllLubricatortypeformachine_get(){
        $output['data'] = $this->lubricatortypeformachines->getAllLubricatortypeformachine();
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function searchlubricatortypeFormachine_post(){
        $columns = array( 
            0 =>null, 
            1 =>'lubricatortypeFormachine',
            2 =>'status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $lubricatortypeFormachineId = $this->post('lubricatortypeFormachineId');

        $totalData = $this->lubricatortypeformachines->allLubricatortypeformachines_count();
        $totalFiltered = $totalData; 

        if(empty($this->post('lubricatortypeFormachine')) && empty($this->post('status')) )
        {            
            $posts = $this->lubricatortypeformachines->allLubricatortypeformachines($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('lubricatortypeFormachine');
            $status = $this->post('status');
            $posts =  $this->lubricatortypeformachines->lubricatortypeformachines_search($limit,$start,$search, $status ,$order,$dir);
            $totalFiltered = $this->lubricatortypeformachines->lubricatortypeformachines_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['lubricatortypeFormachineId'] = $post->lubricatortypeFormachineId;
                $nestedData['lubricatortypeFormachine'] = $post->lubricatortypeFormachine;
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
    
    function getUpdate_post(){

        $lubricatortypeFormachineId = $this->post('lubricatortypeFormachineId');

        $data_check = $this->lubricatortypeformachines->getUpdate($lubricatortypeFormachineId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

}