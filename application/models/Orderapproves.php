<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Orderapproves extends CI_Model
{

    public function getOrderApprovesById($orderId)
    {
        $this->db->select("orderId");
        $this->db->where('orderId', $orderId);
        $result = $this->db->get("order");
        return $result->row();
    }

    public function allOrderApproves($limit, $start, $col, $dir)
    {
        $this->db->select('user_profile.userId,reserve.reserveId, order.orderId, concat(user_profile.firstname," ",user_profile.lastname) as name, reserve.status as reserveStatus, payment.status as paymentStatus, order.status');
        $this->db->from('order');
        $this->db->join('user_profile', 'order.userId = user_profile.userId', 'left');
        $this->db->join('reserve', 'order.orderId = reserve.orderId');
        $this->db->join('payment', 'order.orderId = payment.orderId');
        // $this->db->where('reserve.garageId',$garageId);

        $query = $this->db->limit($limit, $start)->order_by($col, $dir)->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function allOrderApproves_count()
    {
        $this->db->select('orderId,status');
        $this->db->from('order');
        // $this->db->where('order.garageId',$garageId);
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function OrderApproves_search($limit, $start, $search, $col, $dir, $status)
    {

        $this->db->select('user_profile.userId');
        $this->db->from('order');
        $this->db->join('user_profile', 'order.userId = user_profile.userId', 'left');
        // $this->db->where('reserve.garageId',$garageId);

        if ($status != null) {
            $this->db->where("order.status", $status);
        }
        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function OrderApproves_search_count($search, $status)
    {
        $this->db->select('user_profile.userId');
        $this->db->from('order');
        $this->db->join('user_profile', 'order.userId = user_profile.userId', 'left');
        // $this->db->where('reserve.garageId',$garageId);

        if ($search != null) {
            $this->db->where("order.orderId", $search);
        }
        if ($status != null) {
            $this->db->where("order.status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    // function update($data){
    //     $this->db->where('orderId',$data['orderId']);
    //     $result = $this->db->update('order',$data);
    //     return $result;
    // }

    public function update($data)
    {
        $this->db->trans_begin();
        $this->db->where('reserveId', $data['reserveId']);
        $result = $this->db->update('reserve', $data);

        if ($data['status'] == "2") {
            $orderData = [
                "status" => 3,
            ];
            $this->db->where('orderId', $data['orderId']);
            $this->db->update('order', $orderData);
        } else if ($data['status'] == "9") {
            $orderData = [
                "status" => 9,
            ];
            $this->db->where('orderId', $data['orderId']);
            $this->db->update('order', $orderData);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}