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
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
        else{
            $output["status"] = false;
            $output["data"] = "username ซ้ำ";
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }

    }

}