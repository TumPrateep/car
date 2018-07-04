<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lubricator extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }

    function searchLubricator_post(){
        $column = "lubricatorName";
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

        $this->load->model("lubricators");
        $totalData = $this->lubricators->allLubricators_count();

        $totalFiltered = $totalData; 
    
        if(empty($this->post('lubricatorName')))
        {            
            $posts = $this->lubricators->allLubricators($limit,$start,$order,$dir);
        }
        // else {
        //     $search = $this->post('lubricatorName');
        //     $status = 1; 
        //     $posts =  $this->lubricators->Lubricator_search($limit,$start,$search,$order,$dir,$status);
        //     $totalFiltered = $this->lubricators->Lubricator_search_count($search,$status);
        // }

    //     $data = array();
    //     if(!empty($posts))
    //     {
    //         $index = 0;
    //         $count = 0;
    //         foreach ($posts as $post)
    //         {
                
    //             $nestedData[$count]['lubricatorId'] = $post->lubricatorId;
    //             $nestedData[$count]['lubricator_brandId'] = $post->lubricator_brandId;
    //             $nestedData[$count]['lubricatorName'] = $post->lubricatorName;
    //             $nestedData[$count]['lubricator_numberId'] = $post->lubricator_numberId;
    //             $nestedData[$count]['status'] = $post->status;
    //             $nestedData[$count]['activeFlag'] = $post->activeFlag;
    //             $nestedData[$count]['create_by'] = $post->create_by;
                

    //             $data[$index] = $nestedData;
    //             if($count >= 3){
    //                 $count = -1;
    //                 $index++;
    //                 $nestedData = [];
    //             }
                
    //             $count++;

    //         }
    //     }

    //     $json_data = array(
    //         "draw"            => intval($this->post('draw')),  
    //         "recordsTotal"    => intval($totalData),  
    //         "recordsFiltered" => intval($totalFiltered), 
    //         "data"            => $data   
    //     );

    //     $this->set_response($json_data);
    }







}