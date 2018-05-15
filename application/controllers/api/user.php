<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        //$this->auth();
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 =>'username', 
            2 =>'phone',
            3 =>'email'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("User");
        $totalData = $this->user->allUser_count();

        $totalFiltered = $totalData; 
        
        if(empty($this->post('username')) || empty($this->post('phone')) || empty($this->post('email')))
        {            
            $posts = $this->User->allUser($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('username');
            $search = $this->post('phone');
            $search = $this->post('email'); 

            $posts =  $this->User->user_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->User->user_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['Id'] = $post->Id;
                $nestedData['username'] = $post->username;
                $nestedData['phone'] = $post->phone;
                $nestedData['email'] = $post->email;

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
    

    function createUser_post(){

        $Id = $this->post("Id");

        $data = array(
            'Id' => $Id,
            'status' => 1
        );

        
        $this->load->model("User");
        $isCheck = $this->User->User_search($data);
        if($isCheck){
            $result = $this->User->insert_User($data);
            $output["status"] = $result;
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
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function createUser_post(){

        $Id = $this->post("Id");
        $username = $this->post("username");
        $phone = $this->post("phone");
        $email = $this->post("email");
        
       

        $this->load->model("User");
        $isCheck = $this->Model->get_checkUser($Id,$username,$phone,$email);

        if($isCheck){
            $data = array(
                'Id' => null,
                'username' => $username,
                'phone' => $phone,
                'email' => $email,
                'status' => 1,
               
            );
            $result = $this->User->insert_user($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }

        }
        else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }


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