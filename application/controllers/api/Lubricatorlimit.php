<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorlimit extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('lubricatorlimits');
        // $this->load->model('triesizes');
    }

    function searchGarageGruop_post(){
        $columns = array( 
            0 => null,
            1 => 'group_name', 
            2 => null
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->lubricatorlimits->allGarageGruop_count();
        $totalFiltered = $totalData;           
        $posts = $this->lubricatorlimits->allGarageGruop($limit,$start,$order,$dir);
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

    function searchLubricatorLimit_post(){
        $columns = array( 
            0 => null,
            1 => 'price', 
            2 => null
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $groupId = $this->post('groupId');
        $totalData = $this->lubricatorlimits->allLubricatorlimit_count();
        $totalFiltered = $totalData;           
        $posts = $this->lubricatorlimits->allLubricatorlimit($limit,$start,$order,$dir,$groupId);
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['limitId'] = $post->limitId;
                $nestedData['price'] = $post->price;
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
    
    public function createlubricatorchange_post(){
        $lubricator_price = $this->post('lubricator_price');
        $userId = $this->session->userdata['logged_in']['id'];
        $groupId = $this->post('groupId');
        $data_check = $this->lubricatorlimits->data_check_create();
        $data = array(
            'limitId' => null,
            'price'  => $lubricator_price,
            'groupId'  => $groupId,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'update_at' => null
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorlimits,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }
    public function deleteLubricatorChange_get(){
        $groupId = $this->get('groupId');
        $data_check = $this->lubricatorlimits->getLubricatorChangeById($groupId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $groupId,
            "model" => $this->lubricatorlimits,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }
    public function update_post(){
        $limitId = $this->post('limitId');
        $price = $this->post('price');
        $groupId = $this->post('groupId');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->lubricatorlimits->getLubricatorlimitChangeByLimitId($limitId);
        $data_check = $this->lubricatorlimits->data_check_update($limitId, $groupId);
        $data = array(
            'limitId' => $limitId,
            'price' => $price,
            'groupId' => $groupId,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorlimits,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }
    function getLubricatorlimitChange_get(){
        $limitId = $this->get('limitId');
        $data_check = $this->lubricatorlimits->getUpdate($limitId);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
}