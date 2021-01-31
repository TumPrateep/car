<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Partstable extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('partstables');
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'parts_table_name', //ค้นหา
            2 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->partstables->allParts_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('parts_table_name')) && empty($this->post('status')))
        {            
            $posts = $this->partstables->allParts($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('parts_table_name');
            $status = $this->post('status');
            // $posts =  $this->partstables->allParts($limit,$start,$search,$order,$dir,$status);
            // $totalFiltered = $this->partstables->Bank_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['parts_table_id'] = $post->parts_table_id;
                $nestedData['parts_table_name'] = $post->parts_table_name;
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

    public function create_post(){
        $parts_table_name = $this->post('parts_table_name');

        $data_check = $this->partstables->data_check_create($parts_table_name);
        $data = array(
            'parts_table_name' => $parts_table_name,
            'status' => 1 
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->partstables,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_get(){
        $parts_table_id = $this->get('parts_table_id');
        $data_check = $this->partstables->getUpdate($parts_table_id);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $parts_table_id = $this->post('parts_table_id');
        $parts_table_name = $this->post('parts_table_name');

        $data_check_update = $this->partstables->getPartsById($parts_table_id);
        $data_check = $this->partstables->data_check_update($parts_table_name,$parts_table_id);
        $data = array(
            'parts_table_id' => $parts_table_id,
            'parts_table_name'  => $parts_table_name
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->partstables,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function delete_get(){
        $parts_table_id = $this->get('parts_table_id');
        $data_check = $this->partstables->getPartsById($parts_table_id);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $parts_table_id,
            "model" => $this->partstables,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $parts_table_id = $this->post("parts_table_id");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->partstables->getPartsById($parts_table_id);

        $data = array(
            'parts_table_id' => $parts_table_id,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->partstables
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

    function getAllData_get(){
        $data_check = $this->partstables->all();
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

}