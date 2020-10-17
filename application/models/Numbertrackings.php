<?php if (!defined('BASEPATH')) {exit('No direct script allowed');}

class Numbertrackings extends CI_Model
{
    public function getNumbertracking($orderDetailId)
    {
        $this->db->where('orderDetailId', $orderDetailId);
        $query = $this->db->get("numbertracking");
        return $query->row();
    }
}