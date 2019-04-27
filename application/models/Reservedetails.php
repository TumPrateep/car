<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Reservedetails extends CI_Model{



    function getReservedetailsById($reserveId){
        $this->db->select("reserveId");
        $this->db->where('reserveId',$reserveId);
        $result = $this->db->get("reserve");
        return $result->row();
    }



    function allReservedetails($limit,$start,$col,$dir){
        $this->db->select('order.orderId,orderdetail.quantity,orderdetail.group,orderdetail.productId');
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId = orderdetail.orderId');
        $this->db->where('order.status',1);

        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }

    function allReservedetails_count(){  
        $this->db->select('order.orderId,orderdetail.quantity,orderdetail.group,orderdetail.productId');
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId = orderdetail.orderId');
        $this->db->where('order.status',1);
        $query = $this->db->get();
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function Reservedetails_search($limit,$start,$search,$col,$dir,$status){
        
        $this->db->select('order.orderId,orderdetail.quantity,orderdetail.group,orderdetail.productId');
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId = orderdetail.orderId');
        $this->db->where('order.status',1);
     

        $this->db->like('rim.rimName',$search);
        if($status != null){
            $this->db->where("tire_change_garage.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
                
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function Reservedetails_search_count($search,$status){
       
        $this->db->select('order.orderId,orderdetail.quantity,orderdetail.group,orderdetail.productId');
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId = orderdetail.orderId');
        $this->db->where('order.status',1);
        if($search != null){
            $this->db->where("reserve.reserveId",$search);
        }
        if($status != null){
            $this->db->where("order.status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    } 


}