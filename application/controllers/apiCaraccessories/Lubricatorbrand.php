<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lubricatorbrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatorbrands");
    }

    function createLubricatorbrand_post(){
        $config['upload_path'] = 'public/image/lubricator_brand/';
        $config['allowed_types'] = 'gif|jpg|png';
        
        $userId = $this->session->userdata['logged_in']['id'];
        $img = $this->post('lubricator_brandPicture');
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);

        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);

		if (!$success){
            $output["message"] = REST_Controller::MSG_ERROR;
			$this->set_response($output, REST_Controller::HTTP_OK);
		}else{
            $lubricator_brandName = $this->post("lubricator_brandName");
            $isDublicte = $this->lubricatorbrands->checklubricatorbrand($lubricator_brandName);
            if($isDublicte){
                $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $data = array(
                    "lubricator_brandId"=> null,
                    "lubricator_brandPicture"=> $imageName,
                    "lubricator_brandName"=> $lubricator_brandName,
                    "status"=> 2,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId,
                    "activeFlag" => 2
                );
                $isResult = $this->lubricatorbrands->insert_lubricatorbrand($data);
                if($isResult){
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    $output["message"] = REST_Controller::MSG_NOT_CREATE;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }
            }
		}
    }


    function updateLubricatorbrands_post(){
        $config['upload_path'] = 'public/image/lubricator_brand/';
        $config['allowed_types'] = 'gif|jpg|png';
        $userId = $this->session->userdata['logged_in']['id'];
        $lubricator_brandName = $this->post("lubricator_brandName");
        $lubricator_brandId = $this->post("lubricator_brandId");   
            $img = $this->post("lubricator_brandPicture");
            $success = true;
            $file = null;
            $imageName = null; 
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
                $data_check_update = $this->lubricatorbrands->getlubricatorById($lubricator_brandId);
                $data_check = $this->lubricatorbrands->wherenot($lubricator_brandId,$lubricator_brandName);
                $userId = $this->session->userdata['logged_in']['id'];
                $data = array(
                    "lubricator_brandId"=> $lubricator_brandId,
                    "lubricator_brandPicture"=> $imageName,
                    "lubricator_brandName"=> $lubricator_brandName,
                    "status"=> 1,
                    'update_at' => date('Y-m-d H:i:s',time()),
                    'update_by' => $userId,
                    "activeFlag" => 1
                );
                $oldImage = null;
                if($data_check_update != null){
                    $oldImage = $config['upload_path'].$data_check_update->lubricator_brandPicture;
                }
    
                $option = [
                    "data_check_update" => $data_check_update,
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->lubricatorbrands,
                    "image_path" => $file,
                    "old_image_path" => $oldImage,
                ];
        
                $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    
            }            
    }


    
    function deletelubricatorbrand_get(){
        $lubricator_brandId = $this->get('lubricator_brandId');
        $userId = $this->session->userdata['logged_in']['id'];
        $config['upload_path'] = 'public/image/tire_brand/';
        $data_check = $this->lubricatorbrands->getlubricatorById($lubricator_brandId);
        $imagePath = $config['upload_path'].$data_check->lubricator_brandPicture;
        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricator_brandId,
            "model" => $this->lubricatorbrands,
            "image_path" => $imagePath
        ];
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }
    

    function searchLubricatorbrand_post(){
        $column = "lubricator_brandName";
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
        
        $totalData = $this->lubricatorbrands->allLubricatorbrand_count();
        $totalFiltered = $totalData; 

        if(empty($this->post('lubricator_brandName')))
        {            
            $posts = $this->lubricatorbrands->allLubricatorbrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('lubricator_brandName'); 
            $status = 1; 

            $posts =  $this->lubricatorbrands->lubricatorbrand_search($limit,$start,$search,$order,$dir,$status);

            $totalFiltered = $this->lubricatorbrands->lubricatorbrand_search_count($search,$status);
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['lubricator_brandId'] = $post->lubricator_brandId;
                $nestedData[$count]['lubricator_brandPicture'] = $post->lubricator_brandPicture;
                $nestedData[$count]['lubricator_brandName'] = $post->lubricator_brandName;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
                $nestedData[$count]['create_by'] = $post->create_by;
                
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

    function getAllLubricatorBrand_get(){
        $result = $this->lubricatorbrands->getAllLubricatorBrand();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}





           
           
           