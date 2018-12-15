<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Carts extends CI_Model {

	function __construct() {
        parent::__construct(); 
        
    }

    function insert($data){
        $result = $this->db->insert('cart', $data);
        return $result;
    }

    function data_check_userId($userId){
        $this->db->select("userId");
        $this->db->from("cart");
        $this->db->where('userId',$userId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('userId',$data['userId']);
        $result = $this->db->update('cart', $data);
        return $result;
        
    }

}
