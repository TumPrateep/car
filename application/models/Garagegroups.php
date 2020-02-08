<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Garagegroups extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllGarageGroup()
    {
        $this->db->from('garage_gruop');
        $query = $this->db->get();
        return $query->result();
    }
}