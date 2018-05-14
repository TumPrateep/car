<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

    }

    function register_post(){

        $username = $this->post('username');
        $email = $this->post('email');
        $phone = $this->post('phone');
        $password = $this->post('password');
        $p = password_hash($password, PASSWORD_BCRYPT);

        $this->load->model("User");
        $isCheck = $this->User->checkUser($username);
        if($isCheck){
            $data = array(
                'id' => null,
                'username' => $username,
                'email' => $email,
                'phone' => $phone,
                'password' => $p, 
                'categolory' => null
            );
            $this->User->insert_user($data);
            $output["status"] = true;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
        else{
            $output["status"] = false;
            $output["data"] = "username ซ้ำ";
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }

    }

    function create_post(){
        $name = $this->post('brandname');
        $this->load->model("brand");
        $isCheck = $this->brand->checkBrand($name);
        if($isCheck){
            $output["status"] = true;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["status"] = false;
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    
}