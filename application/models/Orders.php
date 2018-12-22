<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Orders extends CI_Model{
    
    function __construct() {
        parent::__construct(); 
    }
    function getAllCartByUserId($userId){
        $this->db->select("*");
        $this->db->where('create_by',$userId);
        $query = $this->db->get("cart");
        return $query->result();
    }

    function getPrice($productId, $group){
        $price = null;
        if($group == "tire"){
            $price = $this->db->where("tiredataId",$productId)->get("tiredata")->row("price");
        }else if($group == "spare"){
            $price = $this->db->where("spares_undercarriageDataId",$productId)->get("spares_undercarriagedata")->row("price");
        }else{
            $price = $this->db->where("lubricator_dataId",$productId)->get("lubricator_data")->row("price");
        }
        return $price;
    }

    function insert($data){
        $this->db->trans_begin();
            $userId = $this->session->userdata['logged_in']['id'];
            $this->db->insert("order",$data['order']);
            $orderId = $this->db->insert_id();
            $orderDetailData = $data['orderdetail'];
            $orderDetail = [];
            foreach ($orderDetailData as $val) {
                $temp = [
                    'orderId' => $orderId,
                    'userId' => $userId,
                    'productId' => $val->productId,
                    'quantity' => $val->quantity,
                    'status' => 1,
                    'activeflag' => 1,
                    'group' => $val->group,
                    'price' => $this->getPrice($val->productId, $val->group)
                ];
                array_push($orderDetail, $temp);
            }
            $this->db->delete('cart', array('create_by' => $userId));
            $this->db->insert_batch('orderdetail', $orderDetail);
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
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
        $query = $this
            ->db
            ->where('create_by',$userId)
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
    
}