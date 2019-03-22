<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Deliverorders extends CI_Model {
 
    // function getDeliverordersById($orderId){
    //     $this->db->select('order.orderId,orderdetail.productId,reserve.garageId');
    //     $this->db->from('order');
    //     $this->db->join('orderdetail','orderdetail.orderId = order.orderId');
    //     $this->db->join('reserve','reserve.orderId = order.orderId');
    //     $this->db->where('order.status', 3);
    //     return $this->db->where('orderId',$orderId)->get("order")->row();
        
    // }
    
    function allDeliverorders_count()
    {   
        
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId");
        $this->db->from('order');
        $this->db->join('orderdetail','order.orderId  = orderdetail.orderId');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        $this->db->where('order.status', 3);

        $query = $this->db->get();
        return $query->num_rows();  
        // $query = $this
        //         ->db
        //         ->get('order');
    
        // return $query->num_rows();  
    }

    function allDeliverorders($limit,$start,$order,$dir)//$limit,$start,$col,$dir,$order
    {   
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId");
        $this->db->from('order');
        $this->db->join('orderdetail','order.orderId  = orderdetail.orderId');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        $this->db->where('order.status', 3);
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

        // $query = $this
        //     ->db
        //     ->limit($limit,$start)
        //     ->order_by($col,$dir)
        //     ->get('order');
        //     if($query->num_rows()>0)
        //     {
        //         return $query->result(); 
        //     }
        //     else
        //     {
        //         return null;
        //     }
        
    }

    function Deliverorders_search($limit,$start,$col,$dir)
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

    // function Deliverorders_search_count($orderId){
    //     $this->db->where('status', 2);
    //     $this->db->where("garageId", $garageId);
    //     $this->db->like('firstName',$firstname);
    //     if($orderId != null){
    //         $this->db->where("$orderId", $$orderId);
    //     }
    //     $query = $this->db->get('order');
    //     return $query->num_rows();
    // }

    function update($data){
        $this->db->where('orderId',$data['orderId']);
        $result = $this->db->update('order', $data);
        return $result;
    }

    function getorderById($orderId){
        $this->db->select("orderId");
        $this->db->where('orderId',$orderId);
        $result = $this->db->get("order");
        return $result->row();

    }
    
}