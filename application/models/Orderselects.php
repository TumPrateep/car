<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Orderselects extends CI_Model
{

    public function allData_count($userId)
    {
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId,garage.garageName");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'garage.garageId = reserve.garageId');
        $this->db->where('order.status', 3);
        $this->db->where('reserve.status', 2);
        $this->db->where('orderdetail.real_car_accessoriesId', $userId);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function allData($limit, $start, $order, $dir, $userId)
    {

        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId,garage.garageName,order.status, orderdetail.orderDetailId, orderdetail.deliver_flag, orderdetail.car_accept_flag");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'garage.garageId = reserve.garageId');
        $this->db->where('order.status', 3);
        $this->db->where('reserve.status', 2);
        $this->db->where('orderdetail.real_car_accessoriesId', $userId);
        $this->db->limit($limit, $start)->order_by($order, $dir);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function getOrderDataById($orderId)
    {
        $query = $this->db->where("orderId", $orderId)->get("order");
        return $query->row();
    }

    public function getNumberFromOrderDetailNonApprove($orderId){
        $this->db->where('orderId', $orderId);
        $this->db->where('car_accept_flag', 1);
        $query = $this->db->get('orderdetail');
        return $query->num_rows();
    }

    public function update($data)
    {
        $this->db->trans_begin();

        $this->db->where('orderDetailId', $data['orderdetail']['orderDetailId']);
        $result = $this->db->update('orderdetail', $data['orderdetail']);

        $number = $this->getNumberFromOrderDetailNonApprove($data['order']['orderId']);

        if($number == 0){
            $this->db->where('orderId', $data['order']['orderId']);
            $result = $this->db->update('order', $data['order']);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
        return $result;
    }

}