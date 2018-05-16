<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SparePartCar extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'sparesbrandName', 
            
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("Spare");
        $totalData = $this->Spare->allSpare_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('sparesbrandName')))
        {            
            $posts = $this->Spare->allSpare($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('sparesbrandName'); 

            $posts =  $this->Spare->spare_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->Spare->spare_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['sparesbrandId'] = $post->sparesbrandId;
                $nestedData['sparesbrandName'] = $post->sparesbrandName;

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