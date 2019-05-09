<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Commentusers extends CI_Model{
    // insert
    function insert($data){
        return $this->db->insert('rating',$data);
    }
    function data_check_create(){

        $this->db->from("rating");
        // $this->db->where("garageId",$garageId);
        $result = $this->db->get();
        return $result->row();
    }
}