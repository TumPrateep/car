<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("brand");
        $this->load->model("model");
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => null, 
            2 =>'brandName',
            3 =>'status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->brand->allBrand_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('brandName'))&& empty($this->post('status')))
        {            
            $posts = $this->brand->allBrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('brandName'); 
            $status = $this->post('status'); 

            $posts =  $this->brand->brand_search($limit,$start,$search,$order,$dir,$status);

            $totalFiltered = $this->brand->brand_search_count($search,$status);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['brandId'] = $post->brandId;
                $nestedData['brandPic'] = $post->brandPicture;
                $nestedData['brandName'] = $post->brandName;
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

    function createModel_post(){

        $modelName = $this->post("modelName");
        $brandId = $this->post("brandId");
        $yearStart = $this->post("yearStart");
        $yearEnd = $this->post("yearEnd");
        $userId = $this->session->userdata['logged_in']['id'];

        if($yearEnd == 0){
            $yearEnd = null;
        }

        $data_check = $this->model->data_check_create($brandId,$modelName,$yearStart,$yearEnd);
        $data = array(
            'modelId' => null,
            'modelName' => $modelName,
            'brandId' => $brandId,
            'yearStart' => $yearStart,
            'yearEnd' => $yearEnd,
            'status' => 1,
            'activeFlag' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->model,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    
    function searchModel_post(){
        $columns = array( 
            0 =>null, 
            1 =>'modelName',
            2 => 'yearStart',
            3 => 'status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $brandId = $this->post('brandId');

        $totalData = $this->model->allModel_count($brandId);

        $totalFiltered = $totalData; 

        if(empty($this->post('search')) && empty($this->post('year')) && empty($this->post('status')) )
        {            
            $posts = $this->model->allModel($limit,$start,$order,$dir,$brandId);
        }
        else {
            $search = $this->post('search');
            $year = $this->post('year');
            $status = $this->post('status');

            $posts =  $this->model->model_search($limit,$start,$search, $year, $status ,$order,$dir,$brandId);

            $totalFiltered = $this->model->model_search_count($search, $year, $status, $brandId);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['brandId'] = $post->brandId;
                $nestedData['modelId'] = $post->modelId;
                $nestedData['modelName'] = $post->modelName;
                $nestedData['yearStart'] = $post->yearStart;
                $nestedData['yearEnd'] = $post->yearEnd;
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


    function getBrand_post(){

        $brandId = $this->post('brandId');

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
    }
    
    function deleteBrand_get(){
        $brandId = $this->get('brandId');
        $data_check = $this->brand->getBrandById($brandId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $brandId,
            "model" => $this->brand,
            "image_path" => null
        ];  
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function deleteModel_get(){
        $modelId = $this->get('modelId');
        $data_check = $this->model->getmodelbyId($modelId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $modelId,
            "model" => $this->model,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function updateModel_post(){

        $modelId = $this->post('modelId');
        $modelName = $this->post('modelName');
        $brandId = $this->post('brandId');
        $yearStart = $this->post('yearStart');
        $yearEnd = $this->post('yearEnd');
        $userId = $this->session->userdata['logged_in']['id'];
        
        if($yearEnd == 0){
            $yearEnd = null;
        }

        $data_check_update = $this->model->getmodelbyId($modelId);
        $data_check = $this->model->data_check_update($modelId,$modelName, $yearStart, $yearEnd, $brandId);
        $data = array(
            'modelId' => $modelId,
            'modelName' => $modelName,
            'brandId' => $brandId,
            'yearStart' => $yearStart,
            'yearEnd' => $yearEnd,
            'status' => 1,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->model,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function getModel_post(){

        $modelId = $this->post('modelId');
        $data_check = $this->model->getmodelbyId($modelId);

        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function createBrand_post(){
        $config['upload_path'] = 'public/image/brand/';
        $brandName = $this->post("brandName");
        $img = $this->post("brandPicture");
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);

        $userId = $this->session->userdata['logged_in']['id'];

        if (!$success){
            $output["message"] = REST_Controller::MSG_ERROR;
			$this->set_response($output, REST_Controller::HTTP_OK);
		}else{
            $data_check = $this->brand->data_check_create($brandName);
            $data = array(
                "brandId"=> null,
                "brandPicture"=> $imageName,
                "brandName"=> $brandName,
                "status"=> 1,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId,
                'update_at' => null,
                'update_by' => null,
                "activeFlag" => 1
            );

            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->brand,
                "image_path" => $file
            ];
    
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

        }
    }

    function updateBrand_post(){
        $config['upload_path'] = 'public/image/brand/';
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
            $data_check_update = $this->brand->getBrandById($brandId);
            $data_check = $this->brand->data_check_update($brandId,$brandName);
            $userId = $this->session->userdata['logged_in']['id'];
            $data = array(
                "brandId"=> $brandId,
                "brandPicture"=> $imageName,
                "brandName"=> $brandName,
                "status"=> 1,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId
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
    
            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);

        }
    	
    }

    function getBrandforupdate_post(){

        $brandId = $this->post('brandId');
        $data_check = $this->brand->getBrandById($brandId);

        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $brandId = $this->post("brandId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->brand->getBrandById($brandId);
        $data = array(
            'brandId' => $brandId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->brand
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

    function changeStatusModel_post(){
        $modelId = $this->post("modelId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data_check_update = $this->model->getmodelbyId($modelId);
        $data = array(
            'modelId' => $modelId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->model
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

    function getAllBrand_get(){
        $result = $this->brand->getAllBrand();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllModel_get(){
        $brandId = $this->get("brandId");
        $result = $this->model->getAllModelByBrandId($brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}