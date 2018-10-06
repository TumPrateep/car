<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Auth extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        // $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        // $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('tempuser');
        $this->load->model("user");
    }

    public function googleAuth_post(){
        $email = $this->post('email');
        $name = $this->post('name');
        $firstname = $this->post('firstname');
        $lastname = $this->post('lastname');
        $data = [
            "email" => $email,
            "name" => $name,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "create_at" => date('Y-m-d H:i:s',time())
        ];

        $userData = $this->checkUser($email);
        if($userData != null){
            $this->login($userData);
        }else{
            $tempUserData = $this->checkTempUser($email);
            if($tempUserData != null){
                $this->tempLogin($tempUserData);
            }else{
                $isTrue = $this->saveUser($data);
                if($isTrue){
                    $tempUserData = $this->checkTempUser($email);
                    $this->tempLogin($tempUserData);
                }else{
                    $invalidLogin['message'] = REST_Controller::MSG_LOGIN_NOT_HAVE;
                    $this->set_response($invalidLogin, REST_Controller::HTTP_OK);
                }
            }
        }

    }

    public function facebookAuth_post(){
        $email = $this->post('email');
        $name = $this->post('name');
        $firstname = $this->post('firstname');
        $lastname = $this->post('lastname');
        $data = [
            "email" => $email,
            "name" => $name,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "create_at" => date('Y-m-d H:i:s',time())
        ];

        $userData = $this->checkUser($email);
        if($userData != null){
            $this->login($userData);
        }else{
            $tempUserData = $this->checkTempUser($email);
            if($tempUserData != null){
                $this->tempLogin($tempUserData);
            }else{
                $isTrue = $this->saveUser($data);
                if($isTrue){
                    $tempUserData = $this->checkTempUser($email);
                    $this->tempLogin($tempUserData);
                }else{
                    $invalidLogin['message'] = REST_Controller::MSG_LOGIN_NOT_HAVE;
                    $this->set_response($invalidLogin, REST_Controller::HTTP_OK);
                }
            }
        }

    }

    public function checkTempUser($email){
        return $this->tempuser->getTempUserByEmail($email);
    }

    public function checkUser($email){
        return $this->user->getUserByEmail($email);
    }

    public function saveUser($data){
        $option = [
            "data_check" => null,
            "data" => $data,
            "model" => $this->tempuser,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function tempLogin($data){
        $sess_array = array(
            'id' => $data->tempUserId,
            'role' => 4,
            'name' => $data->name,
            'isUser' => true
        );
        $this->session->set_userdata('logged_in', $sess_array);

        $output['message'] = REST_Controller::MSG_LOGIN_OK;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function login($data){
        $kunci = $this->config->item('thekey');

        if($data->status == 2){
            $invalidLogin['message'] = REST_Controller::MSG_LOGIN_LOCK;
            $this->response($invalidLogin, REST_Controller::HTTP_OK);
        }
        
        $token['id'] = $data->id;  //From here
        $token['username'] = $data->username;
        $date = new DateTime();
        $token['iat'] = $date->getTimestamp();
        $token['exp'] = $date->getTimestamp() + 60*60*5; //To here is to generate token
        $output['token'] = JWT::encode($token,$kunci); //This is the output token
        $output['userId'] = $data->id;

        $sess_array = array(
            'id' => $data->id,
            'username' => $data->username,
            'role' => (int)$data->category,
            'name' => $data->username,
            'isUser' => ((int)$data->category != 4)?false:true
        );
        $this->session->set_userdata('logged_in', $sess_array);

        $output['message'] = REST_Controller::MSG_LOGIN_OK;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}
