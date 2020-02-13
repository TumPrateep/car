<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Lubricatorlimits extends CI_Model
{

    public function allGarageGruop_count()
    {
        $this->db->from('garage_gruop');
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function allGarageGruop($limit, $start, $col, $dir)
    {
        $this->db->from('garage_gruop');
        $query = $this->db->limit($limit, $start)->order_by($col, $dir)->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function allLubricatorlimit_count()
    {
        $this->db->from('lubricator_limit');
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function allLubricatorlimit($limit, $start, $col, $dir,$groupId)
    {
        $this->db->from('lubricator_limit');
        $this->db->where('groupId',$groupId);
        $query = $this->db->limit($limit, $start)->order_by($col, $dir)->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

}