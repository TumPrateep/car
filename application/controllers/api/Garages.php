<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Garages extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("Garage");
        $this->load->model("Location");
    }

    function search_post(){
        $provinceId = $this->post("provinceId");
        $garageName = $this->post("garageName");
        $json["province"] = $this->Location->getProvinceByProvinceId($provinceId);
        $json["garage"] = $this->Garage->listGarageSearchByGarageNameAndProvinceId($garageName, $provinceId);
        $this->set_response($json);
    }

    function getViewGarage_get(){
        $garageId = $this->get("garageId");

        $result = $this->Garage->getViewGarageByGarageId($garageId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getgarage_post(){
        $garageId = $this->post('garageId');

        $this->load->model("garage");
        $result = $this->garage->getGaragebyGarageId($garageId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function update_post(){
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $userId = $this->session->userdata['logged_in']['id'];
        $path = 'public/image/garage/'.$userId;
        mkdir($path);
        $config['upload_path'] = $path;

        $garageName = $this->post("garageName");
        $businessRegistration = $this->post("businessRegistration");
        $postCode = $this->post("postCode");
        $latitude = $this->post("latitude");
        $longtitude = $this->post("longtitude");
        $comment = $this->post("comment");
        $option1 = $this->post("option1");
        $option2 = $this->post("option2");
        $option3 = $this->post("option3");
        $option4 = $this->post("option4");
        $option_outher = $this->post("option_other");
        $garageAddress = $this->post("garageAddress");
        $gprovinceId = $this->post("garageProvinceId");
        $gdistrictId = $this->post("garageDistrictId");
        $gsubdistrictId = $this->post("garageSubdistrictId");
        $garagePicture = $this->post("garagePicture");
        $firstnameGarage = $this->post("firstnameGarage");
        $lastnameGarage = $this->post("lastnameGarage");
        $idcardGarage = $this->post("idcardGarage");
        $addressGarage = $this->post("addressGarage");

        $garagePictureName = null;

        $this->load->library('upload', $config);

        if($garagePicture != "undefined"){
            if ( ! $this->upload->do_upload("garagePicture")){
                $error = array('error' => $this->upload->display_errors());
                $output["message"] = REST_Controller::MSG_ERROR;
                $output["data"] = $error;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $imageDetailArray = $this->upload->data();
                $garagePictureName =  $imageDetailArray['file_name'];

                $roleData = array(
                    'garageName' => $garageName,
                    'businessRegistration' => $businessRegistration,
                    'provinceId' => $gprovinceId, 
                    'districtId' => $gdistrictId,
                    'subdistrictId' => $gsubdistrictId,
                    'garageAddress' => $garageAddress,
                    'postCode'=> $postCode,
                    'latitude' => $latitude,
                    'longtitude' => $longtitude,
                    'comment' => $comment,
                    'option1' => $option1,
                    'option2' => $option2,
                    'option3' => $option3,
                    'option4' => $option4,
                    'option_outher' => $option_outher,
                    'update_at' => date('Y-m-d H:i:s',time()),
                    'update_by' => $userId,
                    'garagePicture' => $garagePictureName,
                    'firstname' => $firstnameGarage,
                    'lastname' => $lastnameGarage,
                    'idcard' => $idcardGarage,
                    'addressGarage' => $addressGarage
                );
                $result = $this->LubricatorNumbers->updateLubricatorNumber($data);
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
            }      
        }

    }

}