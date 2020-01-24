<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Payments extends CI_Model
{

    // function delete($mechanicId){
    //     return $this->db->delete('mechanic', array('mechanicId' => $mechanicId));
    // }

    public function getPaymentId($orderId)
    {
        return $this->db->where('orderId', $orderId)->get("payment")->row();
    }

    // function insert($data){
    //     return $this->db->insert('payment', $data);
    // }

    public function allpayment_count()
    {
        $query = $this
            ->db
            ->get('payment');

        return $query->num_rows();
    }

    public function allpayment($limit, $start, $col, $dir)
    {
        $query = $this
            ->db
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('payment');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function data_check_create($paymentId)
    {
        $this->db->select("paymentId");
        $this->db->from("payment");
        $this->db->where('paymentId', $paymentId);
        $result = $this->db->get();
        return $result->row();
    }

    public function getPaymentById($paymentId)
    {
        $this->db->select("paymentId");
        $this->db->where('paymentId', $paymentId);
        $result = $this->db->get("payment");
        return $result->row();
    }

    public function getDepositflag($orderId)
    {
        $this->db->select("depositflag,costDelivery");
        $this->db->where('orderId', $orderId);
        $result = $this->db->get("order");
        return $result->row();
    }

    public function insert($data)
    {
        $this->db->trans_begin();
        $userId = $this->session->userdata['logged_in']['id'];
        $this->db->insert('payment', $data);

        $this->db->where('orderId', $data['orderId']);
        $result = $this->db->update('order', ['status' => 2]);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function getฺBank()
    {
        $this->db->select("bankId,bankName");
        $this->db->order_by('bankName', 'ASC');
        $query = $this->db->get("bank_carjaidee");
        return $query->result();
    }

    public function update($data)
    {
        $this->db->trans_begin();
        $this->db->where('orderId', $data['orderId']);
        $this->db->update('payment', $data);

        $this->db->where('orderId', $data['orderId']);
        $this->db->update('order', ['status' => 2]);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    ///////////  ManagepartsshopPaymentApprove

    public function allManagepartsshopPaymentApprove_count($car_accessoriesId)
    {
        $this->db->select('order.orderId, order.payment_status, orderdetail.real_product_price');
        $this->db->from('order');
        $this->db->join('orderdetail', 'orderdetail.orderId = order.orderId');
        $this->db->where('orderdetail.real_car_accessoriesId', $car_accessoriesId);
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function allManagepartsshopPaymentApprove($limit, $start, $col, $dir, $car_accessoriesId)
    {
        $this->db->select('order.orderId, order.payment_status, orderdetail.real_product_price');
        $this->db->from('order');
        $this->db->join('orderdetail', 'orderdetail.orderId = order.orderId');
        $this->db->where('orderdetail.real_car_accessoriesId', $car_accessoriesId);

        $query = $this->db->limit($limit, $start)->order_by($col, $dir)->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function ManagepartsshopPaymentApprove_search($limit, $start, $search, $col, $dir, $status, $car_accessoriesId)
    {
        $this->db->select('order.orderId, order.payment_status, orderdetail.real_product_price');
        $this->db->from('order');
        $this->db->join('orderdetail', 'orderdetail.orderId = order.orderId');
        $this->db->like('order.orderId',$search);
        $this->db->where('orderdetail.real_car_accessoriesId', $car_accessoriesId);

        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function ManagepartsshopPaymentApprove_search_count($search, $car_accessoriesId){
       
        $this->db->select('order.orderId, order.payment_status, orderdetail.real_product_price');
        $this->db->from('order');
        $this->db->join('orderdetail', 'orderdetail.orderId = order.orderId');
        $this->db->like('order.orderId',$search);
        $this->db->where('orderdetail.real_car_accessoriesId', $car_accessoriesId);

        $query = $this->db->get();
        return $query->num_rows();
    }

    ///////// Garagesmanagement

    public function allGaragesmanagement_count($garageId)
    {
        $this->db->select('order.orderId, order.payment_status, orderdetail.garage_service_price, orderdetail.quantity');
        $this->db->from('order');
        $this->db->join('orderdetail', 'orderdetail.orderId = order.orderId');
        $this->db->join('reserve', 'reserve.orderId = order.orderId');
        $this->db->where('reserve.garageId', $garageId);
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function allGaragesmanagement($limit, $start, $col, $dir, $garageId)
    {
        $this->db->select('order.orderId, order.payment_status, orderdetail.garage_service_price, orderdetail.quantity');
        $this->db->from('order');
        $this->db->join('orderdetail', 'orderdetail.orderId = order.orderId');
        $this->db->join('reserve', 'reserve.orderId = order.orderId');
        $this->db->where('reserve.garageId', $garageId);

        $query = $this->db->limit($limit, $start)->order_by($col, $dir)->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function Garagesmanagement_search($limit, $start, $search, $col, $dir, $status, $garageId)
    {
        $this->db->select('order.orderId, order.payment_status, orderdetail.garage_service_price, orderdetail.quantity');
        $this->db->from('order');
        $this->db->join('orderdetail', 'orderdetail.orderId = order.orderId');
        $this->db->join('reserve', 'reserve.orderId = order.orderId');
        $this->db->like('order.orderId',$search);
        $this->db->where('reserve.garageId', $garageId);

        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function Garagesmanagement_search_count($search, $garageId)
    {
        $this->db->select('order.orderId, order.payment_status, orderdetail.garage_service_price, orderdetail.quantity');
        $this->db->from('order');
        $this->db->join('orderdetail', 'orderdetail.orderId = order.orderId');
        $this->db->join('reserve', 'reserve.orderId = order.orderId');
        $this->db->like('order.orderId',$search);
        $this->db->where('reserve.garageId', $garageId);

        $query = $this->db->get();
        return $query->num_rows();
    }

}