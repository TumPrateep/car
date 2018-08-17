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
        
        $userId = $this->session->userdata['logged_in']['id'];
        $path = 'public/image/garage/'.$userId;
        mkdir($path);
        $config['upload_path'] = $path;

        $img = $this->post('garage_picture');
        $success = true;
        $imageName = "";
        $file = "";
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
            $garageId = $this->post("garageId");
            $garageName = $this->post("garageName");
            $businessRegistration = $this->post("businessRegistration");
            $postCode = $this->post("zipCode");
            $latitude = $this->post("latitude");
            $longtitude = $this->post("longtitude");
            $comment = $this->post("comment");
            $option1 = $this->post("option1");
            $option2 = $this->post("option2");
            $option3 = $this->post("option3");
            $option4 = $this->post("option4");
            $option_outher = $this->post("option_other");
            $garageAddress = $this->post("garageAddress");
            $gprovinceId = $this->post("garage-provinceId");
            $gdistrictId = $this->post("garage-districtId");
            $gsubdistrictId = $this->post("garage-subdistrictId");
            $firstnameGarage = $this->post("firstnameGarage");
            $lastnameGarage = $this->post("lastnameGarage");
            $idcardGarage = $this->post("idcardGarage");
            $addressGarage = $this->post("addressGarage");

            $data = array(
                'garageId' => $garageId,
                'garageName' => $garageName,
                'businessRegistration' => $businessRegistration,
                'provinceId' => $gprovinceId, 
                'districtId' => $gdistrictId,
                'subdistrictId' => $gsubdistrictId,
                'garageAddress' => $addressGarage,
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
                'garagePicture' => $imageName,
                'firstname' => $firstnameGarage,
                'lastname' => $lastnameGarage,
                'idcard' => $idcardGarage,
                'addressGarage' => $addressGarage
            );

            $oldData = $this->Garage->getGarageByGarageId($garageId);
            if($oldData != null){
                $isDuplicate = $this->Garage->checkDuplicate($garageId, $businessRegistration);
                if(!$isDuplicate){
                    $result = $this->Garage->update($data);
                    if($result){
                        unlink($config['upload_path']. '/'. $oldData->garagePicture);
                        $output["message"] = REST_Controller::MSG_SUCCESS;
                        $this->set_response($output, REST_Controller::HTTP_OK);
                    }else{
                        unlink($file);
                        $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                        $this->set_response($output, REST_Controller::HTTP_OK);
                    }   
                }else{
                    unlink($file);
                    $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                } 
            }else{
                unlink($file);
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            } 
        }
    }

}