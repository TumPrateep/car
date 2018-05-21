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
                    case "1" : $nestedData['category'] ="admin";break;
                    case "2" : $nestedData['category'] ="caraccessory";break;
                    case "3" : $nestedData['category'] ="garage";break;
                    case "4" : $nestedData['category'] ="user";break;
                    default  : $nestedData['category'] ="no category";break;

                    
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

    function createUserprofile_post(){

        //date_default_timezone_set('Asia/Bangkok');

        $firstname = $this->post("firstname");
        $lastname = $this->post("lastname");
        $address = $this->post("address");
        $provinceId = $this->post("provinceId");
        $districtId = $this->post("districtId");
        $subdistrictId = $this->post("subdistrictId");
        $phone1 = $this->post("phone1");
        $phone2 = $this->post("phone2");
        // $create_by = $this->post("create_by");
        // $update_by = $this->post("update_by");

        $create_by = $this->session->userdata['logged_in']['id'];
        
       
        $this->load->model("User");
        $this->db->trans_start();
        $data = array(
            'user_profile' => null,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'status' => 1,
            'address' => $address,
            'phone1' => $phone1, 
            'phone2' => $phone2,
            'provinceId' => $provinceId, 
            'districtId' => $districtId,
            'subdistrictId' => $subdistrictId,
            'create_by' => $create_by,
            'update_by' => null,
            'create_add' => date('Y-m-d H:i:s',time()),
            'update_add' => date('Y-m-d H:i:s',time())
        );

        $result = $this->User->insertUserprofile($data);


        $this->db->trans_complete();
        if($result){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_NOT_CREATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
        
        
    }
    
}