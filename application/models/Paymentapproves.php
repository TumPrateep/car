<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Paymentapproves extends CI_Model{



    function getPaymentApproveById($paymentId){
        $this->db->select("paymentId");
        $this->db->where('paymentId',$paymentId);
        $result = $this->db->get("payment");
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('payment',$data);
    }

    function allPaymentApprove($limit,$start,$col,$dir){
        $this->db->select(' order.orderId, order.userId, payment.money,payment.slip	,concat(user_profile.firstname ," ",user_profile.lastname) as name,payment.status,payment.paymentId');
        $this->db->from('order');
        $this->db->join('payment', 'order.orderId = payment.orderId', 'left');
        $this->db->join('user_profile', 'order.userId = user_profile.userId');
        // $this->db->where('reserve.garageId',$garageId);


        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;    
        }
        
    }

    function allPaymentApprove_count(){  
        $this->db->select('orderId');
        $this->db->from('payment'); 
        // $this->db->where('reserve.garageId',$garageId);
        $query = $this->db->get();  
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function PaymentApprove_search($limit,$start,$search,$col,$dir,$status){
        
        $this->db->select(' order.orderId, order.userId, payment.money,payment.slip	,concat(user_profile.firstname ," ",user_profile.lastname) as name,payment.status,payment.paymentId');
        $this->db->from('order');
        $this->db->join('payment', 'order.orderId = payment.orderId', 'left');
        $this->db->join('user_profile', 'order.userId = user_profile.userId');
        // $this->db->where('reserve.garageId',$garageId);
     

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

    function PaymentApprove_search_count($search,$status){
       
        $this->db->select(' order.orderId, order.userId, payment.money,payment.slip	,concat(user_profile.firstname ," ",user_profile.lastname) as name,payment.status,payment.paymentId');
        $this->db->from('order');
        $this->db->join('payment', 'order.orderId = payment.orderId');
        $this->db->join('user_profile', 'order.userId = user_profile.userId');
        // $this->db->where('reserve.garageId',$garageId);

        if($search != null){
            $this->db->where("payment.paymentId",$search);
        }
        if($status != null){
            $this->db->where("order.status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    } 

    function update($data){
        $this->db->where('paymentId',$data['paymentId']);
        $result = $this->db->update('payment',$data);
        return $result;
    }
   
   

}