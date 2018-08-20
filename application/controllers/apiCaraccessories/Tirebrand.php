<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Tirebrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("triebrands");
    }

    function getAllTireBrand_post(){
        $q = $this->post("term");
        $page = $this->post("page");
        
        $listTireBrand = $this->triebrands->getAllTireBrandByName($q, $page);
        $output["items"] = [];
        $nestedData = [];
        if($listTireBrand != null){
            foreach ($listTireBrand as $row) {
                $nestedData[] =  array(
                    "id" => $row->tire_brandId,
                    "text" => $row->tire_brandName
                );
            }
        }
        $output["items"] = $nestedData;
        $output["q"] = $q;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function searchTirebrand_post(){
        $column = "tire_brandName";
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
        
        $totalData = $this->triebrands->allTirebrand_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('tire_brandName')))
        {            
            $posts = $this->triebrands->allTirebrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('tire_brandName');
            $status = 1;
            $posts =  $this->triebrands->tirebrand_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->triebrands->tirebrand_search_count($search,$status);
        }
        $data = array();
        $index = 0;
        $count = 0;
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData[$count]['tire_brandId'] = $post->tire_brandId;
                $nestedData[$count]['tire_brandName'] = $post->tire_brandName;
                $nestedData[$count]['tire_brandPicture'] = $post->tire_brandPicture;
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

    function getTirebrand_post(){
        $tire_brandId = $this->post('tire_brandId');
        
        $Tirebranddata = $this->triebrands->getTirebrandById($tire_brandId);
        if($Tirebranddata != null){
            $output["data"] = $Tirebranddata;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    
    function deleteTireBrand_get(){
        $tire_brandId = $this->get('tire_brandId');
        
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $tire = $this->triebrands->getirebrandById($tire_brandId);
        if($tire != null){
            $isCheckStatus =$this->triebrands->checkStatusFromTireBrand($tire_brandId,$status,$userId);
            if($isCheckStatus ){
                $isDelete = $this->triebrands->delete($tire_brandId);
                if($isDelete){
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
    function createBrand_post(){
        $config['upload_path'] = 'public/image/tire_brand/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        
        $userId = $this->session->userdata['logged_in']['id'];
		if ( ! $this->upload->do_upload("tire_brandPicture"))
		{
            $error = array('error' => $this->upload->display_errors());
            $output["message"] = REST_Controller::MSG_ERROR;
            $output["data"] = $error;
			$this->set_response($output, REST_Controller::HTTP_OK);
		}
		else
		{
            $imageDetailArray = $this->upload->data();
            $image =  $imageDetailArray['file_name'];
            $tire_brandName = $this->post("tire_brandName");
            $isDublicte = $this->triebrands->checktriebrands($tire_brandName);
            if($isDublicte){
                $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $data = array(
                    "tire_brandId"=> null,
                    "tire_brandName"=> $tire_brandName,
                    "tire_brandPicture"=> $image,
                    "status"=> 2,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId,
                    "activeFlag" => 2
                );
                $isResult = $this->triebrands->insert_triebrands($data);
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

    function updateTireBrand_post(){
        $config['upload_path'] = 'public/image/tire_brand/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        
        $userId = $this->session->userdata['logged_in']['id'];
        
        $image =  "";
        if ( ! $this->upload->do_upload("tire_brandPicture")){
            $error = array('error' => $this->upload->display_errors());
            $output["message"] = REST_Controller::MSG_ERROR;
            $output["data"] = $error;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $imageDetailArray = $this->upload->data();
            $image =  $imageDetailArray['file_name'];
        }   

        $tire_brandName = $this->post("tire_brandName");
        $tire_brandId = $this->post("tire_brandId");
        $isDublicte = $this->triebrands->wherenot($tire_brandId,$tire_brandName);
        if($isDublicte){
            $data = array(
                "tire_brandName"=> $tire_brandName,
                "tire_brandPicture"=> $image,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                "activeFlag" => 1
            );
            $oldData = $this->triebrands->getirebrandById($tire_brandId);
            $isResult = $this->triebrands->update($data, $tire_brandId);
            if($isResult){
                unlink($config['upload_path'].$oldData->tire_brandPicture);
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                unlink($config['upload_path'].$image);
                $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            unlink($config['upload_path'].$image);
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    
    function getTireBrandforupdate_post(){
        $tire_brandId = $this->post('tire_brandId');
        
        $isCheck = $this->triebrands->checkTireBrandforget($tire_brandId);
        if($isCheck){
            $output["status"] = true;
            $result = $this->triebrands->getirebrandById($tire_brandId);
            if($result != null){
                $output["data"] = $result;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getAllTireBrand_get(){
        
        $result = $this->triebrands->getAllTriebrands();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
}