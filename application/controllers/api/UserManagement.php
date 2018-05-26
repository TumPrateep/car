<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 =>'username', 
            2 =>'phone',
            3 =>'email',
            4=>'category',
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("User");
        $totalData = $this->User->allUser_count();

        $totalFiltered = $totalData; 
        
        if(empty($this->post('search')))
        {            
            $posts = $this->User->allUser($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('search'); 

            $posts =  $this->User->user_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->User->user_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['id'] = $post->id;
                $nestedData['username'] = $post->username;
                $nestedData['phone'] = $post->phone;
                $nestedData['email'] = $post->email;
                switch($post->category){
                    case "1" : $nestedData['category'] ="ผู้ดูแลระบบ";break;
                    case "2" : $nestedData['category'] ="ร้านอะไหล่";break;
                    case "3" : $nestedData['category'] ="อู่";break;
                    case "4" : $nestedData['category'] ="ผู้ใช้งาน";break;
                    default  : $nestedData['category'] =" ";break;

                    
                }

                $data[] = $nestedData;

            }
        }

        $json_data = array(
            "draw"            => intval($this->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );

        $this->set_response($json_data);
    }

    function delete_get(){
        $id = $this->get('id');
        
        $this->load->model("User");
        $user = $this->User->getUser($id);
        if($user != null){
            $isDelete = $this->User->delete($id);
            if($isDelete){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_USED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }


    function create_post(){

        $username = $this->post('username');
        $email = $this->post('email');
        $phone = $this->post('phoneNumber');
        $password = password_hash("password", PASSWORD_BCRYPT);

        $this->load->model("User");
        $isCheck = $this->User->checkUser($username);
        if($isCheck){
            $data = array(
                'id' => null,
                'username' => $username,
                'email' => (empty($email))?null:$email,
                'phone' => $phone,
                'password' => $password, 
                'category' => null
            );
            $result = $this->User->insert_user($data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }
        else{
            $output["status"] = false;
            $output["data"] = "username ซ้ำ";
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

    }

    function userTypeAndData_post(){
        $role = (int)$this->post("role");

        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $firstname = $this->post("firstname");
        $lastname = $this->post("lastname");
        $address = $this->post("address");
        $provinceId = $this->post("provinceId");
        $districtId = $this->post("districtId");
        $subdistrictId = $this->post("subdistrictId");
        $phone1 = $this->post("phone1");
        $phone2 = $this->post("phone2");
        $titleName = $this->post("titleName");

        $userId = $this->session->userdata['logged_in']['id'];

        $this->load->model("Profile");
    
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
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'userId' => $userId
        );

        if($role == 3){
            $path = 'public/image/garage/'.$userId;
            mkdir($path);
            $config['upload_path'] = $path;

            $garageName = $this->post("garageName");
            $businessRegistration = $this->post("businessRegistration");
            $postCode = $this->post("postCode");
            $latitude = $this->post("latitude");
            $longtitude = $this->post("longtitude");
            $comment = $this->post("comment");
            $option1 = $this->post("box1");
            $option2 = $this->post("box2");
            $option3 = $this->post("box3");
            $option4 = $this->post("box4");
            $option_outher = $this->post("other");
            $garageAddress = $this->post("garageAddress");
            $provinceId = $this->post("provinceId");
            $districtId = $this->post("districtId");
            $subdistrictId = $this->post("subdistrictId");
            $garagePicture = $this->post("garagePicture");

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
                }      
            }

            $roleData = array(
                'garageId' => null,
                'garageName' => $garageName,
                'businessRegistration' => $businessRegistration,
                'province_provinceId' => $provinceId, 
                'districtId' => $districtId,
                'subdistrictId' => $subdistrictId,
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
                'create_at' => date('Y-m-d H:i:s',time()),
                'update_at' => null,
                'create_by' => $userId,
                'update_by' => null,
                'status' => 1,
                'garageMaster' => $userId,
                'garagePicture' => $garagePictureName,
                'approve' => 2
            );
        }else if($role == 2){
            $car_accessoriesName = $this->post("car_accessoriesName");
            $businessRegistrationAccessories = $this->post("businessRegistrationAccessories");
            $roleData = array(
                'car_accessoriesId' => null,
                'car_accessoriesName' => $car_accessoriesName,
                'businessRegistration' => $businessRegistrationAccessories,
                'userId' => $userId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'update_at' => null,
                'update_by' => null,
                'status' => 1  
            );
        }else if($role == 4){
            $path = 'public/image/car_profile/'.$userId;
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
            if($frontPicture != "undefined"){
                if ( ! $this->upload->do_upload("frontPicture")){
                    $error = array('error' => $this->upload->display_errors());
                    $output["message"] = REST_Controller::MSG_ERROR;
                    $output["data"] = $error;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    $imageDetailArray = $this->upload->data();
                    $pictureFrontName =  $imageDetailArray['file_name'];
                }      
            }

            if($backPicture != "undefined"){
                if ( ! $this->upload->do_upload("backPicture")){
                    $error = array('error' => $this->upload->display_errors());
                    $output["message"] = REST_Controller::MSG_ERROR;
                    $output["data"] = $error;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    $imageDetailArray = $this->upload->data();
                    $pictureBackName =  $imageDetailArray['file_name'];
                }
            }

            if($circlesignPicture != "undefined"){
                if ( ! $this->upload->do_upload("circlesignPicture")){
                    $error = array('error' => $this->upload->display_errors());
                    $output["message"] = REST_Controller::MSG_ERROR;
                    $output["data"] = $error;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    $imageDetailArray = $this->upload->data();
                    $circlePlateName =  $imageDetailArray['file_name'];
                }
            }
            $roleData = array(
                "car_profileId" => null,
                "mileage" => $mileage,
                "pictureFront" => $pictureFrontName,
                "pictureBack" => $pictureBackName,
                "circlePlate" => $circlePlateName,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId,
                "userId" => $userId,
                "update_at" => null,
                "update_by" => null,
                "status" => 1,
                "character_plate" => $characterPlate,
                "number_plate" => $numberPlate,
                "province_plate" => $provincePlate,
                "color" => $colorCar
            );
        }else{
            $roleData = null;
        }

        $result = $this->Profile->saveProfileRoleUser($role, $userId, $profileData, $roleData);
        if($result){
            $sess_array = array(
                'role' => $role
            );
            $this->session->set_userdata('logged_in', $sess_array);
            $output["message"] = REST_Controller::MSG_SUCCESS;
        }else{
            $output["message"] = REST_Controller::MSG_ERROR;
        }
        $this->set_response($output, REST_Controller::HTTP_OK);

    }

}