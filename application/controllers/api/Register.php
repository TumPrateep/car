<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model("user");
    }

    function register_post(){

        $username = $this->post('username');
        $email = $this->post('email');
        $phone = $this->post('phone');
        $password = $this->post('password');
        $p = password_hash($password, PASSWORD_BCRYPT);

        $firstname = $this->post('firstname');
        $lastname = $this->post('lastname');

        $isCheck = $this->user->data_check_create($username,$phone);
        if($isCheck == null){
            $data['users'] = array(
                'id' => null,
                'username' => $username,
                'email' => (empty($email))?null:$email,
                'phone' => $phone,
                'password' => $p, 
                'category' => 4,
                'status' => 1,
                'create_at' => date('Y-m-d H:i:s',time())
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
                'create_at' => date('Y-m-d H:i:s',time()),
                'update_at' => null,
                'userId' => null,
                'status' => 1,
                'activeFlag' => 1
            );
            $result = $this->user->insert_user($data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["status"] = false;
            $output["data"] = "username ซ้ำ";
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }

    }

    // function create_post(){
    //     $name = $this->post('brandname');
    //     $this->load->model("brand");
    //     $isCheck = $this->brand->checkBrand($name);
    //     if($isCheck){
    //         $output["status"] = true;
    //         $this->set_response($output, REST_Controller::HTTP_OK);
    //     }else{
    //         $output["status"] = false;
    //         $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
    //     }
    // }
    
}