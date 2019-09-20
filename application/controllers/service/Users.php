<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model("user");
    }

    function create_post(){
		$username = $this->post('username');
		$password = $this->post('password');
		$phone = $this->post('phone');
		$email = $this->post('email');
		$p = password_hash($password, PASSWORD_BCRYPT);

		$titleName_user = $this->post('titleName_user');
		$firstname_user = $this->post('firstname_user');
		$lastname_user = $this->post('lastname_user');
		$hno_user = $this->post('hno_user');
		$alley_user = $this->post('alley_user');
		$road_user = $this->post('road_user');
		$village_user = $this->post('village_user');
		$provinceId_user = $this->post('provinceId_user');
		$districtId_user = $this->post('districtId_user');
		$subdistrictId_user = $this->post('subdistrictId_user');
		$postCodes_user = $this->post('postCode_user');
		$phone1 = $this->post('phone1');
		$phone2 = $this->post('phone2');

		$car_accessoriesName = $this->post('sparepartname');
		$businessRegistration = $this->post('businessRegistration');
		$titleName_car = $this->post('titleName_sparepart');
		$firstname_car = $this->post('firstname_sparepart');
		$lastname_car = $this->post('lastname_sparepart');
		$idcard = $this->post('personalid');
		$phone_car = $this->post('phone_sparepart');
		$hno_car = $this->post('hno_sparepart');
		$alley_car = $this->post('alley_sparepart');
		$road_car = $this->post('road_sparepart');
		$village_car = $this->post('village_sparepart');
		$provinceId_car = $this->post('sparepart_provinceId');
		$districtId_car = $this->post('sparepart_districtId');
		$subdistrictId_car = $this->post('sparepart_subdistrictId');
		$postCode_car = $this->post('postCode_sparepart');
		$latitude = $this->post('latitude');
		$longtitude = $this->post('longtitude');

		$data_check = $this->user->data_check_create($username,$phone);
		$data['users'] = array(
			'id' => null,
			'username' => $username,
			'password' => $p,
			'email' => $email,
			'phone' => $phone,
			'create_by' => null,
			'update_by' => null,
			'create_at' => date('Y-m-d H:i:s',time()),
			'update_at' => null,
			'status' => 1,
			'category' => 2
		);

		$data['profile'] = array(
			'user_profile' => null,
			'titleName' => $titleName_user,
			'firstname' => $firstname_user,
			'lastname' => $lastname_user,
			'hno' => $hno_user,
			'alley' => $alley_user,
			'road' => $road_user,
			'village' => $village_user,
			'provinceId' => $provinceId_user,
			'districtId' => $districtId_user,
			'subdistrictId' => $subdistrictId_user,
			'postCodes' => $postCodes_user,
			'phone1' => $phone1,
			'phone2' => $phone2,
			'create_by' => null,
			'update_by' => null,
			'create_at' => date('Y-m-d H:i:s',time()),
			'update_at' => null,
			'userId' => null,
			'status' => 1,
			'activeFlag' => 1
		);

		$data['accessories'] = array(
			'car_accessoriesId' => null,
			'car_accessoriesName' => $car_accessoriesName,
			'businessRegistration' => $businessRegistration,
			'titleName' => $titleName_car,
			'firstname' => $firstname_car,
			'lastname' => $lastname_car,
			'idcard' => $idcard,
			'hno' => $hno_car,
			'alley' => $alley_car,
			'road' => $road_car,
			'village' => $village_car,
			'provinceId' => $provinceId_car,
			'districtId' => $districtId_car,
			'subdistrictId' => $subdistrictId_car,
			'postCode' => $postCode_car,
			'phone' => $phone_car,
			'latitude'=> $latitude,
			'longitude' => $longtitude,
			'create_by' => null,
			'update_by' => null,
			'create_at' => date('Y-m-d H:i:s',time()),
			'update_at' => null,
			'userId' => null,
			'status' => 1,
			'userId' => null
		);
		$option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->user,
            "image_path" => null
        ];
		$this->set_response(decision_create($option), REST_Controller::HTTP_OK);

	}

	function creategarage_post(){
		$username = $this->post('username');
		$password = $this->post('password');
		$phone_user = $this->post('phone');
		$email = $this->post('email');
		$p = password_hash($password, PASSWORD_BCRYPT);

		$titleName_user = $this->post('titleName_user');
		$firstname_user = $this->post('firstname_user');
		$lastname_user = $this->post('lastname_user');
		$hno_user = $this->post('hno_user');
		$alley_user = $this->post('alley_user');
		$road_user = $this->post('road_user');
		$village_user = $this->post('village_user');
		$provinceId_user = $this->post('provinceId_user');
		$districtId_user = $this->post('districtId_user');
		$subdistrictId_user = $this->post('subdistrictId_user');
		$postCodes_user = $this->post('postCodes_user');
		$phone1 = $this->post('phone1');
		$phone2 = $this->post('phone2');

		$titleName_mechanic = $this->post('titleName_user');
		$firstname_mechanic = $this->post('firstname_user');
		$lastname_mechanic = $this->post('lastname_user');
		$personalid_mechanic = $this->post('personalid');
		$phone_mechanic = $this->post('phone1');
		$exp = $this->post('exp');
		$brandCar = $this->post('brandCar');

		$garagePicture = $this->post('garagePicture');
		$garagename = $this->post('garagename');
		$phone_garage = $this->post('phone_garage');
		$businessRegistration = $this->post('businessRegistration');
		// $dayopenhour = $this->post('dayopenhour');

		$ServiceAll = "";
		$changeS = $this->post('change_spare');
		$ServiceAll .= (isset($changeS) ? 1 : 0 );
		
		$changeT = $this->post('change_tire');
		$ServiceAll .= (isset($changeT) ? 1 : 0 );
		
		$changeL = $this->post('change_lubricator');
		$ServiceAll .= (isset($changeL) ? 1 : 0 );

		$garageService = $ServiceAll;


		$openDay = "";
		$daym = $this->post('monday');
		$openDay .= (isset($daym) ? 1 : 0 );
		
		$dayt = $this->post('tuesday');
		$openDay .= (isset($dayt) ? 1 : 0 );

		$dayw = $this->post('wednesday');
		$openDay .= (isset($dayw) ? 1 : 0 );

		$dayth = $this->post('thursday');
		$openDay .= (isset($dayth) ? 1 : 0 );

		$dayf = $this->post('friday');
		$openDay .= (isset($dayf) ? 1 : 0 );

		$dayst = $this->post('saturday');
		$openDay .= (isset($dayst) ? 1 : 0 );

		$days = $this->post('sunday');
		$openDay .= (isset($days) ? 1 : 0 );

		$dayopenhour = $openDay;

		$timestart = $this->post('timestart');
		$timeend = $this->post('timeend');
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
		$Wifi = $this->post('Wifi');
		$roomfan = $this->post('roomfan');
		$roomAir = $this->post('roomAir');
		$snack = $this->post('snack');
		$Otherfacilities = $this->post('Otherfacilities');

		$config['upload_path'] = 'public/image/garage/';
        $img = $this->post("garagePicture");
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);
        if (!$success){
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
		// $data_check = $this->user->data_check_create($username,$phone_user);
		// $data_check = $this->user->data_check_garage_create($businessRegistration );
		$data_check = null;
		$data = null;
		$data['users'] = array(
			'id' => null,
			'username' => $username,
			'password' => $p,
			'email' => $email,
			'phone' => $phone_user,
			'create_by' => null,
			'update_by' => null,
			'create_at' => date('Y-m-d H:i:s',time()),
			'update_at' => null,
			'status' => 1,
			'category' => 3
		);
		$data['profile'] = array(
			'user_profile' => null,
			'titleName' => $titleName_user,
			'firstName' => $firstname_user,
			'lastname' => $lastname_user,
			'hno' => $hno_user,
			'alley' => $alley_user,
			'road' => $road_user,
			'village' => $village_user,
			'provinceId' => $provinceId_user,
			'districtId' => $districtId_user,
			'subdistrictId' => $subdistrictId_user,
			'postCodes' => $postCodes_user,
			'phone1' => $phone1,
			'phone2' => $phone2,
			'create_by' => null,
			'update_by' => null,
			'create_at' => date('Y-m-d H:i:s',time()),
			'update_at' => null,
			'userId' => null,
			'status' => 1,
			'activeFlag' => 1
		);
		$data['mechanic'] = array(
			'mechanicId' => null,
			'titleName' => $titleName_mechanic,
			'firstName' => $firstname_mechanic,
			'lastName' => $lastname_mechanic,
			'nickName' => null,
			'exp' => $exp,
			'personalid' => $personalid_mechanic,
			'brandId' => $brandCar,
			'phone' => $phone_mechanic,
			'create_by' => null,
			'update_by' => null,
			'create_at' => date('Y-m-d H:i:s',time()),
			'update_at' => null,
			'garageId' => null,
			'status' => 1,
			'picture' => null,
			'job' => null,
			'activeFlag' => 1
		);
		$data['garage'] = array(
			'garageId' => null,
			'garageName' => $garagename,
			'businessRegistration' => $businessRegistration,
			'comment' => null,
			'garageService' => $garageService,
			'phone' => $phone_garage,
			'dayopenhour' => $dayopenhour,
			'openingtime' => $timestart,
			'closingtime' => $timeend,
			'hno' => $hno_garage,
			'Alley' => $alley_garage,
			'road' => $road_garage,
			'village' => $village_garage,
			'provinceId' => $provinceId_garage,
			'districtId' => $districtId_garage,
			'subdistrictId' => $subdistrictId_garage,
			'postCode' => $postCode_garage,
			'latitude'=> $latitude,
			'longtitude' => $longtitude,
			'option1' => $Wifi,
			'option2' => $roomfan,
			'option3' => $roomAir,
			'option4' => $snack,
			'option_outher' => $Otherfacilities,
			'picture' => $imageName,
			'create_by' => null,
			'update_by' => null,
			'create_at' => date('Y-m-d H:i:s',time()),
			'update_at' => null,
			'status' => 1,
			'userId' => null
		);
		$option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->user,
            "image_path" => null
        ];
		$this->set_response(decision_create($option), REST_Controller::HTTP_OK);
	}

}