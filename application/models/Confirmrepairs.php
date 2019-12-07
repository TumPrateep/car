<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Confirmrepairs extends CI_Model
{

    public function getOrderById($orderId)
    {
        $this->db->select("orderId,car_profileId");
        $this->db->where('orderId', $orderId);
        $result = $this->db->get("order");
        return $result->row();
    }

    public function insert($data)
    {
        return $this->db->insert('reserve', $data);
    }

    public function allaccessstatuss($limit, $start, $col, $dir, $garageId)
    {
        $this->db->select('car_profile.car_profileId, car_profile.mileage, order.mileage_carprofile, reserve.reserveId, order.orderId, order.statusSuccess, reserve.reserveDate, reserve.reservetime,user_profile.userId,order.status, concat(user_profile.firstname," ",user_profile.lastname) as name');
        $this->db->from('order');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('user_profile', 'order.userId = user_profile.userId');
        $this->db->join('car_profile', 'order.car_profileId = car_profile.car_profileId');
        $this->db->where('order.status', 5);
        $this->db->or_where('order.status', 6);
        // $this->db->where('order.statusSuccess', 2);
        $this->db->where('reserve.garageId', $garageId);

        $query = $this->db->limit($limit, $start)->order_by($col, $dir)->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function allaccessstatuss_count($garageId)
    {
        $this->db->select('car_profile.car_profileId, car_profile.mileage, order.mileage_carprofile, reserve.reserveId, order.orderId, order.statusSuccess, reserve.reserveDate, reserve.reservetime,user_profile.userId,order.status, concat(user_profile.firstname," ",user_profile.lastname) as name');
        $this->db->from('order');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('user_profile', 'order.userId = user_profile.userId');
        $this->db->join('car_profile', 'order.car_profileId = car_profile.car_profileId');
        $this->db->where('order.status', 5);
        // $this->db->where('order.statusSuccess', 2);
        $this->db->where('reserve.garageId', $garageId);
        $query = $this->db->get();
        return $query->num_rows();

    }

    // public function accessstatuss_search($limit, $start, $search, $col, $dir, $status)
    // {
    //     $this->db->select('car_profile.car_profileId, car_profile.mileage, order.mileage_carprofile, reserve.reserveId, order.orderId, order.statusSuccess, reserve.reserveDate, reserve.reservetime,user_profile.userId,order.status, concat(user_profile.firstname," ",user_profile.lastname) as name');
    //     $this->db->from('order');
    //     $this->db->join('reserve', 'order.orderId = reserve.orderId');
    //     $this->db->join('user_profile', 'order.userId = user_profile.userId');
    //     $this->db->join('car_profile', 'order.car_profileId = car_profile.car_profileId');
    //     $this->db->where('order.status', 4);

    //     $this->db->like('rim.rimName', $search);
    //     if ($status != null) {
    //         $this->db->where("tire_change_garage.status", $status);
    //     }
    //     $query = $this->db->limit($limit, $start)
    //         ->order_by($col, $dir)
    //         ->get();

    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     } else {
    //         return null;
    //     }
    // }

    // public function accessstatuss_search_count($search, $status)
    // {

    //     $this->db->select('car_profile.car_profileId, car_profile.mileage, order.mileage_carprofile, reserve.reserveId, order.orderId, order.statusSuccess, reserve.reserveDate, reserve.reservetime,user_profile.userId,order.status, concat(user_profile.firstname," ",user_profile.lastname) as name');
    //     $this->db->from('order');
    //     $this->db->join('reserve', 'order.orderId = reserve.orderId');
    //     $this->db->join('user_profile', 'order.userId = user_profile.userId');
    //     $this->db->join('car_profile', 'order.car_profileId = car_profile.car_profileId');
    //     $this->db->where('order.status', 4);

    //     if ($search != null) {
    //         $this->db->where("reserve.reserveId", $search);
    //     }
    //     if ($status != null) {
    //         $this->db->where("order.status", $status);
    //     }
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }

    public function update($data)
    {
        $this->db->trans_begin();
        $this->db->where('orderId', $data['order']['orderId']);
        $this->db->update('order', $data['order']);

        $this->db->where('car_profileId', $data['car_profile']['car_profileId']);
        $this->db->update('car_profile', $data['car_profile']);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function data_check_update($mileage_carprofile, $orderId)
    {
        $this->db->from("order");
        $this->db->where("orderId", $orderId);
        $this->db->where("mileage_carprofile", $mileage_carprofile);
        $this->db->where_not_in('orderId', $orderId);
        $result = $this->db->get();
        return $result->row();
    }

}