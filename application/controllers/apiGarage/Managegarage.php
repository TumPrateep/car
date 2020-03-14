<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Managegarage extends BD_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('managegarages');
        $this->load->model('mechanics');
        $this->load->model("location");

    }

    public function update_post()
    {

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
        $Wifi = $this->post('Wifi');
        $roomfan = $this->post('roomfan');
        $roomAir = $this->post('roomAir');
        $snack = $this->post('snack');

        $bank_name = $this->post('bank_name');
        $bank_id = $this->post('bank_id');
        $bank_owner = $this->post('bank_owner');

        $option_service1 = $this->post('option_service1');
        $service_option1_price = null;
        if(!empty($option_service1)){
            $service_option1_price = $this->post('service_option1_price');    
        }
        $option_service2 = $this->post('option_service2');
        $option_service3 = $this->post('option_service3');

        $openDay = "";
        $daym = $this->post('monday');
        $openDay .= (isset($daym) ? 1 : 0);

        $dayt = $this->post('tuesday');
        $openDay .= (isset($dayt) ? 1 : 0);

        $dayw = $this->post('wednesday');
        $openDay .= (isset($dayw) ? 1 : 0);

        $dayth = $this->post('thursday');
        $openDay .= (isset($dayth) ? 1 : 0);

        $dayf = $this->post('friday');
        $openDay .= (isset($dayf) ? 1 : 0);

        $dayst = $this->post('saturday');
        $openDay .= (isset($dayst) ? 1 : 0);

        $days = $this->post('sunday');
        $openDay .= (isset($days) ? 1 : 0);

        $dayopenhour = $openDay;

        $Servicegarage = "";

        $change_spare = $this->post('change_spare');
        $Servicegarage .= (isset($change_spare) ? 1 : 0);

        $change_tire = $this->post('change_tire');
        $Servicegarage .= (isset($change_tire) ? 1 : 0);

        $change_lubricator = $this->post('change_lubricator');
        $Servicegarage .= (isset($change_lubricator) ? 1 : 0);

        $garageService = $Servicegarage;

        $this->load->model("managegarages");
        $config['upload_path'] = 'public/image/garage/';
        $img = $this->post("picture");
        // $img1 = $this->post("garagePicture1");

        // $img2 = $this->post("garagePicture2");
        $success = true;
        $file = null;
        $imageName = null;
        if (!empty($img)) {
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            $imageName = uniqid() . '.png';
            $file = $config['upload_path'] . '/' . $imageName;
            $success = file_put_contents($file, $data);
        }

        // if(!empty($img1)){
        //     $img1 = str_replace('data:image/png;base64,', '', $img1);
        //     $img1 = str_replace(' ', '+', $img1);
        //     $data = base64_decode($img1);

        //     $imageName1 = uniqid().'.png';
        //     $file1 = $config['upload_path']. '/'. $imageName1;
        //     $success = file_put_contents($file, $data);
        // }
        if (!$success) {
            unlink($file);
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {

            $data_check_update = $this->managegarages->getmanagegaragesById($garageId);
            $data_check = $this->managegarages->data_check_update($garageId, $garageName);

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
                "picture" => $imageName,
                // "garagePicture1" => $imageName1,
                'option1' => $Wifi,
                'option2' => $roomfan,
                'option3' => $roomAir,
                'option4' => $snack,
                'dayopenhour' => $dayopenhour,
                'garageService' => $garageService,
                'bank_name' => $bank_name,
                'bank_id' => $bank_id,
                'bank_owner' => $bank_owner,
                'service_option1' => $option_service1,
                'service_option1_price' => $service_option1_price,
                'service_option2' => $option_service2,
                'service_option3' => $option_service3
            );

            $oldImage = null;
            if ($data_check_update != null) {
                $oldImage = $config['upload_path'] . $data_check_update->picture;
            }

            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->managegarages,
                "image_path" => $file,
                // "image_path" => $file1,
                "old_image_path" => $oldImage,

            ];
            // dd($oldImage);
            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }
    }

    public function getmanagegarage_post()
    {
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $data_check = $this->managegarages->getmanagegaragesById($garageId);
        $data_check->owner = $this->mechanics->getOwnerGarage($garageId);
        if ($data_check != null) {
            $data_check->provinceName = $this->location->getProvinceNameByProvinceId($data_check->provinceId);
            $data_check->districtName = $this->location->getDistrictNameByDistrictId($data_check->districtId);
            $data_check->subdistrictName = $this->location->getSubDistrictBySubDistrictId($data_check->subdistrictId);
        }

        $date = date_create($data_check->openingtime);
        $data_check->openingtime = date_format($date, "H:i");

        $date = date_create($data_check->closingtime);
        $data_check->closingtime = date_format($date, "H:i");

        $option = [
            "data_check" => $data_check,
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

}