<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Orderdetails extends CI_Model{
    
    function __construct() {
        parent::__construct(); 
    }

    function all_count($userId)
    {   
        $query = $this
                ->db
                ->where('create_by',$userId)
                ->get('order');
    
        return $query->num_rows();  
    }
    function searAllOrder($limit,$start,$col,$dir,$userId)
    {   
        $query = $this->db->where('create_by',$userId)->limit($limit,$start)
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

    function getSummaryCostFromOrderDetail($orderId, $userId){
        $this->db->select("sum(cost) as cost, sum(charge) as charge, sum(chargeGarage) as chargeGarage, sum(costCaraccessories) as costCaraccessories");
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

}