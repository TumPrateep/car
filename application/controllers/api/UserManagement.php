<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserManagement extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
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
        $phone = $this->post('phone');
        $password = "password";

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
            $this->set_response($output, REST_Controller::HTTP_NOT_FOUND);
        }

    }
    
}