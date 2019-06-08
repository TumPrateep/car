<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Servecehistorys extends CI_Model{
    
    function __construct() {
        parent::__construct(); 
    }

    function searchAllOrder($limit,$start,$col,$dir,$userId)
    {   
        $this->db->select("order.orderId,order.create_at, reserve.garageId, reserve.reserveDate,reserve.reservetime, orderdetail.group, orderdetail.productId, garage.garageName, car_profile.character_plate, car_profile.number_plate, car_profile.province_plate, province.provinceName");
        $this->db->from('order');
        $this->db->join('orderdetail','order.orderId  = orderdetail.orderId');
        $this->db->join('reserve','order.orderId = reserve.orderId');
        $this->db->join('garage','garage.garageId = reserve.garageId');
        $this->db->join('car_profile','car_profile.car_profileId = order.car_profileId');
        $this->db->join('province','province.provinceId = car_profile.province_plate');
        
        $this->db->where('order.statusSuccess', 2);
        $this->db->where('order.create_by',$userId);
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

}
