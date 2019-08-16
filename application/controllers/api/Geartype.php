<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Geartype extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('geartypes');
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'gearname', //ค้นหา
            2 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->geartypes->allGeartype_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('gearname')) && empty($this->post('status')))
        {            
            $posts = $this->geartypes->allGeartype($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('gearname');
            $status = $this->post('status');
            $posts =  $this->geartypes->geartype_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->geartypes->geartype_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['id'] = $post->id;
                $nestedData['gearname'] = $post->gearname;
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
    
    function create_post(){

        $gearname = $this->post("gearname");
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->geartypes->data_check_create($gearname);

        $data = array(
            'gearname' => $gearname,
            'status' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId
        );

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->geartypes,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function delete_get(){
        $id = $this->get('id');
        $data_check = $this->geartypes->getGeartypeById($id);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $id,
            "model" => $this->geartypes,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_get(){
        $id = $this->get('id');
        $data_check = $this->geartypes->getGeartypeById($id);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $id = $this->post('id');
        $gearname = $this->post('gearname');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->geartypes->getGeartypeById($id);
        $data_check = $this->geartypes->data_check_update($gearname,$id);
        $data = array(
            'id' => $id,
            'gearname'  => $gearname,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->geartypes,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $id = $this->post("id");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->geartypes->getGeartypeById($id);
        $data = array(
            'id' => $id,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->geartypes
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}