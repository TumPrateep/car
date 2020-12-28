<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Partstablelist extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('partstablelists');
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'kilometre', //ค้นหา
            2 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->partstablelists->allParts_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('kilometre')) && empty($this->post('status')))
        {            
            $posts = $this->partstablelists->allParts($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('kilometre');
            $status = $this->post('status');
            // $posts =  $this->partstablelists->allParts($limit,$start,$search,$order,$dir,$status);
            // $totalFiltered = $this->partstablelists->Bank_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['parts_table_list_id'] = $post->parts_table_list_id;
                $nestedData['kilometre'] = $post->kilometre;
                $nestedData['parts_table_id'] = $post->parts_table_id;
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
        $kilometre = $this->post('kilometre');
        $parts_table_id = $this->post('parts_table_id');

        $data_check = $this->partstablelists->data_check_create($kilometre);
        $data = array(
            'kilometre' => $kilometre,
            'parts_table_id' => $parts_table_id,
            'status' => 1 
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->partstablelists,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_get(){
        $parts_table_list_id = $this->get('parts_table_list_id');
        $data_check = $this->partstablelists->getUpdate($parts_table_list_id);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $parts_table_list_id = $this->post('parts_table_list_id');
        $kilometre = $this->post('kilometre');

        $data_check_update = $this->partstablelists->getPartsById($parts_table_list_id);
        $data_check = $this->partstablelists->data_check_update($kilometre,$parts_table_list_id);
        $data = array(
            'parts_table_list_id' => $parts_table_list_id,
            'parts_table_id' => $parts_table_id,
            'kilometre'  => $kilometre
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->partstablelists,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function delete_get(){
        $parts_table_list_id = $this->get('parts_table_list_id');
        $data_check = $this->partstablelists->getPartsById($parts_table_list_id);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $parts_table_list_id,
            "model" => $this->partstablelists,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $parts_table_list_id = $this->post("parts_table_list_id");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->partstablelists->getPartsById($parts_table_list_id);

        $data = array(
            'parts_table_list_id' => $parts_table_list_id,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->partstablelists
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}