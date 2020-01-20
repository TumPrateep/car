<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Revenues extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function allData_count()
    {
        $this->db->select("order.orderId, sum(orderdetail.price_per_unit*orderdetail.quantity) as price");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->group_by('orderdetail.orderId');
        $query = $this->db->get();
        // dd();
        return $query->num_rows();
    }

    public function allData($limit, $start, $order, $dir)
    {
        $this->db->select("order.orderId, sum(orderdetail.price_per_unit*orderdetail.quantity) as price, sum(orderdetail.real_product_price) as real_product_price, sum(orderdetail.product_price * orderdetail.quantity) as product_price, sum(orderdetail.charge_price*orderdetail.quantity) as charge_price, sum(orderdetail.delivery_price*orderdetail.quantity) as delivery_price, sum(orderdetail.garage_service_price*orderdetail.quantity) as garage_service_price, sum(orderdetail.carjaidee_service_price*orderdetail.quantity) as carjaidee_service_price, sum(orderdetail.min_product_price*orderdetail.quantity) as min_product_price");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->group_by('orderdetail.orderId');
        $this->db->limit($limit, $start)->order_by($order, $dir);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
}