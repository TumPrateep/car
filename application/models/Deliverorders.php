<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Deliverorders extends CI_Model {

    function insert($data){
        return $this->db->insert('numbertracking', $data);
    }
 
    function getDeliverordersById($orderId){
        $this->db->select("order.orderId, car_accessories.car_accessoriesName, (car_accessories.phone) as phonecar, car_accessories.address, reserve.garageId, garage.garageName, (garage.phone) as phonegarage, garage.hno, garage.Alley, garage.road, garage.village, garage.postCode, garage.subdistrictId, garage.districtId, garage.provinceId
        , car_accessories.postCode as carpostCode, car_accessories.provinceId as carprovinceId, car_accessories.districtId as cardistrictId, car_accessories.subdistrictId as carsubdistrictId");
        $this->db->from('order');
        $this->db->join('car_accessories','car_accessories.userId = order.car_accessoriesId');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        $this->db->join('garage','garage.garageId = reserve.garageId');
        $this->db->where('order.status', 3);
        return $this->db->where('order.orderId',$orderId)->get()->row();
        
    }
    
    function allDeliverorders_count()
    {   
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId, garage.garageName");
        $this->db->from('order');
        $this->db->join('orderdetail','order.orderId  = orderdetail.orderId');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        $this->db->join('garage','garage.garageId = reserve.garageId');
        $this->db->where('order.status', 3);
        $query = $this->db->get();
        return $query->num_rows();  
        
    }

    function allDeliverorders($limit,$start,$order,$dir)//$limit,$start,$col,$dir,$order
    {   
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId,garage.garageName");
        $this->db->from('order');
        $this->db->join('orderdetail','order.orderId  = orderdetail.orderId');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        $this->db->join('garage','garage.garageId = reserve.garageId');
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
    
    function data_check_update($orderId){
        // $this->db->select("personalid");
        $this->db->from("order");
        $this->db->where('orderId', $orderId);
        // $this->db->where_not_in('garageId', $garageId);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_create($orderId) {
        // $this->db->select("personalid");
        $this->db->from("numbertracking");
        $this->db->where('orderId',$orderId);
        $result = $this->db->get();
        return $result->row();
    }
}