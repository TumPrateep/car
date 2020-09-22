<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Servicehistorys extends CI_Model{
    
    function __construct() {
        parent::__construct(); 
    }

    function getservicehistory($limit,$start,$col,$dir)
    {   
        $this->db->select("order.orderId, reserve.reserveDate, reserve.reservetime");
        $this->db->from('order');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        
        $this->db->where('order.status', 6);
        // $this->db->where('order.create_by',$userId);
        $this->db->limit($limit,$start)->order_by($col,$dir);
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

    public function getservicehistory_count()
    {
        $this->db->select("order.orderId, reserve.reserveDate, reserve.reservetime");
        $this->db->from('order');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        $this->db->where('order.status',6);
        $query = $this->db->get();
        return $query->num_rows();

    }

}
