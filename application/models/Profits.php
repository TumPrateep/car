<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Profits extends CI_Model
{

    public function getProfit($month = null, $year = null)
    {
        $this->db->select("count(order.orderId) as number, sum(orderdetail.price_per_unit*orderdetail.quantity) as price, sum(orderdetail.real_product_price) as real_product_price, sum(orderdetail.product_price * orderdetail.quantity) as product_price, sum(orderdetail.charge_price*orderdetail.quantity) as charge_price, sum(orderdetail.delivery_price*orderdetail.quantity) as delivery_price, sum(orderdetail.garage_service_price*orderdetail.quantity) as garage_service_price, sum(orderdetail.carjaidee_service_price*orderdetail.quantity) as carjaidee_service_price, sum(orderdetail.min_product_price*orderdetail.quantity) as min_product_price");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('payment', 'order.orderId = payment.orderId');

        if (!empty($month)) {
            $this->db->where('month(payment.date)', $month);
            $this->db->group_by('month(payment.date)');
        }

        if (!empty($year)) {
            $this->db->where('year(payment.date)', $year);
            $this->db->group_by('year(payment.date)');
        }
        $this->db->where('payment.status', 2);
        $query = $this->db->get();
        return $query->row();
    }

    public function getAllIncome($month = null, $year = null)
    {
        $this->db->select("sum(orderdetail.price_per_unit*orderdetail.quantity) as price, month(payment.date) as month");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('payment', 'order.orderId = payment.orderId');

        if (!empty($month)) {
            $this->db->where('month(payment.date)', $month);
        }

        if (!empty($year)) {
            $this->db->where('year(payment.date)', $year);
        }
        $this->db->group_by('month(payment.date)');
        $this->db->where('payment.status', 2);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllProfit($month = null, $year = null)
    {
        $this->db->select("sum(((orderdetail.min_product_price*orderdetail.quantity)-orderdetail.real_product_price)+( (orderdetail.carjaidee_service_price - orderdetail.garage_service_price)*orderdetail.quantity)+(orderdetail.charge_price*orderdetail.quantity)) as price, month(payment.date) as month");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('payment', 'order.orderId = payment.orderId');

        if (!empty($month)) {
            $this->db->where('month(payment.date)', $month);
        }

        if (!empty($year)) {
            $this->db->where('year(payment.date)', $year);
        }
        $this->db->group_by('month(payment.date)');
        $this->db->where('payment.status', 2);
        $query = $this->db->get();
        // dd();
        return $query->result();
    }

}