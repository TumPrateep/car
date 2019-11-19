<?php 

if(!defined('BASEPATH')) exit('No direct script allowed');

class Registercaraccessorys extends CI_Model{

    function data_check_create($firstname_user,$personalid){
        $this->db->select("firstname");
        $this->db->from("user_profile");
        $this->db->where("personalid", $personalid);
        //$this->db->or_where("phone",$phone);
        $result = $this->db->get();
        return $result->row();
    }


}