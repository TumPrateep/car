<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CarAccessory extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("brand");
    }

    function search_post(){
        $column = "brandName";
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
    
        $totalData = $this->brand->allBrand_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('brandName')))
        {            
            $posts = $this->brand->allBrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('brandName'); 
            $status = null; 

            $posts =  $this->brand->brand_search($limit,$start,$search,$order,$dir,$status);

            $totalFiltered = $this->brand->brand_search_count($search,$status);
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['brandId'] = $post->brandId;
                $nestedData[$count]['brandPic'] = $post->brandPicture;
                $nestedData[$count]['brandName'] = $post->brandName;
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

    function create_post(){
        $brandName = $this->post('brandName');
        $config['upload_path'] = 'public/image/brand/';
        $userId = $this->session->userdata['logged_in']['id'];
        $img = $this->post('brandPicture');
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
            $image =  $imageName;
            $data_check = $this->brand->data_check_create($brandName);
            $data = array(
                "brandId"=> null,
                "brandPicture"=> $image,
                "brandName"=> $brandName,
                "status"=> 2,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId,
                "update_at" => null,
                "update_by" => null,
                "activeFlag" => 2
            );
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->brand,
                "image_path" => null
            ];
    
            $this->set_response(user_decision_create($option), REST_Controller::HTTP_OK);
        
		}
    }

    function delete_get(){
        $brandId = $this->get('brandId');
        $data_check = $this->brand->getBrandbyId($brandId);
        
        $option = [
            "data_check_delete" => $data_check,
            "data" => $brandId,
            "model" => $this->brand,
            "image_path" => null
        ];

        $this->set_response(user_decision_delete($option), REST_Controller::HTTP_OK);
   }

   function getBrand_post(){
    $brandId = $this->post('brandId');
    $brand = $this->brand->getBrandById($brandId);
        if($brand != null){
            $output["data"] = $brand;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getBrandforupdate_post(){

        $brandId = $this->post('brandId');
        $isCheck = $this->brand->checkBrandforget($brandId);

        if($isCheck){
            $output["status"] = true;
            $result = $this->brand->getBrandById($brandId);
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

    function updateBrand_post(){
        $config['upload_path'] = 'public/image/brand/';
        $config['allowed_types'] = 'gif|jpg|png';
        $userId = $this->session->userdata['logged_in']['id'];
        $brandId = $this->post("brandId");
        $brandName = $this->post("brandName");
        $img = $this->post("brandPicture");
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
            $data_check_update = $this->brand->getBrandbyId($brandId);
            $data_check = $this->brand->data_check_update($brandId,$brandName);
            $userId = $this->session->userdata['logged_in']['id'];
            $data = array(
                "brandId"=> $brandId,
                "brandPicture"=> $imageName,
                "brandName"=> $brandName,
                "update_at" => date('Y-m-d H:i:s',time()),
                "update_by" => $userId
            );
            $oldImage = null;
            if($data_check_update != null){
                $oldImage = $config['upload_path'].$data_check_update->brandPicture;
            }

            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->brand,
                "image_path" => $file,
                "old_image_path" => $oldImage,
            ];
    
            $this->set_response(user_decision_update($option), REST_Controller::HTTP_OK);

        }       
    }
}