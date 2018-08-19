<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lubricatorbrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }

    function createLubricatorbrand_post(){
        $config['upload_path'] = 'public/image/lubricator_brand/';
        $config['allowed_types'] = 'gif|jpg|png';
        
        $this->load->model("lubricatorbrands");
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
        // $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $status = 2;

        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->library('upload', $config);
        $this->load->model("lubricatorbrands");

        $image =  "";
        if ( ! $this->upload->do_upload("lubricator_brandPicture")){
            $error = array('error' => $this->upload->display_errors());
            $output["message"] = REST_Controller::MSG_ERROR;
            $output["data"] = $error;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $imageDetailArray = $this->upload->data();
            $image =  $imageDetailArray['file_name'];
        }   
        
        $lubricator_brandName = $this->post("lubricator_brandName");
        $lubricator_brandId = $this->post("lubricator_brandId");
        $isDublicte = $this->lubricatorbrands->checklubricatorbrandforUpdate($lubricator_brandId,$lubricator_brandName);
        if($isDublicte){
            $data = array(
                "lubricator_brandId"=> $lubricator_brandId,
                "lubricator_brandPicture"=> $image,
                "lubricator_brandName"=> $lubricator_brandName,
                "status"=> 2,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                "activeFlag" => 2
            );
            $isCheckStatus = $this->lubricatorbrands->checkStatusFromBrand($lubricator_brandId,$status,$userId);
            if($isCheckStatus){
                $oldData = $this->lubricatorbrands->getlubricatorById($lubricator_brandId);
            $isResult = $this->lubricatorbrands->update($data);
                    if($isResult){
                        unlink($config['upload_path'].$oldData->brandPicture);
                        $output["message"] = REST_Controller::MSG_SUCCESS;
                        $this->set_response($output, REST_Controller::HTTP_OK);
                    }else{
                        unlink($config['upload_path'].$image);
                        $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                        $this->set_response($output, REST_Controller::HTTP_OK);
                    }

            }else{
                unlink($config['upload_path'].$image);
                $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }

        }else{
            unlink($config['upload_path'].$image);
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }       
    }

    
    function deletelubricatorbrand_get(){
        $lubricator_brandId = $this->get('lubricator_brandId');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $this->load->model("lubricatorbrands");
        $oldData =$this->lubricatorbrands->getlubricatorById($lubricator_brandId);
        if($oldData != null){
            $isCheckStatus = $this->lubricatorbrands->checkStatusFromBrand($lubricator_brandId,$status,$userId);
            if($isCheckStatus ){
                $isDelete = $this->lubricatorbrands->delete($lubricator_brandId);
                if($isDelete){
                    $config['upload_path'] = 'public/image/lubricator_brand/';
                    unlink($config['upload_path'].$oldData->lubricator_brandPicture); 
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    $output["message"] = REST_Controller::MSG_BE_USED;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }
            }else{
                $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } 
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

        $this->load->model("lubricatorbrands");
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
        $this->load->model("lubricatorbrands");
        $result = $this->lubricatorbrands->getAllLubricatorBrand();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}





           
           
           