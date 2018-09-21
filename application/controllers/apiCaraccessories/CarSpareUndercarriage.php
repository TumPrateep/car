<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CarSpareUndercarriage extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("sparesundercarriages");
    }
    function searchspareUndercarriage_post(){
        $column = "spares_undercarriageName";
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
        
        $totalData = $this->sparesundercarriages->allsparesUndercarriages_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('spares_undercarriageName')))
        {            
            $posts = $this->sparesundercarriages->allsparesUndercarriage($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('spares_undercarriageName'); 
            $status = 2; 

            $posts =  $this->sparesundercarriages->sparesUndercarriage_search($limit,$start,$search,$order,$dir,$status);

            $totalFiltered = $this->sparesundercarriages->sparesUndercarriage_search_count($search,$status);
        }

        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData[$count]['spares_undercarriageId'] = $post->spares_undercarriageId;
                $nestedData[$count]['spares_undercarriageName'] = $post->spares_undercarriageName;
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

    function createspareUndercarriage_post(){

        $spares_undercarriageName = $this->post("spares_undercarriageName");
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->sparesundercarriages->data_check_create($spares_undercarriageName);

            $data = array(
                'spares_undercarriageId' => null,
                'spares_undercarriageName' => $spares_undercarriageName,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'activeFlag' =>2,
                'status'=> 2
            );
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->sparesundercarriages,
                "image_path" => null
            ];
    
            $this->set_response(user_decision_create($option), REST_Controller::HTTP_OK);
        }

    function deletespareUndercarriage_get(){
        $spares_undercarriageId = $this->get('spares_undercarriageId');
        $userId = $this->session->userdata['logged_in']['id'];
        
        $data_check = $this->sparesundercarriages->getsparesUndercarriagebyId($spares_undercarriageId);
       
        $option = [
            "data_check_delete" => $data_check,
            "data" => $spares_undercarriageId,
            "model" => $this->sparesundercarriages,
            "image_path" => null
        ];

        $this->set_response(user_decision_delete($option), REST_Controller::HTTP_OK);
    }
        
    

    function getspareUndercarriage_post(){
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $data_check = $this->sparesundercarriages->getsparesUndercarriagebyId($spares_undercarriageId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
    function updateSpareUnderCarriages_post(){
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $spares_undercarriageName = $this->post('spares_undercarriageName');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->sparesundercarriages->getsparesUndercarriagebyId($spares_undercarriageId);
        $data_check = $this->sparesundercarriages->data_check_update($spares_undercarriageId,$spares_undercarriageName);
            $data = array(
                'spares_undercarriageId' => $spares_undercarriageId,
                'spares_undercarriageName' => $spares_undercarriageName,
                'status' => 2,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                'activeFlag' => 2
        );
        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->sparesundercarriages,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(user_decision_update($option), REST_Controller::HTTP_OK);
    }

    function getAllSpareundercarriage_get(){
        $result = $this->sparesundercarriages->getAllSpareundercarriage();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}