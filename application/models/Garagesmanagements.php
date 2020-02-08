<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Garagesmanagements extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function update($data)
    {
        $this->db->trans_begin();
        $this->db->where('garageId', $data['garagedata']['garageId']);
        $this->db->update('garage', $data['garagedata']);

        if (!empty($data['mechanicdata']['mechanicId'])) {
            $this->db->where('mechanicId', $data['mechanicdata']['mechanicId']);
            $this->db->update('mechanic', $data['mechanicdata']);
        } else {
            $this->db->insert('mechanic', $data['mechanicdata']);
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