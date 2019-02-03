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

		$titleName = $this->post('titleName');
		$firstname1 = $this->post('firstname1');
		$lastname1 = $this->post('lastname1');
		$address = $this->post('address');
		$provinceId = $this->post('provinceId');
		$districtId = $this->post('districtId');
		$subdistrictId = $this->post('subdistrictId');
		$postCodes = $this->post('postCodes');
		$phone1 = $this->post('phone1');
		$phone2 = $this->post('phone2');

		$car_accessoriesName = $this->post('car_accessoriesName');
		$businessRegistration = $this->post('businessRegistration');
		$firstname = $this->post('firstname');
		$idcard = $this->post('idcard');
		$address1 = $this->post('address1');
		$sparepart_provinceId = $this->post('sparepart_provinceId');
		$sparepart_districtId = $this->post('sparepart_districtId');
		$sparepart_subdistrictId = $this->post('sparepart_subdistrictId');
		$postCode1 = $this->post('postCode1');
		$latitude = $this->post('latitude');
		$longitude = $this->post('longitude');

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
			'titleName' => $titleName,
			'firstname' => $firstname1,
			'lastname' => $lastname1,
			'address' => $address,
			'provinceId' => $provinceId,
			'districtId' => $districtId,
			'subdistrictId' => $subdistrictId,
			'postCodes' => $postCodes,
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
			'firstname' => $firstname,
			'idcard' => $idcard,
			'address' => $address1,
			'provinceId' => $sparepart_provinceId,
			'districtId' => $sparepart_districtId,
			'subdistrictId' => $sparepart_subdistrictId,
			'postCode' => $postCode1,
			'latitude'=> $latitude,
			'longitude' => $longitude,
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
		$skill = $this->post('skill');

		$garagePicture = $this->post('garagePicture');
		$garagename = $this->post('garagename');
		$phone_garage = $this->post('phone_garage');
		$businessRegistration = $this->post('businessRegistration');
		// $dayopenhour = $this->post('dayopenhour');
		$daym = $this->post('monday');
		if (empty($daym)) {$daym == 1;} else {$daym == 0;}
		
		$dayt = $this->post('tuesday');
		if (empty($dayt)) {$dayt == 1;} else {$dayt == 0;}
		$dayw = $this->post('wednesday');
		if (empty($dayw)) {$dayw == 1;} else {$dayw == 0;}
		$dayth = $this->post('thursday');
		if (empty($dayth)) {$dayth == 1;} else {$dayth == 0;}
		$dayf = $this->post('friday');
		if (empty($dayf)) {$dayf == 1;} else {$dayf == 0;}
		$dayst = $this->post('saturday');
		if (empty($dayst)) {$dayst == 1;} else {$dayst == 0;}
		$days = $this->post('sunday');
		if (empty($days)) {$days == 1;} else {$days == 0;}
		$daya = $this->post('allday');
		if (empty($daya)) {$daya == 1;} else {$daya == 0;}
		$dayopenhour = $daym.$daytues.$dayw.$dayth.$dayf.$dayst.$days.$daya;

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
		$data_check = $this->user->data_check_create($username,$phone_user);
		$data_check = $this->user->data_check_garage_create($businessRegistration );
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
			'firstname' => $firstname_mechanic,
			'lastname' => $lastname_mechanic,
			'exp' => $exp,
			'personalid' => $personalid_mechanic,
			'skill' => $skill,
			'phone' => $phone_mechanic,
			'create_by' => null,
			'update_by' => null,
			'create_at' => date('Y-m-d H:i:s',time()),
			'update_at' => null,
			'garageId' => null,
			'status' => 1,
			'role' => 1,
			'activeFlag' => 1
		);
		$data['garage'] = array(
			'garageId' => null,
			'garageName' => $garagename,
			'businessRegistration' => $businessRegistration,
			'comment' => null,
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
			'garagePicture' => $garagePicture,
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