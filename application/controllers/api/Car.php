<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Car extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
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

        $this->load->model("Brand");
        $totalData = $this->Brand->allBrand_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('brandName')))
        {            
            $posts = $this->Brand->allBrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('brandName'); 

            $posts =  $this->Brand->brand_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->Brand->brand_search_count($search);
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

    function createYear_post(){

        $brandId = $this->post("brandId");
        $modelId = $this->post("modelId");
        $year = $this->post("year");

        $data = array(
            'brandId' => $brandId,
            'modelId' => $modelId,
            'year' => $year,
            'status' => 1
        );

        $this->load->model("Year");
        $isCheck = $this->Year->year_search($data);
        if($isCheck){
            $result = $this->Year->insert_year($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }
        else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }


    function createModel_post(){

        $modelName = $this->post("modelName");
        $brandId = $this->post("brandId");
        $yearStart = $this->post("yearStart");
        $yearEnd = $this->post("yearEnd");

        if($yearEnd == 0){
            $yearEnd = null;
        }


        $this->load->model("Model");
        $isCheck = $this->Model->get_model($brandId,$modelName);

        if($isCheck){
            $data = array(
                'modelId' => null,
                'modelName' => $modelName,
                'brandId' => $brandId,
                'yearStart' => $yearStart,
                'yearEnd' => $yearEnd,
                'status' => 1
            );
            $result = $this->Model->insert_model($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }

        }
        else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }


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

        $this->load->model("Model");
        $totalData = $this->Model->allModel_count($brandId);

        $totalFiltered = $totalData; 

        if(empty($this->post('search')) && empty($this->post('brandId')) && empty($this->post('year')) && empty($this->post('status')) )
        {            
            $posts = $this->Model->allModel($limit,$start,$order,$dir,$brandId);
        }
        else {
            $search = $this->post('search');
            $year = $this->post('year');
            $status = $this->post('status');

            $posts =  $this->Model->model_search($limit,$start,$search, $year, $status ,$order,$dir,$brandId);

            $totalFiltered = $this->Model->model_search_count($search, $year, $status, $brandId);
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
        $this->load->model("Brand");

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
    }

    function searchYear_post(){
        $columns = array( 
            0 =>null, 
            1 =>year
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
    
        $this->load->model("Year");
        $totalData = $this->Year->allYear_count($brandId,$modelId);

        $totalFiltered = $totalData; 

        if(empty($this->post('year')) || empty($this->post('brandId')) || empty($this->post('modelId')))
        {            
            $posts = $this->Year->allYear($limit,$start,$order,$dir,$brandId,$modelId);
        }
        else {
            $search = $this->post('year'); 

            $posts =  $this->Year->year_search($limit,$start,$search,$order,$dir,$brandId,$modelId);

            $totalFiltered = $this->Year->year_search_count($search,$brandId,$modelId);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['brandId'] = $post->brandId;
                $nestedData['modelId'] = $post->modelId;
                $nestedData['year'] = $post->year;
                $nestedData['id'] = $post->id;

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

    
    function deleteBrand_get(){
        $brandId = $this->get('brandId');
        $this->load->model("Brand");
        $brand = $this->Brand->getBrandById($brandId);
        if($brand != null){
            $isDelete = $this->Brand->delete($brandId);
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

    function deleteYear_get(){
        $id = $this->get('id');

        $this->load->model("Year");
        $year = $this->Year->getyear($id);
        if($year != null){
            $isDelete = $this->Year->delete($id);
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

    function deleteModel_get(){
        $modelId = $this->get('modelId');

        $this->load->model("Model");
        $model = $this->Model->getmodel($modelId);
        if($model != null){
            $isDelete = $this->Model->delete($modelId);
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

    function updateModel_post(){

        $modelId = $this->post('modelId');
        $modelName = $this->post('modelName');
        $brandId = $this->post('brandId');
        $yearStart = $this->post('yearStart');
        $yearEnd = $this->post('yearEnd');
        $this->load->model("Model");
        
        if($yearEnd == 0){
            $yearEnd = null;
        }
        
        $result = $this->Model->wherenot($modelId,$modelName,$brandId);

        if($result){
            $data = array(
                'modelId' => $modelId,
                'modelName' => $modelName,
                'brandId' => $brandId,
                'yearStart' => $yearStart,
                'yearEnd' => $yearEnd,
                'status' => 1
            );
            $result = $this->Model->update($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function updateYear_post(){

        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $year = $this->post('year');
        $id = $this->post('id');
        $this->load->model("Year");

        $result = $this->Year->wherenot($brandId,$modelId,$id,$year);

        if($result){
            $data = array(
                'brandId' => $brandId,
                'modelId' => $modelId,
                'year' => $year,
                'id' => $id,
                'status' => 1
            );
            $result = $this->Year->update($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getModel_post(){

        $modelId = $this->post('modelId');
        $this->load->model("Model");
        $isCheck = $this->Model->get_modelbyId($modelId);

        if($isCheck){
            $output["status"] = true;
            $result = $this->Model->getmodel($modelId);
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

    function createBrand_post(){
        $config['upload_path'] = 'public/image/brand/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);
        $this->load->model("Brand");
        $userId = $this->session->userdata['logged_in']['id'];

		if ( ! $this->upload->do_upload("brandPicture"))
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
            $brandName = $this->post("brandName");
            $isDublicte = $this->Brand->checkBrand($brandName);
            if($isDublicte){
                $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $data = array(
                    "brandId"=> null,
                    "brandPicture"=> $image,
                    "brandName"=> $brandName,
                    "status"=> 1,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId,
                    'update_at' => null,
                    'update_by' => null
                );
                $isResult = $this->Brand->insert_brand($data);
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

    function updateBrand_post(){
        $config['upload_path'] = 'public/image/brand/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);
        $this->load->model("Brand");
        
        $imageDetailArray = $this->upload->data();
        $image =  $imageDetailArray['file_name'];
        $brandName = $this->post("brandName");
        $brandId = $this->post("brandId");
        $isDublicte = $this->Brand->wherenot($brandId,$brandName);
        if($isDublicte){
            $data = array(
                "brandId"=> null,
                "brandPicture"=> $image,
                "brandName"=> $brandName,
                "status"=> 1
            );
            $isResult = $this->Brand->update($data);
            if($isResult){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }

        }else{
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
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

    function changeStatus_post(){
        $brandId = $this->post("brandId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'status' => $status
        );
        $this->load->model("Brand");
        $result = $this->Brand->updateStatus($brandId,$data);
        if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function changeStatusModel_post(){
        $modelId = $this->post("modelId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'status' => $status
        );
        $this->load->model("Model");
        $result = $this->Model->updateStatus($modelId,$data);
        if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

}