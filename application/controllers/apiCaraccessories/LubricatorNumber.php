<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lubricatornumber extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatornumbers");
    }
    public function createLubricatorNumber_Post(){
        $lubricator_number = $this->post('lubricator_number');
        $lubricator_typeId = $this->post('lubricator_typeId');
        $lubricator_gear   = $this->post('lubricator_gear');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->lubricatornumbers->data_check_create($lubricator_number, $lubricator_gear);
       
            $data = array(
                'lubricator_numberId' =>null,
                'lubricator_number' => $lubricator_number, 
                'lubricator_typeId' => $lubricator_typeId,
                'lubricator_gear' => $lubricator_gear, 
                'status' => 2,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'activeFlag' => 2
            );
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->lubricatornumbers,
                "image_path" => null
            ];
    
            $this->set_response(user_decision_create($option), REST_Controller::HTTP_OK);
        }

    function searchLubricatornumber_post(){
        $column = "lubricator_number";
        // $columns = array( 
        //     0 =>'lubricator_number',
        //     1 => 'lubricator_gear',
        //     2 => 'lubricator_typeId',
        //     3 =>'status'
        // );
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
        
        $totalData = $this->lubricatornumbers->allLubricatorNumbers_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('lubricator_number')))
        {            
            $posts = $this->lubricatornumbers->allLubricatorNumbers($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('lubricator_number');
            // $status = 2; 
            $status = $this->post('status'); 

            $posts =  $this->lubricatornumbers->lubricatorNumber_search($limit,$start,$search,$order,$dir,$status);

            $totalFiltered = $this->lubricatornumbers->lubricatorNumber_search_count($search,$status);
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
                $nestedData[$count]['lubricator_typeSize'] = $post->lubricator_typeSize;
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

    public function updateLubricatorNumber_post(){
        $lubricator_numberId =$this->post('lubricator_numberId');
        $lubricator_number = $this->post('lubricator_number');
        $lubricator_typeId = $this->post('lubricator_typeId');
        $lubricator_gear   = $this->post('lubricator_gear');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->lubricatornumbers->data_check_update($lubricator_number, $lubricator_gear, $lubricator_numberId);
        $data_check_update = $this->lubricatornumbers->getLubricatorNumberById($lubricator_numberId);
            $data = array(
                'lubricator_numberId' =>$lubricator_numberId,
                'lubricator_number' => $lubricator_number, 
                'lubricator_typeId' => $lubricator_typeId,
                'lubricator_gear' => $lubricator_gear, 
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                'activeFlag' => 2
            );
            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->lubricatornumbers,
                "image_path" => null,
                "old_image_path" => null,
            ];
    
            $this->set_response(user_decision_update($option), REST_Controller::HTTP_OK);
        }
    public function delete_get(){
        $lubricator_numberId = $this->get('lubricator_numberId');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->lubricatornumbers->getLubricatorNumberById($lubricator_numberId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricator_numberId,
            "model" => $this->lubricatornumbers,
            "image_path" => null
        ];

        $this->set_response(user_decision_delete($option), REST_Controller::HTTP_OK);
    }
        

}
