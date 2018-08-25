<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Triebrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("triebrands");
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
                    "status"=> 1,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId,
                    "activeFlag" => 1
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
    function deletetriebrand_get(){
        $tire_brandId = $this->get('tire_brandId');
        $tire = $this->triebrands->getirebrandById($tire_brandId);
        if($tire != null){
            $isDelete = $this->triebrands->delete($tire_brandId);
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
    function updateTireBrand_post(){
        $config['upload_path'] = 'public/image/tire_brand/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
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
    function searchTirebrand_post(){
        $columns = array( 
            0 => null,
            1 => null, 
            2 =>'tire_brandName',
            3 =>'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->triebrands->allTirebrand_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('tire_brandName')) && empty($this->post('status')))
        {            
            $posts = $this->triebrands->allTirebrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('tire_brandName');
            $status = $this->post('status');
            $posts =  $this->triebrands->tirebrand_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->triebrands->tirebrand_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['tire_brandId'] = $post->tire_brandId;
                $nestedData['tire_brandName'] = $post->tire_brandName;
                $nestedData['tire_brandPicture'] = $post->tire_brandPicture;
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
    function changeStatus_post(){
        $tire_brandId = $this->post("tire_brandId");
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
        $result = $this->triebrands->updateStatus($tire_brandId,$data);
        if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
}