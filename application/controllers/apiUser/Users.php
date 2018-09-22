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
			'password' => $password,
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
			'firstname1' => $firstname1,
			'lastname1' => $lastname1,
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

}