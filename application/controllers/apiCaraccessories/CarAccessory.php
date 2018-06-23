<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CarAccessory extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
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

        $this->load->model("Brand");
        $totalData = $this->Brand->allBrand_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('brandName')))
        {            
            $posts = $this->Brand->allBrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('brandName'); 
            $status = 1; 

            $posts =  $this->Brand->brand_search($limit,$start,$search,$order,$dir,$status);

            $totalFiltered = $this->Brand->brand_search_count($search,$status);
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

    function createBrand_post(){
        $config['upload_path'] = 'public/image/brand/';
        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        // $config['overwrite'] = TRUE;
        // $config['encrypt_name'] = TRUE;
        // $config['remove_spaces'] = TRUE;

        // $this->load->library('upload', $config);
        $this->load->model("Brand");
        $userId = $this->session->userdata['logged_in']['id'];

        $img = $this->post('brandPicture');
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);

        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);
        
		if (!$success){
            // $error = array('error' => $this->upload->display_errors());
            $output["message"] = REST_Controller::MSG_ERROR;
            // $output["data"] = $error;
			$this->set_response($output, REST_Controller::HTTP_OK);
		}else{
        //     $imageDetailArray = $this->upload->data();
            $image =  $imageName;
            $brandName = $this->post("brandName");
            $isDublicte = $this->Brand->checkBrand($brandName);
            if($isDublicte){
                unlink($config['upload_path'].$image);
                $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $data = array(
                    "brandId"=> null,
                    "brandPicture"=> $image,
                    "brandName"=> $brandName,
                    "status"=> 2,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId,
                    'update_at' => null,
                    'update_by' => null,
                    "activeFlag" => 2
                );
                $isResult = $this->Brand->insert_brand($data);
                if($isResult){
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    unlink($config['upload_path'].$image);
                    $output["message"] = REST_Controller::MSG_NOT_CREATE;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }
            }
		}
    }

    function deleteBrand_get(){
        $brandId = $this->get('brandId');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $this->load->model("Brand");
        $brand = $this->Brand->getBrandById($brandId);
        if($brand != null){
            $isCheckStatus =$this->Brand->checkStatusFromBrand($brandId,$status,$userId);
            if($isCheckStatus ){
            $isDelete = $this->Brand->delete($brandId);
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

   function getBrand_post(){
    $brandId = $this->post('brandId');
    $this->load->model("Brand");
    $brand = $this->Brand->getBrandById($brandId);
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
        $this->load->model("Brand");
        $isCheck = $this->Brand->checkBrandforget($brandId);

        if($isCheck){
            $output["status"] = true;
            $result = $this->Brand->getBrandById($brandId);
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
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->library('upload', $config);
        $this->load->model("Brand");

        $image =  "";
        if ( ! $this->upload->do_upload("brandPicture")){
            $error = array('error' => $this->upload->display_errors());
            $output["message"] = REST_Controller::MSG_ERROR;
            $output["data"] = $error;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $imageDetailArray = $this->upload->data();
            $image =  $imageDetailArray['file_name'];
        }   
        
        $brandName = $this->post("brandName");
        $brandId = $this->post("brandId");
        $status = 2;
        $isDublicte = $this->Brand->wherenot($brandId,$brandName);
        if($isDublicte){
            $data = array(
                "brandId"=> $brandId,
                "brandPicture"=> $image,
                "brandName"=> $brandName,
                "status"=> 2,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                'activeFlag' => 2 
            );
            $isCheckStatus =$this->Brand->checkStatusFromBrand($brandId,$status,$userId);
            if($isCheckStatus ){
                $oldData = $this->Brand->getBrandById($brandId);
                $isResult = $this->Brand->update($data);
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
        $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
        $this->set_response($output, REST_Controller::HTTP_OK);	
    }
}


}