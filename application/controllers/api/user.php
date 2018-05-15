<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

    }

    function deleteUser_get(){
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