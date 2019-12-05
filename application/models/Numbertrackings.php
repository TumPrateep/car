<?php if (!defined('BASEPATH')) {exit('No direct script allowed');}

class Numbertrackings extends CI_Model
{
    public function getNumbertracking($orderId)
    {
        $this->db->where('orderId', $orderId);
        $query = $this->db->get("numbertracking");
        return $query->row();
    }
}