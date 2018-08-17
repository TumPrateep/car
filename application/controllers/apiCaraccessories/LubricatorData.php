<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LubricatorData extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }

    function delete_get(){

        $lubricator_dataId = $this->get('lubricator_dataId');

        $this->load->model("lubricatordatas");
        $lubricator = $this->lubricatordatas->getlubricatorbyId($lubricator_dataId);
        if($lubricator                 != null){
            $isDelete = $this->lubricatordatas->delete($lubricator_dataId);
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

    function searchLubricatordata_post(){
        $column = "lubricator_dataId";
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

        $this->load->model('lubricatordatas');
        $userId = $this->session->userdata['logged_in']['id'];
        $totalData = $this->lubricatordatas->allLubricatordata_count($userId);
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricator_typeId')) && empty($this->post('lubricator_brandId')) && empty($this->post('lubricatorId')) && empty($this->post('lubricator_numberId')) && empty($this->post('price')))
        {            
            $posts = $this->lubricatordatas->allLubricatordatas($limit,$start,$order,$dir,$userId);
        }else{

            $lubricator_typeId = $this->post('lubricator_typeId');
            $lubricator_brandId = $this->post('lubricator_brandId');
            $lubricatorId = $this->post('lubricatorId');
            $lubricator_numberId = $this->post('lubricator_numberId');
            $price = $this->post('price');
            
            $status = null; 
            $posts =  $this->lubricatordatas->LubricatorDatas_search($limit,$start,$order,$dir,$status,$lubricator_typeId, $lubricator_brandId, $lubricatorId, $lubricator_numberId, $price);

            $totalFiltered = $this->lubricatordatas->LubricatorDatas_search_count($lubricator_typeId, $lubricator_brandId, $lubricatorId, $lubricator_numberId, $price);
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['lubricator_dataId'] = $post->lubricator_dataId;
                $nestedData[$count]['lubricator_typeName'] = $post->lubricator_typeName;
                $nestedData[$count]['lubricator_brandName'] = $post->lubricator_brandName;
                $nestedData[$count]['lubricatorName'] = $post->lubricatorName;
                $nestedData[$count]['lubricator_number'] = $post->lubricator_number;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['price'] = $post->price;
                $nestedData[$count]['warranty_year'] = $post->warranty_year;
                $nestedData[$count]['warranty_distance'] = $post->warranty_distance;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
                $nestedData[$count]['create_by'] = $post->create_by;
                $nestedData[$count]['warranty'] = $post->warranty;
                $nestedData[$count]['lubricator_dataPicture'] = $post->lubricator_dataPicture;
                $nestedData[$count]['lubricator_gear'] = $post->lubricator_gear;
                $nestedData[$count]['lubricator_typeSize'] = $post->lubricator_typeSize;
                $nestedData[$count]['capacity'] = $post->capacity;
                
                $data[$index] = $nestedData;
                if($count >= 2){
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


    
    public function create_post(){
        $lubricator_brandId = $this->post('lubricator_brandId');
        $price = $this->post('price');
        $warranty_year = $this->post('warranty_year');
        $warranty = $this->post('warranty');
        $warranty_distance = $this->post('warranty_distance');
        $lubricatorId = $this->post('lubricatorId');
        $userId = $this->session->userdata['logged_in']['id'];
        $config['upload_path'] = 'public/image/lubricatordata/';

        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        // $config['overwrite'] = TRUE;
        // $config['encrypt_name'] = TRUE;
        // $config['remove_spaces'] = TRUE;
        // $this->load->library('upload', $config);

        $this->load->model("lubricatordatas");
        // $userId = $this->session->userdata['logged_in']['id'];
        $img = $this->post('lubricator_dataPicture');
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
            $isDuplicated = $this->lubricatordatas->checkduplicated($lubricatorId);
            if($isDuplicated){
                unlink($file);
                $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $data = array(
                    'lubricator_dataId' => null,
                    'lubricator_brandId' => $lubricator_brandId,
                    'lubricator_dataPicture' => $image,
                    'status' => 1,
                    'activeFlag' => 1,
                    'create_by' => $userId,
                    'create_at'=>date('Y-m-d H:i:s',time()),
                    'price' => $price,
                    'warranty' => $warranty,
                    'warranty_year' => $warranty_year,
                    'warranty_distance' => $warranty_distance,
                    'lubricatorId' => $lubricatorId
                );
                $result = $this->lubricatordatas->insert($data);
                if($result){
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    unlink($file);
                    $output["message"] = REST_Controller::MSG_NOT_CREATE;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }
            }
        }
    }   

    public function update_post(){
        $lubricator_dataId = $this->post('lubricator_dataId');
        $lubricator_brandId = $this->post('lubricator_brandId');
        $price = $this->post('price');
        $warranty_year = $this->post('warranty_year');
        $warranty = $this->post('warranty');
        $warranty_distance = $this->post('warranty_distance');
        $userId = $this->session->userdata['logged_in']['id'];
        $config['upload_path'] = 'public/image/tirebranddata/';
        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        // $config['overwrite'] = TRUE;
        // $config['encrypt_name'] = TRUE;
        // $config['remove_spaces'] = TRUE;
        // $this->load->library('upload', $config);

        $this->load->model("lubricatordatas");
        $userId = $this->session->userdata['logged_in']['id'];

        $img = $this->post('lubricator_dataPicture');
        $success = true;
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
            $image =  $imageName;
            $isDuplicated = $this->lubricatordatas->checkduplicatedUpdate($lubricator_brandId,$lubricator_dataId);
            if(!$isDuplicated){
                $data = array(
                    'lubricator_dataId' => null,
                    'lubricator_brandId' => $lubricator_brandId,
                    'lubricator_dataPicture' => $image,
                    'status' => 1,
                    'activeFlag' => 1,
                    'update_by' => $userId,
                    'update_at'=>date('Y-m-d H:i:s',time()),
                    'price' => $price,
                    'warranty' => $warranty,
                    'warranty_year' => $warranty_year,
                    'warranty_distance' => $warranty_distance
                );
                if(!empty($img)){
                    $data["lubricator_dataPicture"] = $image;
                }
                
                $result = $this->lubricatordatas->update($data, $lubricator_dataId);
                if($result){
                    unlink($config['upload_path'].$oldData->lubricator_dataPicture);
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    unlink($config['upload_path'].$image);
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
    function getlubricator_dataId_get(){
        $lubricator_dataId = $this->get('lubricator_dataId');
        $this->load->model("lubricatordatas");
        $isCheck = $this->lubricatordatas->checklubricator_dataId($lubricator_dataId);
        if($isCheck){
            $result = $this->lubricatordatas->getlubricator_dataIdById($lubricator_dataId);
            if($result != null){
                $output["data"] = $result;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

}


