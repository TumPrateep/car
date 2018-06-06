<?php 

if(!defined('BASEPATH')) exit('No direct script allowed');

class User extends CI_Model{

    function allUser_count()
    {   
        $query = $this->db->get('users');
    
        return $query->num_rows();  

    }
    
    function allUser($limit,$start,$col,$dir)
    {   
        
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('users');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function user_search($limit,$start,$search,$col,$dir,$id)
    {
        $this->db->where("id", $id);
        $query = $this
                ->db
                ->like('username',$search)
                ->or_like('email',$search)
                ->or_like('phone',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('users');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function user_search_count($search)
    {
        $query = $this
                ->db
                ->like('username',$search)
                ->or_like('email',$search)
                ->or_like('phone',$search)
                ->get('users');
    
        return $query->num_rows();
    }

	function insert_user($data){
		return $this->db->insert('users', $data);
    }
    
    function checkUser($username){
        $this->db->select("username");
        $this->db->from("users");
        $this->db->where("username", $username);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }
    
    function check_User($id){
        $this->db->where('id',$id);
        $result = $this->db->get('users')->row();
        return $result;
    }

    function wherenot($id,$users){
        $this->db->select("users");
        $this->db->from("users");
        $this->db->where('id', $id);
        $this->db->where('users', $users);
        $this->db->where_not_in('id', $id);
        
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function getUser($id){
        $this->db->where('id',$id);
        $result = $this->db->get('users')->row();
        return $result;
    }

    function getuserById($id){
        $this->db->select("id,username,email,phone");
        return $this->db->where('id',$id)->get("users")->row();
    }

    function delete($id){
        $this->db->where_not_in("username" , "admin");
        return $this->db->delete('users', array('id' => $id));
    }


    function insertUserprofile($data){
        return $this->db->insert('user_profile', $data);
    }


    function checkUserid($userId){
        $this->db->select("userId");
        $this->db->from("user_profile");
        $this->db->where('userId', $userId);
        
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }

    function insert_role4($data){
        return $this->db->insert('car_profile', $data);
    }

    function insert_role3($data){
        return $this->db->insert('garage', $data);
    }
    
    function insert_role2($data){
        return $this->db->insert('car_accessories', $data);
    }

    function updateStatus($id,$data){
        $this->db->where('id',$id);
        $result = $this->db->update('users', $data);
        return $result; 
    }

    function wherenotUser($id,$username){
        $this->db->select("username");
        $this->db->from("users");
        $this->db->where('id', $id);
        $this->db->where_not_in('id', $id);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }
    function updateUser($data){
        $this->db->where('id',$data['id']);
        $result = $this->db->update('users', $data);
        return $result; 
    }

    function getuserprofile($use_profile){
        $this->db->select("firstname,lastname,phone1,phone2,provinceId,districtId,subdistrictId,address,titleName");
        return $this->db->where('user_profile',$user_profile)->get("user_profile")->row();
    }

    function getuserprofileById($userId){
        $this->db->select("firstname,lastname,phone1,phone2,provinceId,districtId,subdistrictId,address,titleName");
        return $this->db->where('userId',$userId)->get("user_profile")->row();
    }

    function checkCar_profile($userId){
        $this->db->select("userId");
        $this->db->from("car_profile");
        $this->db->where('userId', $userId);
        
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }
    function getCar_profileById($userId){
        $this->db->select("mileage,pictureFront,pictureBack,circlePlate,province_plate,character_plate,number_plate,color");
        return $this->db->where('userId',$userId)->get("car_profile")->row();
    }

    

    

}