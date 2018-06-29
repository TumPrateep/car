<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lubricatorbrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
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

    function deletelubricator_brand_get(){
        $lubricator_brandId = $this->get('lubricator_brandId');
        $userId = $this->session->userdata['logged_in']['id'];
        $status = 2;
        $this->load->model("Lubricatorbrands");
        $lubricator_brandId =$this->Lubricatorbrands->getBrandById($lubricator_brandId);
        if($lubricator_brandId != null){
            $isCheckStatus =$this->Lubricatorbrands->checkStatusFromlubricatorbrand($lubricator_brandId,$status,$userId);
            if($isCheckStatus ){
                $isDelete = $this->lubricatorbrands->delete($lubricator_brandId);
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
}




