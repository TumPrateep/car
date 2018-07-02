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
                $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $data = array(
                    "lubricator_brandId"=> null,
                    "lubricator_brandPicture"=> $image,
                    "lubricator_brandName"=> $lubricator_brandName,
                    "status"=> 2,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId,
                    "activeFlag" => 2
                );
                $isResult = $this->Lubricatorbrands->insert_lubricatorbrand($data);
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
                "status"=> 2,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                "activeFlag" => 2
            );
            $isCheckStatus =$this->Lubricatorbrands->checkStatusFromlubricatorbrand($lubricator_brandId,$status,$userId);
            if($isCheckStatus){
                $oldData = $this->Lubricatorbrands->getBrandById($lubricator_brandId);
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
                $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }

        }else{
            unlink($config['upload_path'].$image);
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }       
    }

    // function deletelubricatorbrand_get(){
        // $ubricator_brandId = $this->get('lubricator_brandId');
        // $userId = $this->session->userdata['logged_in']['id'];
        // $status = 2;
        // $this->load->model("Lubricatorbrands");
        // $lubricator_brandId =$this->Lubricatorbrands->getBrandById($lubricator_brandId);
    //     if($lubricator_brandId != null){
    //         $isCheckStatus = $this->Lubricatorbrands->checkStatusFromBrand($lubricator_brandId,$status,$userId);
    //         if($isCheckStatus ){
    //             $isDelete = $this->Lubricatorbrands->delete($lubricator_brandId);
    //             if($isDelete){
    //                 $output["message"] = REST_Controller::MSG_SUCCESS;
    //                 $this->set_response($output, REST_Controller::HTTP_OK);
    //             }else{
    //                 $output["message"] = REST_Controller::MSG_BE_USED;
    //                 $this->set_response($output, REST_Controller::HTTP_OK);
    //             }
    //         }else{
    //             $output["message"] = REST_Controller::MSG_UNAUTHORIZATION;
    //                 $this->set_response($output, REST_Controller::HTTP_OK);
    //             }
    //     }else{
    //         $output["message"] = REST_Controller::MSG_BE_DELETED;
    //         $this->set_response($output, REST_Controller::HTTP_OK);
    //    }
    // }
    function deletelubricatorbrand_get(){
        $lubricator_brandId = $this->get('lubricator_brandId');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $this->load->model("Lubricatorbrands");
        $lubricator_brand =$this->Lubricatorbrands->getlubricatorById($lubricator_brandId);
        if($lubricator_brand != null){
            $isCheckStatus = $this->Lubricatorbrands->checkStatusFromBrand($lubricator_brandId,$status,$userId);
            if($isCheckStatus ){
            $isDelete = $this->Lubricatorbrands->delete($lubricator_brandId);
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

        $this->load->model("Lubricatorbrands");
        $totalData = $this->Lubricatorbrands->allLubricatorbrand_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('lubricator_brandName')))
        {            
            $posts = $this->Lubricatorbrands->allLubricatorbrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('lubricator_brandName'); 
            $status = 1; 

            $posts =  $this->Lubricatorbrands->lubricatorbrand_search($limit,$start,$search,$order,$dir,$status);

            $totalFiltered = $this->Lubricatorbrands->lubricatorbrand_search_count($search,$status);
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
}





           
           
           