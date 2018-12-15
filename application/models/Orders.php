<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Orders extends CI_Model{
    
    function __construct() {
        parent::__construct(); 
    }
    function getAllCartByUserId($userId){
        $this->db->select("*");
        $this->db->where('userId',$userId);
        $query = $this->db->get("cart");
        return $query->result();
    }

    function getPrice($productId, $group){
        $price = null;
        if($group == "tire"){
            $price = $this->db->where("tiredataId",$productId)->get("tiredata")->row("price");
        }else if($group == "spare"){
            $price = $this->db->where("spares_undercarriageDataId",$productId)->get("spares_undercarriagedata")->row("price");
        }else{
            $price = $this->db->where("lubricator_dataId",$productId)->get("lubricator_data")->row("price");
        }
        return $price;
    }

    function insert($data){
        $this->db->trans_begin();
            $this->db->insert("order",$data['order']);
            $orderId = $this->db->insert_id();

            $orderDetailData = $data['orderdetail'];
            $index = 0;
            foreach ($orderDetailData as $val) {
                $orderDetail[$index]['orderId'] = $orderId;
                $orderDetail[$index]['create_by'] = $userId;
                $orderDetail[$index]['productId'] = $productId;
                $orderDetail[$index]['quantity'] = $quantity;
                $orderDetail[$index]['status'] = $status;
                $orderDetail[$index]['activeflag'] = $activeflag;
                $orderDetail[$index]['group'] = $group;
                $orderDetail[$index]['price'] = $this->getPrice($val->productId, $val->group);
                $index++;
            }
        delete($cartId);
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }
    function delete($cartId){
        return $this->db->delete('cart', array('cartId' => $cartId));
    }
    
}