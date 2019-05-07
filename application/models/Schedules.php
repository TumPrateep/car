<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Schedules extends CI_Model{
    
    function __construct() {
        parent::__construct(); 
    }


    function getorderSchedulesById($reserveId){
        $this->db->select("user_profile.firstname, user_profile.lastname");
        $this->db->from('reserve');
        $this->db->join('users','reserve.created_by = users.id');
        $this->db->join('user_profile','users.id = user_profile.userId');
        $this->db->join('order','reserve.orderId = order.orderId');

        // $this->db->where('orderDetailId',$orderDetailId);
        $result = $this->db->get("reserveId");
        return $result->row();
    }

    function getorderdata($orderId){
        $this->db->select("order.orderId,user_profile.firstname,user_profile.lastname,car_profile.character_plate,car_profile.number_plate,provinceforcar.provinceforcarName,brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.modelofcarName,user_profile.titleName");
        $this->db->from('order');
        $this->db->join('users','order.userId = users.id');
        $this->db->join('user_profile','users.id = user_profile.userId');
        $this->db->join('car_profile','order.car_profileId = car_profile.car_profileId');
        $this->db->join('provinceforcar','car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->join('brand','car_profile.brandId = brand.brandId');
        $this->db->join('model','car_profile.modelId = model.modelId');
        $this->db->join('modelofcar','car_profile.modelofcarId = modelofcar.modelofcarId');
        $this->db->where('order.orderId',$orderId);
        $this->db->where('order.status', 4);
        $result = $this->db->get("orderdetail");
        return $result->row();
    }

    function getAllEventByMonth($month, $garageId){
        $this->db->select("order.*,reserve.reserveDate,reserve.reservetime,concat(car_profile.character_plate,' ',car_profile.number_plate,' ',provinceforcar.provinceforcarName) as plate,concat(user_profile.firstname,user_profile.lastname) as nameuser");
        $this->db->from('order');
        $this->db->join('users','order.userId = users.id');
        $this->db->join('user_profile','users.id = user_profile.userId');
        $this->db->join('payment','payment.orderId = order.orderId');
        $this->db->join('reserve', 'reserve.orderId = order.orderId');
        $this->db->join('car_profile','order.car_profileId = car_profile.car_profileId');
        $this->db->join('provinceforcar','car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->join('brand','car_profile.brandId = brand.brandId');
        $this->db->join('model','car_profile.modelId = model.modelId');
        $this->db->join('modelofcar','car_profile.modelofcarId = modelofcar.modelofcarId');
        $this->db->where('payment.status',2);
        $this->db->where('reserve.garageId',$garageId);
        $result = $this->db->get();
        return $result->result();
    }

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
    
}
