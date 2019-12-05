<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Deliverorders extends CI_Model
{

    public function insert($data)
    {
        $this->db->trans_begin();
        $this->db->insert('numbertracking', $data);

        $this->db->where('orderId', $data['orderId']);
        $this->db->where('car_accessoriesId', $data['create_by']);
        $this->db->update('orderdetail', ["status" => 2]);

        $this->db->where('orderId', $data['orderId']);
        $this->db->update('order', ["status" => 5]);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function getDeliverordersById($orderId)
    {
        $this->db->select("order.orderId, car_accessories.car_accessoriesName, (car_accessories.phone) as phonecar, car_accessories.address, reserve.garageId, garage.garageName, (garage.phone) as phonegarage, garage.hno, garage.Alley, garage.road, garage.village, garage.postCode, garage.subdistrictId, garage.districtId, garage.provinceId
        , car_accessories.postCode as carpostCode, car_accessories.provinceId as carprovinceId, car_accessories.districtId as cardistrictId, car_accessories.subdistrictId as carsubdistrictId");
        $this->db->from('order');
        $this->db->join('car_accessories', 'car_accessories.userId = order.car_accessoriesId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'garage.garageId = reserve.garageId');
        $this->db->where('order.status', 3);
        return $this->db->where('order.orderId', $orderId)->get()->row();

    }

    public function allDeliverorders_count($userId)
    {
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId, garage.garageName");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'garage.garageId = reserve.garageId');
        $this->db->where('order.status', 4);
        $this->db->where('orderdetail.status', 1);
        $this->db->where('orderdetail.car_accessoriesId', $userId);
        $query = $this->db->get();

        return $query->num_rows();

    }

    public function allDeliverorders($limit, $start, $order, $dir, $userId) //$limit,$start,$col,$dir,$order

    {
        $this->db->select("order.orderId, orderdetail.quantity, orderdetail.product_price, reserve.garageId, orderdetail.group, orderdetail.productId,garage.garageName");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'garage.garageId = reserve.garageId');
        $this->db->where('order.status', 4);
        $this->db->where('orderdetail.status', 1);
        $this->db->where('orderdetail.car_accessoriesId', $userId);
        $this->db->limit($limit, $start)->order_by($order, $dir);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function allShoworders_count($userId)
    {
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId, garage.garageName, numbertracking.create_at");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'garage.garageId = reserve.garageId');
        $this->db->join('numbertracking', 'numbertracking.orderId = order.orderId');
        $this->db->where('order.status >=', 5);
        // $this->db->where('orderdetail.status !=', 1);
        $this->db->where('orderdetail.car_accessoriesId', $userId);
        $query = $this->db->get();

        return $query->num_rows();

    }

    public function allShoworders($limit, $start, $order, $dir, $userId) //$limit,$start,$col,$dir,$order

    {
        $this->db->select("order.orderId, orderdetail.quantity, orderdetail.product_price, reserve.garageId, orderdetail.group, orderdetail.productId,garage.garageName, numbertracking.create_at");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'garage.garageId = reserve.garageId');
        $this->db->join('numbertracking', 'numbertracking.orderId = order.orderId');
        $this->db->where('order.status >=', 5);
        // $this->db->where('orderdetail.status !=', 1);
        $this->db->where('orderdetail.car_accessoriesId', $userId);
        $this->db->limit($limit, $start)->order_by($order, $dir);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function allRepatriateorder_count($userId)
    {
        $this->db->select("order.orderId, orderdetail.quantity, reserve.garageId, orderdetail.group, orderdetail.productId, garage.garageName");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'garage.garageId = reserve.garageId');
        $this->db->where('order.status', 4);
        $this->db->where('orderdetail.status', 9);
        $this->db->where('orderdetail.car_accessoriesId', $userId);
        $query = $this->db->get();

        return $query->num_rows();

    }

    public function allRepatriateorder($limit, $start, $order, $dir, $userId) //$limit,$start,$col,$dir,$order

    {
        $this->db->select("order.orderId, orderdetail.quantity, orderdetail.costCaraccessories, reserve.garageId, orderdetail.group, orderdetail.productId,garage.garageName");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'garage.garageId = reserve.garageId');
        $this->db->where('order.status', 4);
        $this->db->where('orderdetail.status', 9);
        $this->db->where('orderdetail.car_accessoriesId', $userId);
        $this->db->limit($limit, $start)->order_by($order, $dir);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function update($data)
    {
        $this->db->where('orderId', $data['orderId']);
        $result = $this->db->update('order', $data);
        return $result;
    }

    public function getorderById($orderId)
    {
        $this->db->select("orderId");
        $this->db->where('orderId', $orderId);
        $result = $this->db->get("order");
        return $result->row();

    }

    public function data_check_update($orderId)
    {
        // $this->db->select("personalid");
        $this->db->from("order");
        $this->db->where('orderId', $orderId);
        // $this->db->where_not_in('garageId', $garageId);
        $result = $this->db->get();
        return $result->row();
    }

    public function data_check_create($orderId)
    {
        // $this->db->select("personalid");
        $this->db->from("numbertracking");
        $this->db->where('orderId', $orderId);
        $result = $this->db->get();
        return $result->row();
    }
}