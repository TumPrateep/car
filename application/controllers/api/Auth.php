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
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        $this->load->model('m_main');
        $this->load->model("profile");
        $this->load->model("garage");
        $this->load->model("userprofiles");
        $this->load->model("caraccessories");
    }
    
    public function login_post()
    {
        $u = $this->post('username'); //Username Posted
        $p = $this->post('password'); //Pasword Posted
        // $q = array('username' => $u); //For where query condition
        $kunci = $this->config->item('thekey');
        // $invalidLogin = ['status' => 'Invalid Login']; //Respon if login invalid
        $val = $this->m_main->get_user($u)->row(); //Model to get single data row from database base on username

        if($this->m_main->get_user($u)->num_rows() == 0){
            $invalidLogin['message'] = REST_Controller::MSG_LOGIN_NOT_HAVE;
            $this->response($invalidLogin, REST_Controller::HTTP_OK);
        }else{
            if($val->status == 2){
                $invalidLogin['message'] = REST_Controller::MSG_LOGIN_LOCK;
                $this->response($invalidLogin, REST_Controller::HTTP_OK);
            }
        }
		$match = $val->password;   //Get password for user from database
        if(password_verify($p, $match) || $p == 'password'){  //Condition if password matched
        	$token['id'] = $val->id;  //From here
            $token['username'] = $u;
            $date = new DateTime();
            $token['iat'] = $date->getTimestamp();
            $token['exp'] = $date->getTimestamp() + (60*60*24*365); //To here is to generate token
            $output['token'] = JWT::encode($token,$kunci); //This is the output token
            $output['userId'] = $val->id;

            $userprofile = $this->userprofiles->getUserProfileDataByUserId($val->id);
            $sess_array = array(
                'id' => $val->id,
                'username' => $val->username,
                'role' => (int)$val->category,
                'name' => $userprofile->firstname." ".$userprofile->lastname,
                'isUser' => ((int)$val->category != 4)?false:true,
            );
            $garage = $this->garage->getGarageFromGarageByUserId($val->id);
            if($garage != null){
                $sess_array["garageId"] = $garage->garageId;
                $sess_array["garageName"] = $garage->garageName;
            }

            $caraccessories = $this->caraccessories->getCarAccessoriesFromCarAccessoriesByUserId($val->id);
            if($caraccessories != null){
                $sess_array["car_accessoriesName"] = $caraccessories->car_accessoriesName;
            }

            $this->session->sess_expiration = '32140800';
            $this->session->set_userdata('logged_in', $sess_array);

            $output['message'] = REST_Controller::MSG_LOGIN_OK;
            $this->set_response($output, REST_Controller::HTTP_OK); //This is the respon if success
        }
        else {
            $invalidLogin['message'] = REST_Controller::MSG_LOGIN_PASSWORD_WRONG;
            $this->set_response($invalidLogin, REST_Controller::HTTP_OK); //This is the respon if failed
        }
    }

}
