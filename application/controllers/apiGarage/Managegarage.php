<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Managegarage extends BD_Controller {
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('managegarages');
        $this->load->model('mechanics');
        $this->load->model("location");
        
    }

    public function update_post(){
        
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $garageName = $this->post('garageName');
        $phone = $this->post('phone');
        $businessRegistration = $this->post('businessRegistration');
        $hno = $this->post('hno');
        $village = $this->post('village');
        $road = $this->post('road');
        $provinceId = $this->post('provinceId');
        $districtId = $this->post('districtId');
        $subdistrictId = $this->post('subdistrictId');
        $postCode = $this->post('postCode');
        $alley = $this->post('alley');
        $latitude = $this->post('latitude');
        $longtitude = $this->post('longtitude');
        $option_outher = $this->post('option_outher');
        $openingtime = $this->post('openingtime');
        $closingtime = $this->post('closingtime');
        $brandId = $this->post('brandId');
        $this->load->model("managegarages");
        $config['upload_path'] = 'public/image/garage/';
        // $img = $this->post("garagePicture");
        $img = $this->post("picture");
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

        $data_check_update = $this->managegarages->getmanagegaragesById($garageId);
        $data_check = $this->managegarages->data_check_update($garageId,$garageName);

        $data = array(
            'garageId' => $garageId,
            'garageName' => $garageName,
            'phone' => $phone,
            'businessRegistration' => $businessRegistration,
            'hno' => $hno,
            'village' => $village,
            'road' => $road,
            'provinceId' => $provinceId,
            'districtId' => $districtId,
            'subdistrictId' => $subdistrictId,
            'postCode' => $postCode,
            'alley' => $alley,
            'latitude' => $latitude,
            'option_outher' => $option_outher,
            'openingtime' => $openingtime,
            'closingtime' => $closingtime,
            'brandId' => $brandId,
            "picture"=> $imageName
        );
        $oldImage = null;
        if($data_check_update != null){
            $oldImage = $config['upload_path'].$data_check_update->picture;
        }


        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->managegarages,
            "image_path" => $file,
            "old_image_path" => $oldImage
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }
    }

    function getmanagegarage_post(){

        $garageId = $this->session->userdata['logged_in']['garageId'];
        $data_check = $this->managegarages->getmanagegaragesById($garageId);
        $data_check->owner = $this->mechanics->getOwnerGarage($garageId);
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
