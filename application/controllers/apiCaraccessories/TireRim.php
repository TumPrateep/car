<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TireRim extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
    }
    function searchrim_post(){
        $columns = array( 
            0 => null 
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $this->load->model("rims");
        $totalData = $this->rims->allrim_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('rimName')))
        {            
            $posts = $this->rims->allrim($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('rimName'); 
            $status = 1;
            $posts =  $this->rims->rim_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->rims->rim_search_count($search,$status);
        }
        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData[$count]['rimId'] = $post->rimId;
                $nestedData[$count]['rimName'] = $post->rimName;
                $nestedData[$count]['status'] = $post->status;
                $data[$index] = $nestedData;
                if($count >= 3){
                    $count = -1;
                    $index++;
                    $nestedData = [];
                }
                
                $count++;
                
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

    function getAllTireRim_post(){
        $q = $this->post("term");
        $page = $this->post("page");
        $this->load->model("Tirerims");
        $listTireRim = $this->Tirerims->getAllTireRimByName($q, $page);
        $output["items"] = [];
        $nestedData = [];
        if($listTireRim != null){
            foreach ($listTireRim as $row) {
                $nestedData[] =  array(
                    "id" => $row->rimId,
                    "text" => $row->rimName
                );
            }
        }
        $output["items"] = $nestedData;
        $output["q"] = $q;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}