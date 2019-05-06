
<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Payments extends CI_Model {

    // function delete($mechanicId){
    //     return $this->db->delete('mechanic', array('mechanicId' => $mechanicId));
    // }

    function getPaymentId($orderId){
        return $this->db->where('orderId',$orderId)->get("payment")->row();
    }

    // function insert($data){
    //     return $this->db->insert('payment', $data);
    // }

    function allpayment_count()
    {   
        $query = $this
                ->db
                ->get('payment');
    
        return $query->num_rows();  
    }

    function allpayment($limit,$start,$col,$dir)
    {   
        $query = $this
            ->db
            ->limit($limit,$start)
            ->order_by($col,$dir)
            ->get('payment');
            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }
        
    }

    function data_check_create($paymentId) {
        $this->db->select("paymentId");
        $this->db->from("payment");
        $this->db->where('paymentId',$paymentId);
        $result = $this->db->get();
        return $result->row();
    }

    function getPaymentById($paymentId){
        $this->db->select("paymentId");
        $this->db->where('paymentId',$paymentId);
        $result = $this->db->get("payment");
        return $result->row();
    }

    
    function getDepositflag($orderId){
        $this->db->select("depositflag,costDelivery");
        $this->db->where('orderId',$orderId);
        $result = $this->db->get("order");
        return $result->row();
    }

    function getฺBank($bankId){
        $this->db->select("bankName");
        $this->db->where('bankId',$bankId);
        $result = $this->db->get("bank_carjaidee");
        return $result->row();
    }
 

    function insert($data){
        $this->db->trans_begin();
            $userId = $this->session->userdata['logged_in']['id'];
            $this->db->insert('payment', $data);

            $this->db->where('orderId',$data['orderId']);
            $result = $this->db->update('order',['status'=> 2]);


        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }
}
   