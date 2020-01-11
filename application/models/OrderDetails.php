<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Orderdetails extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getorderDetailById($orderDetailId)
    {
        $this->db->select("orderDetailId");
        $this->db->where('orderDetailId', $orderDetailId);
        $result = $this->db->get("orderdetail");
        return $result->row();
    }

    public function getorderdata($orderId)
    {
        $this->db->select("order.orderId,user_profile.firstname,user_profile.lastname,car_profile.character_plate,car_profile.number_plate,provinceforcar.provinceforcarName,brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.modelofcarName,user_profile.titleName");
        $this->db->from('order');
        $this->db->join('users', 'order.userId = users.id');
        $this->db->join('user_profile', 'users.id = user_profile.userId');
        $this->db->join('car_profile', 'order.car_profileId = car_profile.car_profileId');
        $this->db->join('provinceforcar', 'car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->join('brand', 'car_profile.brandId = brand.brandId');
        $this->db->join('model', 'car_profile.modelId = model.modelId');
        $this->db->join('modelofcar', 'car_profile.modelofcarId = modelofcar.modelofcarId');
        $this->db->where('order.orderId', $orderId);
        $this->db->where('order.status', 4);
        $result = $this->db->get("orderdetail");
        return $result->row();
    }

    public function getOrderDetailByOrderId($orderId)
    {

        $this->db->where("orderId", $orderId);
        $query = $this->db->get("orderdetail");
        return $query->result();
    }

    public function allorders_count($garageId)
    {
        $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.group, orderdetail.productId, orderdetail.quantity, garage.garageId, orderdetail.status");
        // $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.quantity, orderdetail.status, reserve.garageId, orderdetail.group, orderdetail.productId,car_accessories.car_accessoriesName,user_profile.firstname,user_profile.lastname,car_profile.character_plate,car_profile.number_plate,provinceforcar.provinceforcarName,brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.modelofcarName,user_profile.titleName,spares_change_garage.spares_price,tire_change_garage.tire_price,lubricator_change_garage.lubricator_price");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'reserve.garageId = garage.garageId');
        $this->db->join('numbertracking', 'numbertracking.orderId = order.orderId');

        $this->db->where('order.status', 4);
        $this->db->where('orderdetail.status', 2);
        // $this->db->where('numbertracking.garageId', $garageId);

        $query = $this->db->get();
        return $query->num_rows();

    }

    public function allorders($limit, $start, $order, $dir, $garageId) //$limit,$start,$col,$dir,$order

    {
        $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.group, orderdetail.productId, orderdetail.quantity, garage.garageId, orderdetail.status");
        // $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.quantity, orderdetail.status, reserve.garageId, orderdetail.group, orderdetail.productId,car_accessories.car_accessoriesName,user_profile.firstname,user_profile.lastname,car_profile.character_plate,car_profile.number_plate,provinceforcar.provinceforcarName,brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.modelofcarName,user_profile.titleName,spares_change_garage.spares_price,tire_change_garage.tire_price,lubricator_change_garage.lubricator_price");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'reserve.garageId = garage.garageId');
        $this->db->join('numbertracking', 'numbertracking.orderId = order.orderId');

        $this->db->where('order.status', 4);
        $this->db->where('orderdetail.status', 2);
        // $this->db->where('numbertracking.garageId', $garageId);
        $this->db->limit($limit, $start)->order_by($order, $dir);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function allReceiveOrders_count($garageId)
    {
        $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.group, orderdetail.productId, orderdetail.quantity, garage.garageId, orderdetail.status");
        // $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.quantity, orderdetail.status, reserve.garageId, orderdetail.group, orderdetail.productId,car_accessories.car_accessoriesName,user_profile.firstname,user_profile.lastname,car_profile.character_plate,car_profile.number_plate,provinceforcar.provinceforcarName,brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.modelofcarName,user_profile.titleName,spares_change_garage.spares_price,tire_change_garage.tire_price,lubricator_change_garage.lubricator_price");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'reserve.garageId = garage.garageId');
        $this->db->join('numbertracking', 'numbertracking.orderId = order.orderId');

        $this->db->where('order.status', 5);
        // $this->db->where('orderdetail.status', 2);
        $this->db->where('reserve.garageId', $garageId);

        $query = $this->db->get();
        return $query->num_rows();

    }

    public function allReceiveOrders($limit, $start, $order, $dir, $garageId) //$limit,$start,$col,$dir,$order

    {
        $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.group, orderdetail.productId, orderdetail.quantity, garage.garageId, orderdetail.status");
        // $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.quantity, orderdetail.status, reserve.garageId, orderdetail.group, orderdetail.productId,car_accessories.car_accessoriesName,user_profile.firstname,user_profile.lastname,car_profile.character_plate,car_profile.number_plate,provinceforcar.provinceforcarName,brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.modelofcarName,user_profile.titleName,spares_change_garage.spares_price,tire_change_garage.tire_price,lubricator_change_garage.lubricator_price");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'reserve.garageId = garage.garageId');
        $this->db->join('numbertracking', 'numbertracking.orderId = order.orderId');

        $this->db->where('order.status', 5);
        // $this->db->where('orderdetail.status', 2);
        $this->db->where('reserve.garageId', $garageId);
        $this->db->limit($limit, $start)->order_by($order, $dir);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function allreturnorders_count($garageId)
    {
        $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.group, orderdetail.productId, orderdetail.quantity, garage.garageId, orderdetail.status");
        // $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.quantity, orderdetail.status, reserve.garageId, orderdetail.group, orderdetail.productId,car_accessories.car_accessoriesName,user_profile.firstname,user_profile.lastname,car_profile.character_plate,car_profile.number_plate,provinceforcar.provinceforcarName,brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.modelofcarName,user_profile.titleName,spares_change_garage.spares_price,tire_change_garage.tire_price,lubricator_change_garage.lubricator_price");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'reserve.garageId = garage.garageId');
        $this->db->join('numbertracking', 'numbertracking.orderId = order.orderId');

        $this->db->where('order.status', 4);
        $this->db->where('orderdetail.status', 9);
        // $this->db->where('numbertracking.garageId', $garageId);

        $query = $this->db->get();
        return $query->num_rows();

    }

    public function allreturnorders($limit, $start, $order, $dir, $garageId) //$limit,$start,$col,$dir,$order

    {
        $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.group, orderdetail.productId, orderdetail.quantity, garage.garageId, orderdetail.status");
        // $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.quantity, orderdetail.status, reserve.garageId, orderdetail.group, orderdetail.productId,car_accessories.car_accessoriesName,user_profile.firstname,user_profile.lastname,car_profile.character_plate,car_profile.number_plate,provinceforcar.provinceforcarName,brand.brandName,model.modelName,model.yearStart,model.yearEnd,modelofcar.modelofcarName,user_profile.titleName,spares_change_garage.spares_price,tire_change_garage.tire_price,lubricator_change_garage.lubricator_price");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'reserve.garageId = garage.garageId');
        $this->db->join('numbertracking', 'numbertracking.orderId = order.orderId');

        $this->db->where('order.status', 4);
        $this->db->where('orderdetail.status', 9);
        // $this->db->where('numbertracking.garageId', $garageId);
        $this->db->limit($limit, $start)->order_by($order, $dir);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function alleffort_count($garageId)
    {
        $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.group, orderdetail.productId, orderdetail.quantity, garage.garageId, orderdetail.status");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'reserve.garageId = garage.garageId');
        $this->db->join('numbertracking', 'numbertracking.orderId = order.orderId');

        // $this->db->where('order.status', 4);
        $this->db->where('order.statusSuccess', 2);

        $query = $this->db->get();
        return $query->num_rows();

    }

    public function alleffort($limit, $start, $order, $dir, $garageId) //$limit,$start,$col,$dir,$order

    {
        $this->db->select("order.orderId, orderdetail.orderDetailId, orderdetail.group, orderdetail.productId, orderdetail.quantity, garage.garageId, orderdetail.status");
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId  = orderdetail.orderId');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('garage', 'reserve.garageId = garage.garageId');
        $this->db->join('numbertracking', 'numbertracking.orderId = order.orderId');

        // $this->db->where('order.status', 4);
        $this->db->where('order.statusSuccess', 2);
        // $this->db->where('numbertracking.garageId', $garageId);
        $this->db->limit($limit, $start)->order_by($order, $dir);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function orders_search($limit, $start, $col, $dir, $orderId)
    {
        $this->db->where('status', 2);
        $this->db->like('firstName', $firstname);
        if ($brandId != null) {
            $this->db->where("brandId", $brandId);
        }
        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('order');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }
    public function getSummaryCostFromOrderDetail($orderId, $userId)
    {
        $this->db->select("sum(price_per_unit*quantity) as cost");
        $this->db->where("orderId", $orderId);
        $result = $this->db->get("orderdetail");
        return $result->row('cost');
    }

    public function getSummarycostDelivery($orderId)
    {
        $this->db->where("orderId", $orderId);
        $result = $this->db->get("order");
        return $result->row('costDelivery');
    }

    public function orders_search_count($orderId)
    {
        $this->db->where('status', 2);
        $this->db->where("garageId", $garageId);
        $this->db->like('firstName', $firstname);
        if ($orderId != null) {
            $this->db->where("$orderId", $$orderId);
        }
        $query = $this->db->get('order');
        return $query->num_rows();
    }

    public function insert($data)
    {
        $this->db->trans_begin();

        $this->db->where('orderDetailId', $data['orderDetailId']);
        $this->db->update('orderdetail', $data);

        // $order = $this->getOrderId($data['orderDetailId']);
        // $this->db->where('orderId', $order->orderId);
        // $this->db->update('order', array('statusSuccess' => 2));

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update($data)
    {
        $this->db->where('orderDetailId', $data['orderDetailId']);
        $result = $this->db->update('orderdetail', $data);
        return $result;
    }

    public function getDatagarage($garageId)
    {
        $this->db->select("picture, garageName, dayopenhour, openingtime, closingtime, phone");
        $this->db->join("reserve", "garage.garageId = reserve.garageId");
        $this->db->where('garage.garageId', $garageId);
        $result = $this->db->get("garage");
        return $result->row();
    }

    public function getDatareserve($reserveId)
    {
        // $this->db->select("reserveDate, reservetime");
        $this->db->where('reserveId', $reserveId);
        $result = $this->db->get("reserve");
        return $result->row();
    }

    public function getDatacarprofile($car_profileId)
    {
        $this->db->select("car_profile.pictureFront, car_profile.character_plate, car_profile.number_plate, provinceforcar.provinceforcarName, brand.brandName, model.modelName, model.yearStart, model.yearEnd, model.detail, car_profile.year");
        $this->db->from('car_profile');
        $this->db->join('provinceforcar', 'car_profile.province_plate  = provinceforcar.provinceforcarId');
        $this->db->join('brand', 'car_profile.brandId  = brand.brandId');
        $this->db->join('model', 'car_profile.modelId  = model.modelId');
        // $this->db->join('modelofcar', 'car_profile.modelofcarId  = modelofcar.modelofcarId', 'left');

        $this->db->where('car_profile.car_profileId', $car_profileId);
        $result = $this->db->get();
        return $result->row();
    }

    public function getIdData($orderId)
    {
        $this->db->select("reserve.garageId, order.car_profileId, reserve.reserveId, reserve.reserveDate, reserve.reserveTime");
        $this->db->from('order');
        $this->db->join('reserve', 'order.orderId  = reserve.orderId');
        $this->db->where('order.orderId', $orderId);
        $result = $this->db->get();
        return $result->row();
    }

    public function getOrderId($orderDetailId)
    {
        $this->db->where('orderDetailId', $orderDetailId);
        $query = $this->db->get('orderdetail');
        return $query->row();
    }

    public function getCaraccessory($car_accessoriesId)
    {
        $query = $this->db->where("car_accessoriesId", $car_accessoriesId)->get("car_accessories");
        return $query->row();
    }

    public function getDeliverStatus($orderId)
    {
        $this->db->where('orderId', $orderId);
        $this->db->where('status', 3);
        $query = $this->db->get('orderdetail');
        return $query->row();
    }

}