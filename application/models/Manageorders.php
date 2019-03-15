<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Manageorders extends CI_Model{
    
    function allData_count(){
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId,garage.garageName,order.create_at");
        $this->db->from('order');
        $this->db->join('orderdetail','order.orderId  = orderdetail.orderId');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        $this->db->join('garage','garage.garageId = reserve.garageId');
        $this->db->where('order.status',3);
        $query = $this->db->get();
        return $query->num_rows();  
    }

    function allData($limit,$start,$order,$dir){

        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId,garage.garageName,order.create_at");
        $this->db->from('order');
        $this->db->join('orderdetail','order.orderId  = orderdetail.orderId');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        $this->db->join('garage','garage.garageId = reserve.garageId');
        $this->db->where('order.status', 3);
        $this->db->limit($limit,$start)->order_by($order,$dir);
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }

    function getOrderDataById($orderId){
        $query = $this->db->where("orderId", $orderId)->get("order");
        return $query->row();
    }
   
   
   
    
}