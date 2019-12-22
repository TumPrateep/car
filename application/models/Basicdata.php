<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Basicdata extends CI_Model
{

    public function get()
    {
        $this->db->limit(1);
        $result = $this->db->get("basedata");
        return $result->row();
    }

}