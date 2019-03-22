<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Orderdetails extends CI_Model{
    
    function __construct() {
        parent::__construct(); 
    }

    // function all_count($userId)
    // {   
    //     $query = $this
    //             ->db
    //             ->where('create_by',$userId)
    //             ->get('order');
    
    //     return $query->num_rows();  
    // }
    // function searAllOrder($limit,$start,$col,$dir,$userId)
    // {   
    //     $query = $this->db->where('create_by',$userId)->limit($limit,$start)
    //         ->order_by($col,$dir)
    //         ->get('order');

    //     if($query->num_rows()>0)
    //     {
    //         return $query->result(); 
    //     }
    //     else
    //     {
    //         return null;
    //     }
    // }

    function getSummaryCostFromOrderDetail($orderId, $userId){
        $this->db->select("sum(cost) as cost, sum(charge) as charge, sum(chargeGarage) as chargeGarage");
        $this->db->where("orderId", $orderId);
        $result = $this->db->get("orderdetail");

        return $result->row();
    }

    function getOrderDetailByOrderId($orderId){
        // $this->db->select("*");
        $this->db->where("orderId", $orderId);
        $query = $this->db->get("orderdetail");
        return $query->result();
    }


    function allorders_count()
    {   
        
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId");
        $this->db->from('order');
        $this->db->join('orderdetail','order.orderId  = orderdetail.orderId');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        $this->db->where('order.status', 1);

        $query = $this->db->get();
        return $query->num_rows();  
        // $query = $this
        //         ->db
        //         ->get('order');
    
        // return $query->num_rows();  
    }

    function allorders($limit,$start,$order,$dir)//$limit,$start,$col,$dir,$order
    {   
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId");
        $this->db->from('order');
        $this->db->join('orderdetail','order.orderId  = orderdetail.orderId');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        $this->db->where('order.status', 1);
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

    function orders_search($limit,$start,$col,$dir,$orderId)
    {
        $this->db->where('status', 2);
        $this->db->like('firstName',$firstname);
        if($brandId != null){
            $this->db->where("brandId", $brandId);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('order');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
        
    }

    function orders_search_count($orderId){
        $this->db->where('status', 2);
        $this->db->where("garageId", $garageId);
        $this->db->like('firstName',$firstname);
        if($orderId != null){
            $this->db->where("$orderId", $$orderId);
        }
        $query = $this->db->get('order');
        return $query->num_rows();
    }

}