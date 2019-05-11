<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Accessstatuss extends CI_Model{



    function getOrderById($orderId){
        $this->db->select("orderId");
        $this->db->where('orderId',$orderId);
        $result = $this->db->get("order");
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('reserve',$data);
    }

    function allaccessstatuss($limit,$start,$col,$dir,$garageId){
        $this->db->select('reserve.reserveId, order.orderId, order.statusSuccess, reserve.reserveDate, reserve.reservetime,user_profile.userId,reserve.status, concat(user_profile.firstname," ",user_profile.lastname) as name');
        $this->db->from('order');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('user_profile', 'order.userId = user_profile.userId');
        $this->db->where('reserve.garageId',$garageId);

        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }

    function allaccessstatuss_count($garageId){  
        $this->db->select('reserveId,reserveDate,reservetime,status');
        $this->db->from('reserve'); 
        $this->db->where('reserve.garageId',$garageId);
        $query = $this->db->get();
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function accessstatuss_search($limit,$start,$search,$col,$dir,$status){
        $this->db->select('reserve.reserveId, order.orderId, order.statusSuccess, reserve.reserveDate, reserve.reservetime,user_profile.userId,reserve.status, concat(user_profile.firstname," ",user_profile.lastname) as name');
        $this->db->from('order');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('user_profile', 'order.userId = user_profile.userId');
        $this->db->where('reserve.garageId',$garageId);
     

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

    function reserve_search_count($search,$status){
       
        $this->db->select('reserve.reserveId, order.orderId, order.statusSuccess, reserve.reserveDate, reserve.reservetime,user_profile.userId,reserve.status, concat(user_profile.firstname," ",user_profile.lastname) as name');
        $this->db->from('order');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('user_profile', 'order.userId = user_profile.userId');
        $this->db->where('reserve.garageId',$garageId);

        if($search != null){
            $this->db->where("reserve.reserveId",$search);
        }
        if($status != null){
            $this->db->where("order.status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    } 

    function update($data){
        $this->db->trans_begin();
            $this->db->where('orderId',$data['orderId']);
            $result = $this->db->update('order',$data);

            if($data['statusSuccess'] == "1"){
                $orderData = [
                    "statusSuccess" => 2
                ];
                $this->db->where('orderId',$data['orderId']);
                $this->db->update('order',$orderData);
            }
        
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }
   
   

}