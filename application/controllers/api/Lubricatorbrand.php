<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorbrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    function searchLubricatorbrand_post(){
            $columns = array( 
                0 => null,
                1 => null, 
                2 =>'lubricator_brandName',
                3 =>'status'
            );
            $limit = $this->post('length');
            $start = $this->post('start');
            $order = $columns[$this->post('order')[0]['column']];
            $dir = $this->post('order')[0]['dir'];
            $this->load->model("Lubricatorbrands");
            $totalData = $this->Lubricatorbrands->allLubricatorbrand_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('lubricator_brandName')) && empty($this->post('status')))
            {            
                $posts = $this->Lubricatorbrands->allLubricatorbrand($limit,$start,$order,$dir);
            }
            else {
                $search = $this->post('lubricator_brandName');
                $status = $this->post('status');
                $posts =  $this->Lubricatorbrands->lubricatorbrand_search($limit,$start,$search,$order,$dir,$status);
                $totalFiltered = $this->Lubricatorbrands->lubricatorbrand_search_count($search,$status);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $nestedData['lubricator_brandId'] = $post->lubricator_brandId;
                    $nestedData['lubricator_brandName'] = $post->lubricator_brandName;
                    $nestedData['lubricator_brandPicture'] = $post->lubricator_brandPicture;
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
        
        function changeStatus_post(){
            $lubricator_brandId = $this->post("lubricator_brandId");
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
            $this->load->model("Lubricatorbrands");
            $result = $this->Lubricatorbrands->updateStatus($lubricator_brandId,$data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }

        function createLubricatorbrands_post(){
            $config['upload_path'] = 'public/image/lubricator_brand/';
            $config['allowed_types'] = 'gif|jpg|png';
            // $config['max_size'] = '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['overwrite'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
    
            $this->load->library('upload', $config);
            $this->load->model("Lubricatorbrands");
            $userId = $this->session->userdata['logged_in']['id'];
    
            if ( ! $this->upload->do_upload("lubricator_brandPicture"))
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
                $lubricator_brandName = $this->post("lubricator_brandName");
                $isDublicte = $this->Lubricatorbrands->checklubricatorbrand($lubricator_brandName);
                if($isDublicte){
                    unlink($config['upload_path'].$image);
                    $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    $data = array(
                        "lubricator_brandId"=> null,
                        "lubricator_brandPicture"=> $image,
                        "lubricator_brandName"=> $lubricator_brandName,
                        "status"=> 1,
                        "create_at" => date('Y-m-d H:i:s',time()),
                        "create_by" => $userId,
                        "activeFlag" => 1
                    );
                    $isResult = $this->Lubricatorbrands->insert_lubricatorbrand($data);
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

        function updateLubricatorbrands_post(){
            $config['upload_path'] = 'public/image/lubricator_brand/';
            $config['allowed_types'] = 'gif|jpg|png';
            // $config['max_size'] = '100';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['overwrite'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
    
            $userId = $this->session->userdata['logged_in']['id'];
            $this->load->library('upload', $config);
            $this->load->model("Lubricatorbrands");
    
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
            $isDublicte = $this->Lubricatorbrands->checklubricatorbrandforUpdate($lubricator_brandId,$lubricator_brandName);
            if($isDublicte){
                $data = array(
                    "lubricator_brandId"=> $lubricator_brandId,
                    "lubricator_brandPicture"=> $image,
                    "lubricator_brandName"=> $lubricator_brandName,
                    "status"=> 1,
                    'update_at' => date('Y-m-d H:i:s',time()),
                    'update_by' => $userId,
                    "activeFlag" => 1
                );
                $oldData = $this->Lubricatorbrands->getlubricatorById($lubricator_brandId);
                $isResult = $this->Lubricatorbrands->update($data);
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
                $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            
        }

        function deleteLubricatorbrands_get(){
            $lubricator_brandId = $this->get('lubricator_brandId');
            $this->load->model("lubricatorbrands");
            $oldData = $this->lubricatorbrands->getlubricatorById($lubricator_brandId);
            if($oldData != null){
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
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }

        function getLubricatorbrandsById_post(){
            $lubricator_brandId = $this->post('lubricator_brandId');
            $this->load->model("lubricatorbrands");
           
            $this->set_response($isCheck, REST_Controller::HTTP_OK);
            $result = $this->lubricatorbrands->geTubricatorbrandFromId($lubricator_brandId);
            if($result != null){
                $output["data"] = $result;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
           
        }

        

    }