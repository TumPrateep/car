<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Bills extends CI_Model
{
    public function allBillGarage_count($garageId)
    {
        $query = $this
            ->db->where('garageId', $garageId)
            ->get('bill_garage_payment');

        return $query->num_rows();

    }

    public function allBillGarage($limit, $start, $col, $dir, $garageId)
    {
        $query = $this
            ->db
            ->where('garageId', $garageId)
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('bill_garage_payment');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function allBillCaraccessories_count($caraccessoriesId)
    {
        $query = $this
            ->db->where('caraccessoriesId', $caraccessoriesId)
            ->get('bill_caraccessories_payment');

        return $query->num_rows();

    }

    public function allBillCaraccessories($limit, $start, $col, $dir, $caraccessoriesId)
    {
        $query = $this
            ->db
            ->where('caraccessoriesId', $caraccessoriesId)
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('bill_caraccessories_payment');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function getAllCaraccessoriesOrder($userId, $start_date, $end_date)
    {
        $this->db->select('order.orderId, order.status, orderdetail.quantity, orderdetail.real_product_price, tire_brand.tire_brandName, tire_model.tire_modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size');
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId = orderdetail.orderId');
        $this->db->join('tire_data', 'orderdetail.real_productId = tire_data.tire_dataId');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');

        if (!empty($userId)) {
            $this->db->where('orderdetail.car_accessoriesId', $userId);
        }
        if (!empty($start_date)) {
            $this->db->where('order.create_at >= ', $start_date);
        }
        if (!empty($end_date)) {
            $this->db->where('order.create_at <= ', $end_date);
        }
        $this->db->where('order.status', '6');
        $this->db->where('order.payment_status', '1');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllGarageOrder($garageId, $start_date, $end_date)
    {
        $this->db->select('order.orderId, order.status, orderdetail.quantity, orderdetail.real_product_price, sum(orderdetail.garage_service_price*orderdetail.quantity) as service_price, sum(orderdetail.delivery_price * orderdetail.quantity) as delivery_price, tire_brand.tire_brandName, tire_model.tire_modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size');
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('tire_data', 'orderdetail.real_productId = tire_data.tire_dataId');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');

        if (!empty($userId)) {
            $this->db->where('reserve.garageId', $garageId);
        }
        if (!empty($start_date)) {
            $this->db->where('order.create_at >= ', $start_date);
        }
        if (!empty($end_date)) {
            $this->db->where('order.create_at <= ', $end_date);
        }
        $this->db->where('order.status', '6');
        $this->db->where('reserve.payment_status', '1');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCaraccessoriesBillById($billId)
    {
        $this->db->select('bill_caraccessories_payment.*,order.orderId, order.status, orderdetail.quantity, orderdetail.real_product_price, tire_brand.tire_brandName, tire_model.tire_modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size');
        $this->db->from('bill_caraccessories_payment');
        $this->db->join('bill_caraccessories_detail', 'bill_caraccessories_payment.billId = bill_caraccessories_detail.billId');
        $this->db->join('order', 'order.orderId = bill_caraccessories_detail.orderId');
        $this->db->join('orderdetail', 'order.orderId = orderdetail.orderId');
        $this->db->join('tire_data', 'orderdetail.real_productId = tire_data.tire_dataId');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');

        $this->db->where('bill_caraccessories_payment.billId', $billId);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCaraccessoriesBill($billId)
    {
        $this->db->select('bill_caraccessories_payment.*');
        $this->db->from('bill_caraccessories_payment');
        $this->db->where('bill_caraccessories_payment.billId', $billId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getGarageBillById($billId)
    {
        $this->db->select('bill_garage_payment.*,order.orderId, order.status, orderdetail.quantity, orderdetail.real_product_price, tire_brand.tire_brandName, tire_model.tire_modelName, concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size, bill_garage_detail.delivery_price');
        $this->db->from('bill_garage_payment');
        $this->db->join('bill_garage_detail', 'bill_garage_payment.billId = bill_garage_detail.billId');
        $this->db->join('order', 'order.orderId = bill_garage_detail.orderId');
        $this->db->join('orderdetail', 'order.orderId = orderdetail.orderId');
        $this->db->join('tire_data', 'orderdetail.real_productId = tire_data.tire_dataId');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');

        $this->db->where('bill_garage_payment.billId', $billId);
        $query = $this->db->get();
        return $query->result();
    }

    public function getGarageBill($billId)
    {
        $this->db->select('bill_garage_payment.*');
        $this->db->from('bill_garage_payment');
        $this->db->where('bill_garage_payment.billId', $billId);
        $query = $this->db->get();
        return $query->row();
    }
}