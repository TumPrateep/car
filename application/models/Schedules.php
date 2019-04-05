<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Schedules extends CI_Model{
    
    function __construct() {
        parent::__construct(); 
    }


    function getorderSchedulesById($orderDetailId){
        $this->db->select("orderDetailId");
        $this->db->where('orderDetailId',$orderDetailId);
        $result = $this->db->get("orderdetail");
        return $result->row();
    }

    // function getorderdata($orderId){
    //     $this->db->select("order.orderId,user_profile.firstname,user_profile.lastname,car_profile.character_plate,car_profile.number_plate,provinceforcar.provinceforcarName,brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.modelofcarName,user_profile.titleName");
    //     $this->db->from('order');
    //     $this->db->join('users','order.userId = users.id');
    //     $this->db->join('user_profile','users.id = user_profile.userId');
    //     $this->db->join('car_profile','order.car_profileId = car_profile.car_profileId');
    //     $this->db->join('provinceforcar','car_profile.province_plate = provinceforcar.provinceforcarId');
    //     $this->db->join('brand','car_profile.brandId = brand.brandId');
    //     $this->db->join('model','car_profile.modelId = model.modelId');
    //     $this->db->join('modelofcar','car_profile.modelofcarId = modelofcar.modelofcarId');
    //     $this->db->where('order.orderId',$orderId);
    //     $this->db->where('order.status', 4);
    //     $result = $this->db->get("orderdetail");
    //     return $result->row();
    // }

    // function getOrderDetailByOrderId($orderId){
  
    //     $this->db->where("orderId", $orderId);
    //     $query = $this->db->get("orderdetail");
    //     return $query->result();
    // }


    // function allorders_count()
    // {   
        
    //     $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.quantity, orderdetail.status, reserve.garageId, orderdetail.group, orderdetail.productId,car_accessories.car_accessoriesName,user_profile.firstname,user_profile.lastname,car_profile.character_plate,car_profile.number_plate,provinceforcar.provinceforcarName,brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.modelofcarName,user_profile.titleName,spares_change_garage.spares_price,tire_change_garage.tire_price,lubricator_change_garage.lubricator_price");
    //     $this->db->from('order');
    //     $this->db->join('orderdetail','order.orderId  = orderdetail.orderId');
    //     $this->db->join('reserve','order.orderId = reserve.orderId');
    //     $this->db->join('garage','reserve.garageId = garage.garageId');
    //     $this->db->join('car_accessories','order.car_accessoriesId = car_accessories.userId');
    //     $this->db->join('users','order.userId = users.id');
    //     $this->db->join('user_profile','users.id = user_profile.userId');
    //     $this->db->join('car_profile','order.car_profileId = car_profile.car_profileId');
    //     $this->db->join('provinceforcar','car_profile.province_plate = provinceforcar.provinceforcarId');
    //     $this->db->join('brand','car_profile.brandId = brand.brandId');
    //     $this->db->join('model','car_profile.modelId = model.modelId');
    //     $this->db->join('modelofcar','car_profile.modelofcarId = modelofcar.modelofcarId');
    //     $this->db->join('spares_change_garage','garage.garageId = spares_change_garage.garageId');
    //     $this->db->join('tire_change_garage','garage.garageId = tire_change_garage.garageId');
    //     $this->db->join('lubricator_change_garage','garage.garageId = lubricator_change_garage.garageId');

    //     $this->db->where('order.status', 4);

    //     $query = $this->db->get();
    //     return $query->num_rows();  
     
    // }

    // function allorders($limit,$start,$order,$dir)//$limit,$start,$col,$dir,$order
    // {   
    //     $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.quantity, orderdetail.status, reserve.garageId, orderdetail.group, orderdetail.productId,car_accessories.car_accessoriesName,user_profile.firstname,user_profile.lastname,car_profile.character_plate,car_profile.number_plate,provinceforcar.provinceforcarName,brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.modelofcarName,user_profile.titleName,spares_change_garage.spares_price,tire_change_garage.tire_price,lubricator_change_garage.lubricator_price");
    //     $this->db->from('order');
    //     $this->db->join('orderdetail','order.orderId  = orderdetail.orderId');
    //     $this->db->join('reserve','order.orderId = reserve.orderId');
    //     $this->db->join('garage','reserve.garageId = garage.garageId');
    //     $this->db->join('car_accessories','order.car_accessoriesId = car_accessories.userId');
    //     $this->db->join('users','order.userId = users.id');
    //     $this->db->join('user_profile','users.id = user_profile.userId');
    //     $this->db->join('car_profile','order.car_profileId = car_profile.car_profileId');
    //     $this->db->join('provinceforcar','car_profile.province_plate = provinceforcar.provinceforcarId');
    //     $this->db->join('brand','car_profile.brandId = brand.brandId');
    //     $this->db->join('model','car_profile.modelId = model.modelId');
    //     $this->db->join('modelofcar','car_profile.modelofcarId = modelofcar.modelofcarId');
    //     $this->db->join('spares_change_garage','garage.garageId = spares_change_garage.garageId');
    //     $this->db->join('tire_change_garage','garage.garageId = tire_change_garage.garageId');
    //     $this->db->join('lubricator_change_garage','garage.garageId = lubricator_change_garage.garageId');

    //     $this->db->where('order.status', 4);
    //     $this->db->limit($limit,$start)->order_by($order,$dir);

    //     $query = $this->db->get();

    //     if($query->num_rows()>0)
    //     {
    //         return $query->result(); 
    //     }
    //     else
    //     {
    //         return null;
    //     }
    // }

    function orders_search($limit,$start,$col,$dir,$orderId)
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

    // function getSummaryCostFromOrderDetail($orderId, $userId){
    //     $this->db->select("sum(cost) as cost, sum(charge) as charge, sum(chargeGarage) as chargeGarage, sum(costCaraccessories) as costCaraccessories");
    //     $this->db->where("orderId", $orderId);
    //     $result = $this->db->get("orderdetail");
    //     return $result->row();
    // }

    // function orders_search_count($orderId){
    //     $this->db->where('status', 2);
    //     $this->db->where("garageId", $garageId);
    //     $this->db->like('firstName',$firstname);
    //     if($orderId != null){
    //         $this->db->where("$orderId", $$orderId);
    //     }
    //     $query = $this->db->get('order');
    //     return $query->num_rows();
    // }

    // function update($data){
    //     $this->db->where('orderDetailId',$data['orderDetailId']);
    //     $result = $this->db->update('orderdetail',$data);
    //     return $result;
    // }
    
}