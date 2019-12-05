<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Orderselects extends CI_Model
{

    public function allData_count()
    {
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId,garage.garageName");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'garage.garageId = reserve.garageId');
        $this->db->where('order.status', 3);
        $this->db->where('reserve.status', 2);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function allData($limit, $start, $order, $dir)
    {

        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId,garage.garageName,order.status");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'garage.garageId = reserve.garageId');
        $this->db->where('order.status', 3);
        $this->db->where('reserve.status', 2);
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

}