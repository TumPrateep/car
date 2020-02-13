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
    
}