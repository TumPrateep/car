<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model("registercaraccessorys");
        $this->load->model("registergarages");
        $this->load->model("user");
    }

    public function caraccessorys_post()
    {
        $titleName_user = $this->post('titleName_user');
        $firstname_user = $this->post('firstname_user');
        $lastname_user = $this->post('lastname_user');
        $personalid = $this->post('personalid');
        $phone1 = $this->post('phone1');
        $phone2 = $this->post('phone2');
        //set1

        $hno_user = $this->post('hno_user');
        $alley_user = $this->post('alley_user');
        $road_user = $this->post('road_user');
        $village_user = $this->post('village_user');
        $provinceId_user = $this->post('provinceId_user');
        $districtId_user = $this->post('districtId_user');
        $subdistrictId_user = $this->post('subdistrictId_user');
        $postCode_user = $this->post('postCode_user');
        //set2

        $titleName_sparepart = $this->post('titleName_sparepart');
        $firstname_sparepart = $this->post('firstname_sparepart');
        $lastname_sparepart = $this->post('lastname_sparepart');
        $sparepartname = $this->post('sparepartname');
        $phone_sparepart = $this->post('phone_sparepart');
        $businessRegistration = $this->post('businessRegistration');
        //set3

        $hno_sparepart = $this->post('hno_sparepart');
        $alley_sparepart = $this->post('alley_sparepart');
        $road_sparepart = $this->post('road_sparepart');
        $village_sparepart = $this->post('village_sparepart');
        $sparepart_provinceId = $this->post('sparepart_provinceId');
        $sparepart_districtId = $this->post('sparepart_districtId');
        $sparepart_subdistrictId = $this->post('sparepart_subdistrictId');
        $postCode_sparepart = $this->post('postCode_sparepart');
        $latitude = $this->post('latitude');
        $longtitude = $this->post('longtitude');
        $bank_name = $this->post('bank_name');
        $bank_id = $this->post('bank_id');
        $bank_owner = $this->post('bank_owner');
        //set4

        $username = $this->post('username');
        $phone = $this->post('phone');
        $email = $this->post('email');
        $password = $this->post('password');
        $passwords = password_hash($password, PASSWORD_BCRYPT);
        // $checkpassword = $this->post('checkpassword');
        //set5

        $data_check = $this->registercaraccessorys->data_check_create($username, $personalid, $businessRegistration);
        // echo $this->db->last_query();
        // exit();
        $data['usersprofile'] = array(
            'user_profile' => null,
            'titleName' => $titleName_user,
            'firstname' => $firstname_user,
            'lastname' => $lastname_user,
            'personalid' => $personalid,
            'phone1' => $phone1,
            'phone2' => $phone2,
            'hno' => $hno_user,
            'Alley' => $alley_user,
            'road' => $road_user,
            'village' => $village_user,
            'provinceId' => $provinceId_user,
            'districtId' => $districtId_user,
            'subdistrictId' => $subdistrictId_user,
            'postCodes' => $postCode_user,
            'activeFlag' => 1,
            'create_by' => null,
            'update_by' => null,
            'create_at' => date('Y-m-d H:i:s', time()),
            'update_at' => null,
            'status' => 1,
        );

        $data['accessories'] = array(
            'car_accessoriesId' => null,
            'titlename' => $titleName_sparepart,
            'firstname' => $firstname_sparepart,
            'lastname' => $lastname_sparepart,
            'car_accessoriesName' => $sparepartname,
            'phone' => $phone_sparepart,
            'businessRegistration' => $businessRegistration,
            'hno' => $hno_sparepart,
            'Alley' => $alley_sparepart,
            'road' => $road_sparepart,
            'village' => $village_sparepart,
            'provinceId' => $sparepart_provinceId,
            'districtId' => $sparepart_districtId,
            'subdistrictId' => $sparepart_subdistrictId,
            'postCode' => $postCode_sparepart,
            'latitude' => $latitude,
            'longitude' => $longtitude,
            'create_by' => null,
            'update_by' => null,
            'create_at' => date('Y-m-d H:i:s', time()),
            'update_at' => null,
            'userId' => null,
            'status' => 1,
            'bank_name' => $bank_name,
            'bank_id' => $bank_id,
            'bank_owner' => $bank_owner,
        );

        $data['users'] = array(
            'id' => null,
            'username' => $username,
            'password' => $passwords,
            'email' => $email,
            'phone' => $phone,
            'create_by' => null,
            'update_by' => null,
            'create_at' => date('Y-m-d H:i:s', time()),
            'update_at' => null,
            'status' => 1,
            'category' => 2,
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->registercaraccessorys,
            "image_path" => null,
        ];
        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function garages_post()
    {
        $titleName_user = $this->post('titleName_user');
        $firstname_user = $this->post('firstname_user');
        $lastname_user = $this->post('lastname_user');
        $personalid = $this->post('personalid');
        $phone1 = $this->post('phone1');
        $phone2 = $this->post('phone2');
        //set1

        $hno_user = $this->post('hno_user');
        $alley_user = $this->post('alley_user');
        $road_user = $this->post('road_user');
        $village_user = $this->post('village_user');
        $provinceId_user = $this->post('provinceId_user');
        $districtId_user = $this->post('districtId_user');
        $subdistrictId_user = $this->post('subdistrictId_user');
        $postCode_user = $this->post('postCode_user');
        //set2

        $config['upload_path'] = 'public/image/garage/';
        $img = $this->post("garagePicture");
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $imgdata = base64_decode($img);
        $imageName = uniqid() . '.png';
        $file = $config['upload_path'] . '/' . $imageName;
        $success = file_put_contents($file, $imgdata);
        $garagename = $this->post('garagename');
        $businessRegistration = $this->post('businessRegistration');
        $phone_garage = $this->post('phone_garage');
        $brandId = $this->post('brandId');
        //set3

        $services = $this->post('check');
        $arrService = [0, 0, 0];
        foreach ($services as $key => $service) {
            if ($service == 11) {
                $arrService[0] = 1;
            }

            if ($service == 12) {
                $arrService[1] = 1;
            }

            if ($service == 13) {
                $arrService[2] = 1;
            }
        }

        $garageService = "";
        foreach ($arrService as $key => $service) {
            $garageService .= $service;
        }

        // $changeS = $this->post('change_spare');
        // $ServiceAll .= (isset($changeS) ? 1 : 0 );
        // $changeT = $this->post('change_tire');
        // $ServiceAll .= (isset($changeT) ? 1 : 0 );
        // $changeL = $this->post('change_lubricator');
        // $ServiceAll .= (isset($changeL) ? 1 : 0 );
        // $garageService = $ServiceAll;
        //set4

        $timestart = $this->post('timestart');
        $timeend = $this->post('timeend');
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
        //set5

        $hno_garage = $this->post('hno_garage');
        $alley_garage = $this->post('alley_garage');
        $road_garage = $this->post('road_garage');
        $village_garage = $this->post('village_garage');
        $provinceId_garage = $this->post('provinceId_garage');
        $districtId_garage = $this->post('districtId_garage');
        $subdistrictId_garage = $this->post('subdistrictId_garage');
        $postCode_garage = $this->post('postCode_garage');
        $latitude = $this->post('latitude');
        $longtitude = $this->post('longtitude');
        $bank_name = $this->post('bank_name');
        $bank_id = $this->post('bank_id');
        $bank_owner = $this->post('bank_owner');
        //set6

        $Wifi = $this->post('Wifi');
        $roomfan = $this->post('roomfan');
        $roomAir = $this->post('roomAir');
        $snack = $this->post('snack');
        $Otherfacilities = $this->post('Otherfacilities');
        //set7

        $username = $this->post('username');
        $phone = $this->post('phone');
        $email = $this->post('email');
        $password = $this->post('password');
        $passwords = password_hash($password, PASSWORD_BCRYPT);
        // $checkpassword = $this->post('checkpassword');
        //set8
        // $data_check = $this->registergarages->data_check_create($username, $personalid, $businessRegistration);
        $data_check = $this->registergarages->data_check_create($username, null, null);

        // dd();
        if (!$success) {
            // var_dump("gg");
            // exit;
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {
            $data['usersprofiles'] = array(
                'user_profile' => null,
                'titleName' => $titleName_user,
                'firstname' => $firstname_user,
                'lastname' => $lastname_user,
                'personalid' => $personalid,
                'phone1' => $phone1,
                'phone2' => $phone2,
                'hno' => $hno_user,
                'Alley' => $alley_user,
                'road' => $road_user,
                'village' => $village_user,
                'provinceId' => $provinceId_user,
                'districtId' => $districtId_user,
                'subdistrictId' => $subdistrictId_user,
                'postCodes' => $postCode_user,
                'activeFlag' => 1,
                'create_by' => null,
                'update_by' => null,
                'create_at' => date('Y-m-d H:i:s', time()),
                'update_at' => null,
                'status' => 1,
            );

            $data['garages'] = array(
                'garageId' => null,
                'garageName' => $garagename,
                'businessRegistration' => $businessRegistration,
                'phone' => $phone_garage,
                'brandId' => $brandId,
                'picture' => $imageName,
                'garageService' => $garageService,
                'openingtime' => $timestart,
                'closingtime' => $timeend,
                'dayopenhour' => $dayopenhour,
                'hno' => $hno_garage,
                'Alley' => $alley_garage,
                'road' => $road_garage,
                'village' => $village_garage,
                'provinceId' => $provinceId_garage,
                'districtId' => $districtId_garage,
                'subdistrictId' => $subdistrictId_garage,
                'postCode' => $postCode_garage,
                'latitude' => $latitude,
                'longtitude' => $longtitude,
                'option1' => $Wifi,
                'option2' => $roomfan,
                'option3' => $roomAir,
                'option4' => $snack,
                'option_outher' => $Otherfacilities,
                'create_by' => null,
                'update_by' => null,
                'create_at' => date('Y-m-d H:i:s', time()),
                'update_at' => null,
                'status' => 1,
                'bank_name' => $bank_name,
                'bank_id' => $bank_id,
                'bank_owner' => $bank_owner,
            );

            $data['users'] = array(
                'id' => null,
                'username' => $username,
                'password' => $passwords,
                'email' => $email,
                'phone' => $phone,
                'create_by' => null,
                'update_by' => null,
                'create_at' => date('Y-m-d H:i:s', time()),
                'update_at' => null,
                'status' => 1,
                'category' => 3,
            );

            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->registergarages,
                "image_path" => $file,
            ];
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
        }
    }

    public function users_car_post(){
        $username = $this->post('username');
        $phone = $this->post('phone');
        $password = $this->post('password');
        $p = password_hash($password, PASSWORD_BCRYPT);

        $firstname = $this->post('firstname');
        $lastname = $this->post('lastname');

        $character_plate = $this->post('character_plate');
        $number_plate = $this->post('number_plate');
        $province_plate = $this->post('province_plate');

        $isCheck = $this->user->data_check_create($username, $phone);
        if ($isCheck == null) {
            $data['users'] = array(
                'id' => null,
                'username' => $username,
                'phone' => $phone,
                'password' => $p,
                'category' => 4,
                'status' => 1,
                'create_at' => date('Y-m-d H:i:s', time()),
            );
            $data['profile'] = array(
                'user_profile' => null,
                'titleName' => null,
                'firstName' => $firstname,
                'lastname' => $lastname,
                'hno' => null,
                'alley' => null,
                'road' => null,
                'village' => null,
                'provinceId' => null,
                'districtId' => null,
                'subdistrictId' => null,
                'postCodes' => null,
                'phone1' => null,
                'phone2' => null,
                'create_by' => null,
                'update_by' => null,
                'create_at' => date('Y-m-d H:i:s', time()),
                'update_at' => null,
                'userId' => null,
                'status' => 1,
                'activeFlag' => 1,
            );

            $data['car_profile'] = array(
                'character_plate' => $character_plate,
                'number_plate' => $number_plate,
                'province_plate' => $province_plate,
            );

            $result = $this->user->insert_user_car_profile($data);
            if ($result) {
                $output['result'] = $result;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            } else {
                $output['result'] = $result;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        } else {
            $output["status"] = false;
            $output["data"] = "username ซ้ำ";
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function users_post()
    {

        $username = $this->post('username');
        $email = $this->post('email');
        $phone = $this->post('phone');
        $password = $this->post('password');
        $p = password_hash($password, PASSWORD_BCRYPT);

        $firstname = $this->post('firstname');
        $lastname = $this->post('lastname');

        $isCheck = $this->user->data_check_create($username, $phone);
        if ($isCheck == null) {
            $data['users'] = array(
                'id' => null,
                'username' => $username,
                'email' => (empty($email)) ? null : $email,
                'phone' => $phone,
                'password' => $p,
                'category' => 4,
                'status' => 1,
                'create_at' => date('Y-m-d H:i:s', time()),
            );
            $data['profile'] = array(
                'user_profile' => null,
                'titleName' => null,
                'firstName' => $firstname,
                'lastname' => $lastname,
                'hno' => null,
                'alley' => null,
                'road' => null,
                'village' => null,
                'provinceId' => null,
                'districtId' => null,
                'subdistrictId' => null,
                'postCodes' => null,
                'phone1' => null,
                'phone2' => null,
                'create_by' => null,
                'update_by' => null,
                'create_at' => date('Y-m-d H:i:s', time()),
                'update_at' => null,
                'userId' => null,
                'status' => 1,
                'activeFlag' => 1,
            );
            $result = $this->user->insert_user($data);
            if ($result) {
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            } else {
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        } else {
            $output["status"] = false;
            $output["data"] = "username ซ้ำ";
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }

    }

}