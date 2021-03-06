<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Usermanagement extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("user");
        $this->load->model("profile");
        $this->load->model("location");
    }

    public function search_post()
    {
        $columns = array(
            0 => null,
            1 => 'username',
            2 => 'phone',
            3 => 'status',
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->user->allUser_count();

        $totalFiltered = $totalData;

        if (empty($this->post('search')) && empty($this->post('typeUser')) && empty($this->post('status'))) {
            $posts = $this->user->allUser($limit, $start, $order, $dir);
        } else {
            $search = $this->post('search');
            $userType = $this->post('typeUser');
            $status = $this->post('status');

            $posts = $this->user->user_search($limit, $start, $search, $userType, $status, $order, $dir);

            $totalFiltered = $this->user->user_search_count($search, $userType, $status);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['id'] = $post->id;
                $nestedData['username'] = $post->username;
                $nestedData['phone'] = $post->phone;
                $nestedData['email'] = $post->email;
                switch ($post->category) {
                    case 1:$nestedData['category'] = "ผู้ดูแลระบบ";
                        break;
                    case 2:$nestedData['category'] = "ร้านอะไหล่";
                        break;
                    case 3:$nestedData['category'] = "อู่";
                        break;
                    case 4:$nestedData['category'] = "ผู้ใช้งาน";
                        break;
                    default:$nestedData['category'] = null;
                        break;
                }
                $nestedData['status'] = $post->status;

                $data[] = $nestedData;

            }
        }

        $json_data = array(
            "draw" => intval($this->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );

        $this->set_response($json_data);
    }

    public function delete_get()
    {
        $id = $this->get('id');

        $user = $this->user->getUser($id);
        if ($user != null) {
            $isDelete = $this->user->delete($id);
            if ($isDelete) {
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            } else {
                $output["message"] = REST_Controller::MSG_BE_USED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        } else {
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    public function create_post()
    {

        $username = $this->post('username');
        $email = $this->post('email');
        $phone = $this->post('phoneNumber');
        $password = password_hash("password", PASSWORD_BCRYPT);

        $data_check = $this->user->data_check_create($username, $phone);
        if ($data_check == null) {
            $data = array(
                'id' => null,
                'username' => $username,
                'email' => (empty($email)) ? null : $email,
                'phone' => $phone,
                'password' => $password,
                'category' => null,
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
            $output["data"] = "username หรือ เบอร์โทรศัพท์ซ้ำ";
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

    }

    public function userTypeAndData_post()
    {
        $role = (int) $this->post("role");

        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        $config['overwrite'] = true;
        $config['encrypt_name'] = true;
        $config['remove_spaces'] = true;

        $firstname = $this->post("firstname");
        $lastname = $this->post("lastname");
        $address = $this->post("address");
        $provinceId = $this->post("provinceId");
        $districtId = $this->post("districtId");
        $subdistrictId = $this->post("subdistrictId");
        $phone1 = $this->post("phone1");
        $phone2 = $this->post("phone2");
        $titleName = $this->post("titleName");
        $userId = $this->post("userId");
        $currentUser = $this->session->userdata['logged_in']['id'];

        $profileData = array(
            'user_profile' => null,
            'titleName' => $titleName,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'status' => 1,
            'address' => $address,
            'phone1' => $phone1,
            'phone2' => $phone2,
            'provinceId' => $provinceId,
            'districtId' => $districtId,
            'subdistrictId' => $subdistrictId,
            'create_by' => $currentUser,
            'create_at' => date('Y-m-d H:i:s', time()),
            'userId' => $userId,
        );

        if ($role == 3) {
            $path = 'public/image/garage/' . $userId;
            // mkdir($path);
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

            if ($garagePicture != "undefined") {
                if (!$this->upload->do_upload("garagePicture")) {
                    $error = array('error' => $this->upload->display_errors());
                    $output["message"] = REST_Controller::MSG_ERROR;
                    $output["data"] = $error;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                } else {
                    $imageDetailArray = $this->upload->data();
                    $garagePictureName = $imageDetailArray['file_name'];
                }
            }

            $roleData = array(
                'garageName' => $garageName,
                'businessRegistration' => $businessRegistration,
                'provinceId' => $gprovinceId,
                'districtId' => $gdistrictId,
                'subdistrictId' => $gsubdistrictId,
                'garageAddress' => $garageAddress,
                'postCode' => $postCode,
                'latitude' => $latitude,
                'longtitude' => $longtitude,
                'comment' => $comment,
                'option1' => $option1,
                'option2' => $option2,
                'option3' => $option3,
                'option4' => $option4,
                'option_outher' => $option_outher,
                'create_at' => date('Y-m-d H:i:s', time()),
                'update_at' => null,
                'create_by' => $currentUser,
                'update_by' => null,
                'status' => 1,
                'garagePicture' => $garagePictureName,
                'approve' => 2,
                'firstname' => $firstnameGarage,
                'lastname' => $lastnameGarage,
                'idcard' => $idcardGarage,
                'addressGarage' => $addressGarage,
                'userId' => $userId,
            );
        } else if ($role == 2) {
            $car_accessoriesName = $this->post("car_accessoriesName");
            $businessRegistrationAccessories = $this->post("businessRegistrationAccessories");
            $sparepart_firstname = $this->post("sparepart-firstname");
            $sparepart_lastname = $this->post("sparepart-lastname");
            $sparepart_idcard = $this->post("sparepart-idcard");
            $sparepart_address = $this->post("sparepart-address");
            $sparepart_postCode = $this->post("sparepart-postCode");
            $sparepart_provinceId = $this->post("sparepart-provinceId");
            $sparepart_districtId = $this->post("sparepart-districtId");
            $sparepart_subdistrictId = $this->post("sparepart-subdistrictId");

            $roleData = array(
                'car_accessoriesName' => $car_accessoriesName,
                'businessRegistration' => $businessRegistrationAccessories,
                'userId' => $userId,
                'create_at' => date('Y-m-d H:i:s', time()),
                'create_by' => $currentUser,
                'update_at' => null,
                'update_by' => null,
                'status' => 1,
                'firstname' => $sparepart_firstname,
                // 'lastname' => $sparepart_lastname,
                'idcard' => $sparepart_idcard,
                'address' => $sparepart_address,
                'postCode' => $sparepart_postCode,
                'provinceId' => $sparepart_provinceId,
                'districtId' => $sparepart_districtId,
                'subdistrictId' => $sparepart_subdistrictId,
            );
        } else if ($role == 4) {
            $path = "public/image/profile/$userId";
            mkdir($path);
            $config['upload_path'] = $path;

            $frontPicture = $this->post("frontPicture");
            $backPicture = $this->post("backPicture");
            $circlesignPicture = $this->post("circlesignPicture");
            $characterPlate = $this->post("characterPlate");
            $numberPlate = $this->post("numberPlate");
            $provincePlate = $this->post("provincePlate");
            $mileage = $this->post("mileage");
            $colorCar = $this->post("colorCar");

            $this->load->library('upload', $config);
            $pictureFrontName = null;
            $pictureBackName = null;
            $circlePlateName = null;
            if ($frontPicture != "undefined") {
                if (!$this->upload->do_upload("frontPicture")) {
                    $error = array('error' => $this->upload->display_errors());
                    $output["message"] = REST_Controller::MSG_ERROR;
                    $output["data"] = $error;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                } else {
                    $imageDetailArray = $this->upload->data();
                    $pictureFrontName = $imageDetailArray['file_name'];
                }
            }

            if ($backPicture != "undefined") {
                if (!$this->upload->do_upload("backPicture")) {
                    $error = array('error' => $this->upload->display_errors());
                    $output["message"] = REST_Controller::MSG_ERROR;
                    $output["data"] = $error;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                } else {
                    $imageDetailArray = $this->upload->data();
                    $pictureBackName = $imageDetailArray['file_name'];
                }
            }

            if ($circlesignPicture != "undefined") {
                if (!$this->upload->do_upload("circlesignPicture")) {
                    $error = array('error' => $this->upload->display_errors());
                    $output["message"] = REST_Controller::MSG_ERROR;
                    $output["data"] = $error;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                } else {
                    $imageDetailArray = $this->upload->data();
                    $circlePlateName = $imageDetailArray['file_name'];
                }
            }
            $roleData = array(
                "mileage" => $mileage,
                "pictureFront" => $pictureFrontName,
                "pictureBack" => $pictureBackName,
                "circlePlate" => $circlePlateName,
                "create_at" => date('Y-m-d H:i:s', time()),
                "create_by" => $currentUser,
                "userId" => $userId,
                "update_at" => null,
                "update_by" => null,
                "status" => 1,
                "character_plate" => $characterPlate,
                "number_plate" => $numberPlate,
                "province_plate" => $provincePlate,
                "color" => $colorCar,
            );
        } else {
            $roleData = null;
        }

        $result = $this->profile->saveProfileRoleUser($role, $userId, $profileData, $roleData);
        if ($result) {
            // $this->load->model("User");
            // $userData = $this->User->getuserById($currentUser);
            // $sess_array = array(
            //     'id' => $currentUser,
            //     'username' => $userData->username,
            //     'role' => (int)$userData->category,
            //     'name' => $userData->firstname." ".$userData->lastname
            // );
            // $this->session->set_userdata('logged_in', $sess_array);
            $output["message"] = REST_Controller::MSG_SUCCESS;
        } else {
            $output["message"] = REST_Controller::MSG_ERROR;
        }
        $output['userId'] = $userId;
        $this->set_response($output, REST_Controller::HTTP_OK);

    }

    public function changeStatus_post()
    {
        $id = $this->post("id");
        $status = $this->post("status");
        if ($status == 1) {
            $status = 2;
        } else {
            $status = 1;
        }
        $data = array(
            'status' => $status,
        );
        $result = $this->user->updateStatus($id, $data);
        if ($result) {
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    public function getuser_post()
    {

        $id = $this->post('id');
        $isCheck = $this->user->check_User($id);

        if ($isCheck) {
            $output["status"] = true;
            $result = $this->user->getuserById($id);
            if ($result != null) {
                $output["data"] = $result;
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            } else {
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_BE_DELETED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        } else {
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    public function updateUser_post()
    {

        $id = $this->post('id');
        $username = $this->post('username');
        $phone = $this->post('phone');
        $email = $this->post('email');
        $userId = $this->session->userdata['logged_in']['id'];
        $result = $this->user->wherenotUser($id, $username);

        if ($result) {
            $data = array(
                'id' => $id,
                'username' => $username,
                'phone' => $phone,
                'email' => $email,
                'update_at' => date('Y-m-d H:i:s', time()),
                'update_by' => $userId,
            );
            $result = $this->user->updateUser($data);
            $output["status"] = $result;
            if ($result) {
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            } else {
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        } else {
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    public function getusers_post()
    {

        $userId = $this->post('userId');
        $user = $this->user->getUser($userId);
        if ($user != null) {
            $result = $this->profile->findUserProfileByIdAndStatusActive($userId);
            if ($result != null) {
                $result->provinceName = $this->location->getProvinceNameByProvinceId($result->provinceId);
                $result->districtName = $this->location->getDistrictNameByDistrictId($result->districtId);
                $result->subdistrictName = $this->location->getSubDistrictBySubDistrictId($result->subdistrictId);
            }
            $result->create_at = REST_Controller::DateThai($result->create_at);
            // $result->create_at = date_format($date,"d/m/Y H:i:s");
            $output["profile"] = $result;
            $output["role"] = $user->category;
            $output["other"] = $this->getUserData((int) $user->category, $userId);
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

    }

    public function getUserData($role, $userId)
    {
        $this->load->model("garage");
        $this->load->model("caraccessories");
        $data = null;
        if ($role == 4) {
            $data = $this->user->getdataCar_profileById($userId);
            $data->provincePlateName = $this->location->getProvinceNamePlateByProvinceId($data->province_plate);
        } else if ($role == 3) {
            // อู่
            $data = $this->garage->getGarageFromGarageByUserId($userId);
            $data->provinceName = $this->location->getProvinceNameByProvinceId($data->provinceId);
            $data->districtName = $this->location->getDistrictNameByDistrictId($data->districtId);
            $data->subdistrictName = $this->location->getSubDistrictBySubDistrictId($data->subdistrictId);
        } else if ($role == 2) {
            // ร้านอะไหล่
            $data = $this->caraccessories->getCarAccessoriesFromCarAccessoriesByUserId($userId);
            $data->provinceName = $this->location->getProvinceNameByProvinceId($data->provinceId);
            $data->districtName = $this->location->getDistrictNameByDistrictId($data->districtId);
            $data->subdistrictName = $this->location->getSubDistrictBySubDistrictId($data->subdistrictId);
        } else {
            $data = null;
        }
        return $data;
    }

}