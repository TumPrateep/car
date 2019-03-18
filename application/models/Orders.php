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

    function getAllCartByUserIdAndProductId($userId, $productData){
        $this->db->select("*");
        $this->db->where('create_by',$userId);
        $this->db->where_in('productId',$productData);
        $query = $this->db->get("cart");
        return $query->result();
    }

    function getCost($productId, $group){
        $cost = null;
        if($group == "tire"){
            $cost = $this->db->where("tire_dataId",$productId)->get("tire_data")->row("price");
        }else if($group == "spare"){
            $cost = $this->db->where("spares_undercarriageDataId",$productId)->get("spares_undercarriagedata")->row("price");
        }else{
            $cost = $this->db->where("lubricator_dataId",$productId)->get("lubricator_data")->row("price");
        }
        return $cost;
    }

    function getCharge($productId, $group){
        $charge = null;
        if($group == "tire"){
            $this->db->select("tire_change.tire_price as charge");
            $this->db->from("tire_data");
            $this->db->join('tire_change','tire_change.rimId = tire_data.rimId');
            $this->db->where("tire_data.tire_dataId",$productId);
            $charge = $this->db->get()->row("charge");
        }else if($group == "spare"){
            $this->db->select("spares_change.spares_price as charge");
            $this->db->from("spares_undercarriagedata");
            $this->db->join('spares_change','spares_change.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
            $this->db->where("spares_undercarriagedata.spares_undercarriageDataId",$productId);
            $charge = $this->db->get()->row("charge");
        }else{
            $this->db->select("lubricator_change.lubricator_price as charge");
            $this->db->from("lubricator_change");
            $charge = $this->db->get()->row("charge");
        }
        return $charge;
    }

    function getGarageCharge($productId, $group){
        $charge = null;
        if($group == "tire"){
            $this->db->select("tire_change_garage.tire_price as charge");
            $this->db->from("tire_data");
            $this->db->join('tire_change_garage','tire_change_garage.rimId = tire_data.rimId');
            $this->db->where("tire_data.tire_dataId",$productId);
            $charge = $this->db->get()->row("charge");
        }else if($group == "spare"){
            $this->db->select("spares_change_garage.spares_price as charge");
            $this->db->from("spares_undercarriagedata");
            $this->db->join('spares_change_garage','spares_change_garage.spares_undercarriageId = spares_undercarriagedata.spares_undercarriageId');
            $this->db->where("spares_undercarriagedata.spares_undercarriageDataId",$productId);
            $charge = $this->db->get()->row("charge");
        }else{
            $this->db->select("lubricator_change_garage.lubricator_price as charge");
            $this->db->from("lubricator_change_garage");
            $charge = $this->db->get()->row("charge");
        }
        return $charge;
    }

    function insert($data){
        $this->db->trans_begin();
            $userId = $this->session->userdata['logged_in']['id'];
            $this->db->insert("order",$data['order']);
            $orderId = $this->db->insert_id();
            $orderDetailData = $data['orderdetail'];
            $orderDetail = [];
            $arrProductId = [];
            foreach ($orderDetailData as $val) {
                $cost =  $this->getCost($val->productId, $val->group);
                $charge =  $this->getCharge($val->productId, $val->group);
                $chargeGarage =  $this->getGarageCharge($val->productId, $val->group);
                $temp = [
                    'orderId' => $orderId,
                    'userId' => $userId,
                    'productId' => $val->productId,
                    'quantity' => $val->quantity,
                    'status' => 1,
                    'activeflag' => 1,
                    'group' => $val->group, 
                    'cost' => $cost,
                    'charge' => $charge,
                    'chargeGarage' => $chargeGarage,
                    'create_at' => date('Y-m-d H:i:s',time())
                ];
                array_push($orderDetail, $temp);
                array_push($arrProductId, $val->productId);
            }
            $data["reserve"]["orderId"] = $orderId;
            $this->db->insert("reserve",$data['reserve']);

            $this->db->where_in('productId', $arrProductId);
            $this->db->where('create_by', $userId);
            $this->db->delete('cart');

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
    function searchAllOrder($limit,$start,$col,$dir,$userId)
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

    function CheckOrder(){
        $this->db->select("create_by,sum(price) as price");
        $this->db->from('lubricator_data');
        $this->db->where('lubricatorId ', $lubricatorId)
        $this->db->group_by('create_by'); 
        $this->db->having('COUNT(`*`);

     

        
        
       
        $query = $this->db->get();
        return $query->num_rows();
    }
    
}