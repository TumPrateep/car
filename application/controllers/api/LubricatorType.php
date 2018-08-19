<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class LubricatorType extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
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
            $this->load->model("lubricatortypes");
            $userId = $this->session->userdata['logged_in']['id'];
            $isCheck = $this->lubricatortypes->checklubricatorType($lubricator_typeName);
            
            if($isCheck){
                $data = array(
                    'lubricator_typeId' => null,
                    'lubricator_typeName' => $lubricator_typeName,
                    'lubricator_typeSize' => $lubricator_typeSize,  
                    'status' => 1,
                    'create_at' => date('Y-m-d H:i:s',time()),
                    'create_by' => $userId,
                    'activeFlag' => 1,
                    'lubricator_typePicture' => $imageName
                );
                $result = $this->lubricatortypes->insert_lubricatorType($data);
                $output["status"] = $result;
                if($result){
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    unlink($file);
                    $output["message"] = REST_Controller::MSG_NOT_CREATE;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }
            }else{
                unlink($file);
                $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
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
            $this->load->model("lubricatortypes");
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
            $data = array(
                'status' => $status,
                'activeFlag' => 1
            );
            $this->load->model("lubricatorTypes");
            $result = $this->lubricatortypes->updateStatus($lubricator_typeId,$data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }    

        function updateLubricatorType_post(){

            $config['upload_path'] = 'public/image/lubricator_type/';
            $img = $this->post('lubricatorType_picture');

            $success = true;
            $imageName = "";
            $file = "";
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
                $this->load->model("lubricatorTypes");
                $userId = $this->session->userdata['logged_in']['id'];
                $result = $this->lubricatortypes->wherenotlubricatorType($lubricator_typeId,$lubricator_typeName);
                if($result){
                    $data = array(
                        'lubricator_typeId' => $lubricator_typeId,
                        'lubricator_typeName' => $lubricator_typeName,
                        'lubricator_typeSize' => $lubricator_typeSize,
                        'update_at' => date('Y-m-d H:i:s',time()),
                        'update_by' => $userId
                    );
                    if(!empty($img)){
                        $data["lubricator_typePicture"] = $imageName;
                    }
                    $oldData = $this->lubricatortypes->getlubricatorTypeById($lubricator_typeId);
                    $result = $this->lubricatortypes->update($data);
                    $output["status"] = $result;
                    if($result){
                        unlink($config['upload_path']. '/'. $oldData->lubricator_typePicture);
                        $output["message"] = REST_Controller::MSG_SUCCESS;
                        $this->set_response($output, REST_Controller::HTTP_OK);
                    }else{
                        unlink($file);
                        $output["status"] = false;
                        $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                        $this->set_response($output, REST_Controller::HTTP_OK);
                    }
                }else{
                    unlink($file);
                    $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }
            }
        }

        function getLubricatorType_post(){
            $lubricator_typeId = $this->post('lubricator_typeId');
            $this->load->model("lubricatorTypes");
           
            $this->set_response($isCheck, REST_Controller::HTTP_OK);
            $result = $this->lubricatortypes->getlubricatorTypeById($lubricator_typeId);
            if($result != null){
                $output["data"] = $result;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
           
        }

        function deleteLubricatorType_get(){
            $lubricator_typeId = $this->get('lubricator_typeId');
    
            $this->load->model("lubricatorTypes");
            $lubricator_type = $this->lubricatortypes->getLubricatorTypes($lubricator_typeId);
            if($lubricator_type != null){
                $isDelete = $this->lubricatortypes->delete($lubricator_typeId);
                if($isDelete){
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    $output["message"] = REST_Controller::MSG_BE_USED;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }
            }else{
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }

        function getAllLubricatorType_post(){
            $this->load->model("lubricatorTypes");
            $result = $this->lubricatortypes->getAllLubricatorTypes();
            $output["data"] = $result;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    
}
