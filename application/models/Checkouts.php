<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Checkouts extends CI_Model
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
            $message = "หมายเลขสั่งซื้อ: ".$orderId."\nผู้สั่งซื้อ: ".$data['order']['userId']."\nสินค้าที่สั่ง: ยางรถยนต์".$data['orderdetail']['productId']."\nจำนวน: ".$data['orderdetail']['quantity']."\nราคารวม: ".$data["payments"]['money']."\nสถานะ: ".$data["payments"]['status'];
            send_line_message($message);
            $this->db->trans_commit();
            return true;
        }
    }

}