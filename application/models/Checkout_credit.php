<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Checkout_credit extends CI_Model
{

    public function insert($data)
    {
        $this->db->trans_begin();

        $this->db->insert('order', $data['order']);
        $orderId = $this->db->insert_id();

        $data['orderdetail']['orderId'] = $orderId;
        $this->db->insert('orderdetail', $data['orderdetail']);

        $data['reserve']['orderId'] = $orderId;
        $this->db->insert('reserve', $data['reserve']);

        if (!empty($data["payments"])) {
            $data['payments']['orderId'] = $orderId;
            $this->db->insert('payment', $data['payments']);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return [
                "url" => gen_credit($orderId, $data['orderdetail']['price_per_unit']*$data['orderdetail']['quantity']),
            ];
        }
    }

}