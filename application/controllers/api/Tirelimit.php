<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Tirelimit extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('tirelimits');
        // $this->load->model('triesizes');
    }

    function searchGarageGruop_post(){
        $columns = array( 
            0 => null,
            1 => null, 
            2 => null
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->tirelimits->allGarageGruop_count();
        $totalFiltered = $totalData;           
        $posts = $this->tirelimits->allGarageGruop($limit,$start,$order,$dir);
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['groupId'] = $post->groupId;
                $nestedData['group_name'] = $post->group_name;
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
    
    public function createtirechange_post(){

        $rimId = $this->post('tire_rimId');
        $tire_price = $this->post('tire_price');
        $groupId = $this->post('groupId');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->tirelimits->data_check_create($rimId, $groupId);
        $data = array(
            'limitId' => null,
            'rimId' => $rimId,
            'price' => $tire_price,
            'groupId' => $groupId,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time())
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tirelimits,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function searchTireChange_post(){
        $columns = array( 
            0 => null,
            1 => 'rimName', 
            2 => 'price'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $groupId = $this->post('groupId');
        $totalData = $this->tirelimits->allTirechanges_count($groupId);
        $totalFiltered = $totalData; 
        if(empty($this->post('rimName')))
        {            
            $posts = $this->tirelimits->allTirechanges($limit,$start,$order,$dir,$groupId);
        }
        else {
            $search = $this->post('rimName');
   
            $posts =  $this->tirelimits->tirechanges_search($limit,$start,$search,$order,$dir,$groupId);
            $totalFiltered = $this->tirelimits->tirechanges_search_count($search,$groupId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['limitId'] = $post->limitId;
                $nestedData['price'] = $post->price;
                $nestedData['groupId'] = $post->groupId;
                $nestedData['rimId'] = $post->rimId;
                $nestedData['rimName'] = $post->rimName;
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

    function getTireChange_get(){
        $limitId = $this->get('limitId');
        $data_check = $this->tirelimits->getUpdate($limitId);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function deletetirechange_get(){
        $limitId = $this->get('limitId');
        $data_check = $this->tirelimits->getTireChangeById($limitId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $limitId,
            "model" => $this->tirelimits,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        
        $limitId = $this->post('limitId');
        $rimId = $this->post('tire_rimId');
        $tire_price = $this->post('tire_price');
        $groupId = $this->post('groupId');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->tirelimits->getTireChangeById($limitId);
        $data_check = $this->tirelimits->data_check_update($limitId, $rimId, $groupId);
        $data = array(
            'limitId' => $limitId,
            'rimId' => $rimId,
            'price' => $tire_price,
            'groupId' => $groupId,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tirelimits,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }
}