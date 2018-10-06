<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Tempuser extends CI_Model{

    function getTempUserByEmail($email){
        $result = $this->db->where("email", $email)->get("temp_user");
        return ($result == null)?null:$result->row();
    }

    function insert($data){
        return $this->db->insert('temp_user',$data);
    }
    
}