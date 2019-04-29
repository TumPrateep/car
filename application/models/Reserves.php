<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Reserves extends CI_Model{



    function getReserveById($reserveId){
        $this->db->select("reserveId");
        $this->db->where('reserveId',$reserveId);
        $result = $this->db->get("reserve");
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('reserve',$data);
    }

    function allReserve($limit,$start,$col,$dir,$garageId){
        $this->db->select('reserve.reserveId, order.orderId, reserve.reserveDate, reserve.reservetime,user_profile.userId,reserve.status, concat(user_profile.firstname," ",user_profile.lastname) as name');
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

    function allReserve_count($garageId){  
        $this->db->select('reserveId,reserveDate,reservetime,status');
        $this->db->from('reserve'); 
        $this->db->where('reserve.garageId',$garageId);
        $query = $this->db->get();
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function Reserves_search($limit,$start,$search,$col,$dir,$status){
        
        $this->db->select('reserve.reserveId, order.orderId, reserve.reserveDate, reserve.reservetime,user_profile.userId,reserve.status');
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
       
        $this->db->select('reserve.reserveId, order.orderId, reserve.reserveDate, reserve.reservetime,user_profile.userId,reserve.status');
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
            $this->db->where('reserveId',$data['reserveId']);
            $result = $this->db->update('reserve',$data);

            if($data['status'] == "2"){
                $orderData = [
                    "status" => 4
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