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

    function delete($id){
        $this->db->where_not_in("username" , "admin");
        return $this->db->delete('users', array('id' => $id));
    }
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d0a89dcb4140f9d621d31dac1b82e2d53d991103

    function insertUserprofile($data){
        return $this->db->insert('user_profile', $data);
    }

<<<<<<< HEAD
    
=======
    function checkUserid($users_id){
        $this->db->select("users_id");
        $this->db->from("user_profile");
        $this->db->where('users_id', $users_id);
        
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }
=======
>>>>>>> 93560fe652c9fa7f00ea3c8e77bd5ae8962ffe05
>>>>>>> d0a89dcb4140f9d621d31dac1b82e2d53d991103
	
}