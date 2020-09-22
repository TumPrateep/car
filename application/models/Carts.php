<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Carts extends CI_Model {

	function __construct() {
        parent::__construct(); 
        
    }

    function insert($data){
        if(!empty($data)){
            $userId = $this->session->userdata['logged_in']['id'];
            $this->db->trans_begin();
                $this->db->delete('cart', array('create_by' => $userId));
                $this->db->insert_batch('cart', $data); 
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
            }else{
                $this->db->trans_commit();
                return true;
            }
        }else{
            return true;
        }
    }

    function getCartByUserId($userId){
        $result = $this->db->where("create_by",$userId)->get("cart");
        return $result->result();
    }

    function getCartById($cartId){
        $result = $this->db->where("cartId",$cartId)->get("cart");
        return $result->row();
    }

    function getCartByProductId($productId, $group, $userId){
        $result = $this->db->where("productId",$productId)
                    ->where("group",$group)
                    ->where("create_by",$userId)
                    ->get("cart");
        return $result->row();
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

    function delete($cartId){
        return $this->db->delete('cart', array('cardId' => $cartId));
    }

}
