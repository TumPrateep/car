<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Commentusers extends CI_Model{
    // insert
    function insert($data){
        return $this->db->insert('rating',$data);
    }

    function getorderById($orderId){
        $this->db->select("*");
        $this->db->where("orderId",$orderId);
        $result = $this->db->get('reserve');// reserve คือตารางการจอง
        return $result->row();
    }

    function data_check_create($orderId){
        $this->db->from("rating");
        $this->db->where("orderId",$orderId);
        $result = $this->db->get();
        return $result->row();
    }
}