<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Mechanic extends CI_Model {


    function insert($data){
		return $this->db->insert('test', $data);
    }

    function data_check_create($firstname) {
        $this->db->select("firstname");
        $this->db->from("test");
        $this->db->where('firstname',$firstname);
        $result = $this->db->get();
        return $result->row();
    }
    
}