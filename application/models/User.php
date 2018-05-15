<?php 

if(!defined('BASEPATH')) exit('No direct script allowed');

class User extends CI_Model{
    function allUser_count($Id)
    {   
        $this->db->where("Id", $Id);
        $query = $this->db->get('users');
    
        return $query->num_rows();  

    }
    
    function allUser($limit,$start,$col,$dir,$Id)
    {   
        $this->db->where("Id", $Id);
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
   
    function user_search($limit,$start,$search,$col,$dir,$Id)
    {
        $this->db->where("Id", $Id);
        $query = $this
                ->db
                ->like('username',$search)
                ->like('email',$search)
                ->like('phone',$search)
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

    function user_search_count($search,$Id)
    {
        $this->db->where("Id", $Id);
        $query = $this
                ->db
                ->like('username',$search)
                ->like('email',$search)
                ->like('phone',$search)
                ->get('users');
    
        return $query->num_rows();
    }

	function insert_user($data){
		return $this->db->insert('users', $data);
    }
    
    function checkUser($username,$email,$phone){
        $this->db->select("username");
        $this->db->select("email");
        $this->db->select("phone");
        $this->db->from("users");
        $this->db->where("username", $username);
        $this->db->where("email", $email);
        $this->db->where("phone", $phone);
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

    function delete($id){
        return $this->db->delete('users', array('id' => $id));
    }

    function update($data){
        $this->db->where('id',$data['id']);
        $result = $this->db->update('users', $data);
        return $result;
    }

    function wherenot($id,$user){
        $this->db->select("users");
        $this->db->from("users");
        $this->db->where('Id', $d);
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
        $this->db->not_in("username" , "admin");
        return $this->db->delete('users', array('id' => $id));
    }


	
}