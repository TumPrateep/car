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
    function searchLubricatorNumber_post(){
            $columns = array( 
                0 => null,
                1 =>'lubricator_number',
                2 => 'lubricator_typeId,lubricator_gear',
                3 =>'status'
            );
            $limit = $this->post('length');
            $start = $this->post('start');
            $order = $columns[$this->post('order')[0]['column']];
            $dir = $this->post('order')[0]['dir'];
            
            $totalData = $this->lubricatornumbers->allLubricatorNumbers_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('lubricator_number')) && empty($this->post('status')))
            {            
                $posts = $this->lubricatornumbers->allLubricatorNumbers($limit,$start,$order,$dir);
            }
            else {
                $search = $this->post('lubricator_number');
                $status = $this->post('status');
                $posts =  $this->lubricatornumbers->lubricatorNumber_search($limit,$start,$search,$order,$dir,$status);
                $totalFiltered = $this->lubricatornumbers->lubricatorNumber_search_count($search,$status);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $nestedData['lubricator_numberId'] = $post->lubricator_numberId;
                    $nestedData['lubricator_number'] = $post->lubricator_number;
                    $nestedData['lubricator_typeName'] = $post->lubricator_typeName;
                    $nestedData['lubricator_gear'] = $post->lubricator_gear;
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
        
        function changeStatus_post(){
            $lubricator_numberId = $this->post("lubricator_numberId");
            $status = $this->post("status");
            if($status == 1){
                $status = 2;
            }else{
                $status = 1;
            }

            $data_check_update = $this->lubricatornumbers->getLubricatorNumberById($lubricator_numberId);
            $data = array(
                'lubricator_numberId' => $lubricator_numberId,
                'status' => $status,
                'activeFlag' => 1
            );

            $option = [
                "data_check_update" => $data_check_update,
                "data" => $data,
                "model" => $this->lubricatornumbers
            ];

            $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
        }

        function deleteLubricatorNumber_get(){
            $lubricator_numberId = $this->get('lubricator_numberId');

            $data_check = $this->lubricatornumbers->getLubricatorNumberById($lubricator_numberId);
            $option = [
                "data_check_delete" => $data_check,
                "data" => $lubricator_numberId,
                "model" => $this->lubricatornumbers,
                "image_path" => null
            ];
            $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
        }

        function createLubricatorNumber_post(){
            $lubricatorNumber = $this->post("lubricator_number");
            $lubricatorGear = $this->post("lubricator_gear");
            $lubricatorTypeId = $this->post("lubricator_typeId");
            $userId = $this->session->userdata['logged_in']['id'];

            $data_check = $this->lubricatornumbers->data_check_create($lubricatorNumber, $lubricatorGear, null);
            $data = array(
                'lubricator_number' => $lubricatorNumber, 
                'lubricator_typeId' => $lubricatorTypeId,
                'lubricator_gear' => $lubricatorGear, 
                'status' => 1,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'activeFlag' => 1
            );

            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->lubricatornumbers,
                "image_path" => null
            ];

            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
        }

        function getLubricatorNumber_post(){
            $lubricator_numberId = $this->post('lubricator_numberId');

            $data_check = $this->lubricatornumbers->getUpdate($lubricator_numberId);
            $option = [
                "data_check" => $data_check
            ];
            $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
        }
        
        function updateLubricatorNumber_post(){
            $lubricator_numberId = $this->post("lubricator_numberId");
            $lubricatorNumber = $this->post("lubricator_number");
            $lubricatorGear = $this->post("lubricator_gear");
            $lubricatorTypeId = $this->post("lubricator_typeId");
            $userId = $this->session->userdata['logged_in']['id'];

            $data_check_update = $this->lubricatornumbers->getLubricatorNumberById($lubricator_numberId);
            $data_check = $this->lubricatornumbers->data_check_update($lubricatorNumber, $lubricatorGear, $lubricator_numberId);
            $data = array(
                'lubricator_numberId' => $lubricator_numberId,
                'lubricator_number' => $lubricatorNumber, 
                'lubricator_typeId' => $lubricatorTypeId,
                'lubricator_gear' => $lubricatorGear, 
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                'activeFlag' => 1
            );

            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->lubricatornumbers,
                "image_path" => null,
                "old_image_path" => null
            ];

            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);

        }

        function getAllLubricatorNumber_post(){
            $lubricator_gear = $this->post("lubricator_gear");
            $status = 1;
            $lubricator_numberId = $this->post("lubricator_numberId");
            $result = $this->lubricatornumbers->getAllLubricatorNumberByStatus($status, $lubricator_numberId, $lubricator_gear);
            $output["data"] = $result;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
}