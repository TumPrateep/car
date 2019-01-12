
<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Payments extends CI_Model {

    // function delete($mechanicId){
    //     return $this->db->delete('mechanic', array('mechanicId' => $mechanicId));
    // }

    function getPaymentId($paymentId){
        return $this->db->where('paymentId',$paymentId)->get("payment")->row();
    }

    function insert($data){
        return $this->db->insert('payment', $data);
    }

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

}
   