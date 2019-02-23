<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Userprofile extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('userprofiles');
        $this->load->model('location');
    }

    public function update_post(){
        
        $userId = $this->session->userdata['logged_in']['id'];
        $user_profile = $this->post('user_profile');
        $titleName = $this->post('titleName');
        $firstname = $this->post('firstname');
        $lastname = $this->post('lastname');
        $hno = $this->post('hno');
        $village = $this->post('village');
        $road = $this->post('road');
        $Alley = $this->post('Alley');
        $provinceId = $this->post('provinceId');
        $districtId = $this->post('districtId');
        $subdistrictId = $this->post('subdistrictId');
        $postCodes = $this->post('postCodes');
        $phone1 = $this->post('phone1');
        $phone2 = $this->post('phone2');
 
        $data_check_update = $this->userprofiles->
        
        ($user_profile);
        $data_check = $this->userprofiles->data_check_update($user_profile,$firstname,$lastname);
        $data = array(
            'user_profile' => $user_profile,
            'titleName' => $titleName,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'hno' => $hno,
            'village' => $village,
            'road' => $road,
            'Alley' => $Alley,
            'provinceId' => $provinceId,
            'districtId' => $districtId,
            'subdistrictId' => $subdistrictId,
            'postCodes' => $postCodes,
            'phone1' => $phone1,
            'phone2' => $phone2,
    
         
        );
        $oldImage = null;
        
        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->userprofiles,
            "image_path" => null,
            "old_image_path" => null
        ];
        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

   
    function getuser_post(){
        $user_profile = $this->post('user_profile');
        $data_check = $this->userprofiles->getuserProfileById($user_profile);
        if($data_check != null){
            $data_check->provinceName = $this->location->getProvinceNameByProvinceId($data_check->provinceId);
            $data_check->districtName = $this->location->getDistrictNameByDistrictId($data_check->districtId);
            $data_check->subdistrictName = $this->location->getSubDistrictBySubDistrictId($data_check->subdistrictId);
        }
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

   

   
   
}