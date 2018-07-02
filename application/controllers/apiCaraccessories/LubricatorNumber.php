<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lubricatornumber extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }

    function searchLubricatornumber_post(){
        // $column = "lubricator_number";
        $columns = array( 
            0 =>'lubricator_number',
            1 => 'lubricator_gear',
            2 => 'lubricator_typeId',
            3 =>'status'
        );
        $sort = "asc";
        if($this->post('column') == 3){
            $column = "status";
        }else if($this->post('column') == 2){
            $sort = "desc";
        }else{
            $sort = "asc";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;

        $this->load->model("LubricatorNumbers");
        $totalData = $this->LubricatorNumbers->allLubricatorNumbers_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('lubricator_number')) && empty($this->post('status')))
        {            
            $posts = $this->LubricatorNumbers->allLubricatorNumbers($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('lubricator_number'); 
            $status = 2; 

            $posts =  $this->LubricatorNumbers->lubricatorNumber_search($limit,$start,$search,$order,$dir,$status);

            $totalFiltered = $this->LubricatorNumbers->lubricatorNumber_search_count($search,$status);
        }

        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData[$count]['lubricator_numberId'] = $post->lubricator_numberId;
                $nestedData[$count]['lubricator_number'] = $post->lubricator_number;
                $nestedData[$count]['lubricator_typeName'] = $post->lubricator_typeName;
                $nestedData[$count]['lubricator_gear'] = $post->lubricator_gear;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['create_by'] = $post->create_by;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;

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



}
