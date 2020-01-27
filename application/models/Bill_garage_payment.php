<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Bill_garage_payment extends CI_Model
{
    public function insert($data)
    {
        $this->db->trans_begin();
        $this->db->insert('bill_garage_payment', $data['data']);
        $billId = $this->db->insert_id();

        foreach ($data['order'] as $i => $v) {
            $temp = [
                'billId' => $billId,
                'orderId' => $v,
                'quantity' => $data['quantity'][$i],
                'amount' => $data['amount'][$i],
            ];
            $this->db->insert('bill_garage_detail', $temp);

            $this->db->where('reserve.orderId', $v);
            $this->db->update('reserve', ['payment_status' => 2]);
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