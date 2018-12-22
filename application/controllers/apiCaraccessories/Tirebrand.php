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
        $config['upload_path'] = 'public/image/tire_brand/';
        $data_check = $this->triebrands->getTireBrandById($tire_brandId);
        $imagePath = $config['upload_path'].$data_check->tire_brandPicture;
        $option = [
            "data_check_delete" => $data_check,
            "data" => $tire_brandId,
            "model" => $this->triebrands,
            "image_path" => $imagePath
        ];
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }
        
    function createBrand_post(){
        $config['upload_path'] = 'public/image/tire_brand/';
        $userId = $this->session->userdata['logged_in']['id'];

        $img = $this->post('tire_brandPicture');
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);
        $tire_brandName = $this->post("tire_brandName");
        $data_check = $this->triebrands->data_check_create($tire_brandName);
        
		
                $data = array(
                    "tire_brandId"=> null,
                    "tire_brandName"=> $tire_brandName,
                    "tire_brandPicture"=> $imageName,
                    "status"=> 2,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId,
                    "activeFlag" => 2
                
                );
                $option = [
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->triebrands,
                    "image_path" => null
                ];
        
                $this->set_response(user_decision_create($option), REST_Controller::HTTP_OK);
            
    }

    function updateTireBrand_post(){
        $config['upload_path'] = 'public/image/tire_brand/';
        $config['allowed_types'] = 'gif|jpg|png';
        $userId = $this->session->userdata['logged_in']['id'];
        $tire_brandId = $this->post("tire_brandId");
        $img = $this->post("tire_brandPicture");
        $tire_brandName = $this->post("tire_brandName");
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
            $data_check_update = $this->triebrands->getirebrandById($tire_brandId);
            $data_check = $this->triebrands->wherenot($tire_brandId,$tire_brandName);
            $userId = $this->session->userdata['logged_in']['id'];
            $data = array(
                'tire_brandId' =>$tire_brandId,
                "tire_brandName"=> $tire_brandName,
                "tire_brandPicture"=> $imageName,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                "activeFlag" => 1,
                'status' => 1
            );
            $oldImage = null;
            if($data_check_update != null){
                $oldImage = $config['upload_path'].$data_check_update->tire_brandPicture;
            }

            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->triebrands,
                "image_path" => $file,
                "old_image_path" => $oldImage,
            ];
    
            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);

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