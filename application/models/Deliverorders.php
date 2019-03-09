<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Deliverorders extends CI_Model {
 
    function getDeliverordersById($orderId){
        $this->db->select('order.orderId,orderdetail.productId,reserve.garageId');
        $this->db->from('order');
        $this->db->join('orderdetail', 'orderdetail.orderId = order.orderId');
        $this->db->join('reserve', 'reserve.orderId = order.orderId');

        return $this->db->where('orderId',$orderId)->get("order")->row();
    }
    
    function allDeliverorders_count()//$car_accessoriesId
    {   
        // $this->db->where("car_accessoriesId", $$car_accessoriesId);
        // $this->db->where('status', 2);
        $query = $this
                ->db
                ->get('order');
    
        return $query->num_rows();  
    }

    function allDeliverorders($limit,$start,$col,$dir)
    {   
        // $this->db->where('status', 2);
        $query = $this
            ->db
            ->limit($limit,$start)
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

    function Deliverorders_search($limit,$start,$col,$dir)
    {
        // $this->db->where('status', 2);
        // $this->db->like('firstName',$firstname);
        // if($brandId != null){
        //     $this->db->where("brandId", $brandId);
        // }
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
    function Deliverorders_search_count($orderId){
        // $this->db->where('status', 2);
        // $this->db->where("garageId", $garageId);
        // $this->db->like('firstName',$firstname);
        if($orderId != null){
            $this->db->where("$orderId", $$orderId);
        }
        $query = $this->db->get('order');
        return $query->num_rows();
    }
    
}