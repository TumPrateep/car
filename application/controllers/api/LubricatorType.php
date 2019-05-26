<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatortype extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatortypes");
    }

    function createtrieSize_post(){
        $lubricator_typeName = $this->post("lubricator_typeName");
        $lubricator_typeSize = $this->post("lubricator_typeSize");

        $config['upload_path'] = 'public/image/lubricator_type/';

        $img = $this->post('lubricatorType_picture');
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);

        if (!$success){
            unlink($file);
            $output["message"] = REST_Controller::MSG_ERROR;
			$this->set_response($output, REST_Controller::HTTP_OK);
		}else{
            $userId = $this->session->userdata['logged_in']['id'];
            $data_check = $this->lubricatortypes->data_check_create($lubricator_typeName);
            $data = array(
                'lubricator_typeName' => $lubricator_typeName,
                'lubricator_typeSize' => $lubricator_typeSize,  
                'status' => 1,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'activeFlag' => 1,
                'lubricator_typePicture' => $imageName
            );

            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->lubricatortypes,
                "image_path" => $file
            ];

            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
        }
        
    }
   
    function searchLubricatorType_post(){
            $columns = array( 
                0 => null,
                1 =>'lubricator_typeName',
                2 =>'lubricator_typeSize',
                3 =>'status'
            );
            $limit = $this->post('length');
            $start = $this->post('start');
            $order = $columns[$this->post('order')[0]['column']];
            $dir = $this->post('order')[0]['dir'];
            $totalData = $this->lubricatortypes->allLubricatorTypes_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('lubricator_typeName')) && empty($this->post('status')))
            {            
                $posts = $this->lubricatortypes->allLubricatorTypes($limit,$start,$order,$dir);
            }
            else {
                $search = $this->post('lubricator_typeName');
                $status = $this->post('status');
                $posts =  $this->lubricatortypes->lubricatorTypes_search($limit,$start,$search,$order,$dir,$status);
                $totalFiltered = $this->lubricatortypes->lubricatorTypes_search_count($search,$status);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $nestedData['lubricator_typeId'] = $post->lubricator_typeId;
                    $nestedData['lubricator_typeSize'] = $post->lubricator_typeSize;
                    $nestedData['lubricator_typeName'] = $post->lubricator_typeName;
                    $nestedData['lubricator_typePicture'] = $post->lubricator_typePicture;
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
            $lubricator_typeId = $this->post("lubricator_typeId");
            $status = $this->post("status");
            if($status == 1){
                $status = 2;
            }else{
                $status = 1;
            }
            
            $data_check_update = $this->lubricatortypes->getLubricatorTypeById($lubricator_typeId);
            $data = array(
                'lubricator_typeId' => $lubricator_typeId,
                'status' => $status,
                'activeFlag' => 1
            );

            $option = [
                "data_check_update" => $data_check_update,
                "data" => $data,
                "model" => $this->lubricatortypes
            ];

            $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);

        }    

        function updateLubricatorType_post(){

            $config['upload_path'] = 'public/image/lubricator_type/';
            $img = $this->post('lubricatorType_picture');

            $success = true;
            $imageName = null;
            $file = null;
            if(!empty($img)){
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);

                $imageName = uniqid().'.png';
                $file = $config['upload_path']. '/'. $imageName;
                $success = file_put_contents($file, $data);
            }
            
            if (!$success){
                unlink($file);
                $output["message"] = REST_Controller::MSG_ERROR;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $lubricator_typeId = $this->post("lubricator_typeId");
                $lubricator_typeName = $this->post("lubricator_typeName");
                $lubricator_typeSize = $this->post("lubricator_typeSize");
                $userId = $this->session->userdata['logged_in']['id'];

                $data_check_update = $this->lubricatortypes->getLubricatorTypeById($lubricator_typeId);
                $data_check = $this->lubricatortypes->data_check_update($lubricator_typeId,$lubricator_typeName);
                $oldImage = null;
                if($data_check_update != null){
                    $oldImage = $config['upload_path'].$data_check_update->lubricator_typePicture;
                }

                $data = array(
                    'lubricator_typeId' => $lubricator_typeId,
                    'lubricator_typeName' => $lubricator_typeName,
                    'lubricator_typeSize' => $lubricator_typeSize,
                    'lubricator_typePicture' => $imageName,
                    'update_at' => date('Y-m-d H:i:s',time()),
                    'update_by' => $userId
                );

                $option = [
                    "data_check_update" => $data_check_update,
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->lubricatortypes,
                    "image_path" => $file,
                    "old_image_path" => $oldImage,
                ];

                $this->set_response(decision_update($option), REST_Controller::HTTP_OK);

            }
        }

        function getLubricatorType_post(){
            $lubricator_typeId = $this->post('lubricator_typeId');

            $data_check = $this->lubricatortypes->getUpdate($lubricator_typeId);
            $option = [
                "data_check" => $data_check
            ];
            $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
        }

        function deleteLubricatorType_get(){
            $lubricator_typeId = $this->get('lubricator_typeId');
            $config['upload_path'] = 'public/image/lubricator_type/';
            $data_check = $this->lubricatortypes->getLubricatorTypeById($lubricator_typeId);
            $imagePath = $config['upload_path'].$data_check->lubricator_typePicture;
            $option = [
                "data_check_delete" => $data_check,
                "data" => $lubricator_typeId,
                "model" => $this->lubricatortypes,
                "image_path" => $imagePath
            ];
            $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
        }

        function getAllLubricatorType_post(){
            $result = $this->lubricatortypes->getAllLubricatorTypes();
            $output["data"] = $result;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    
}
