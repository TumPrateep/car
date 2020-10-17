<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Tire_dots extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllDot($orderDetailId)
    {
        $this->db->where('orderDetailId', $orderDetailId);
        $query = $this->db->get('tire_dot');
        return $query->result();
    }

}