<?php 

if(!defined('BASEPATH')) exit('No direct script allowed');

class User extends CI_Model{

	function insert_user($data){
		$this->db->insert('users', $data);

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

	
}