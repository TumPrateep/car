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
    function data_check_create($groupId){
        $this->db->from("lubricator_limit");
        $this->db->where('groupId', $groupId);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('lubricator_limit',$data);
    }
    function getLubricatorChangeById($groupId){
        $this->db->select("groupId");
        $this->db->where('groupId',$groupId);
        $result = $this->db->get("lubricator_limit");
        return $result->row();
    }
    function delete($groupId){
        return $this->db->delete('lubricator_limit', array('groupId' => $groupId));
    }
    public function getLubricatorlimitChangeByLimitId($limitId)
    {
        $this->db->select("limitId");
        $this->db->where('limitId', $limitId);
        $result = $this->db->get("lubricator_limit");
        return $result->row();
    }
    public function data_check_update($limitId, $groupId)
    {
        $this->db->select("limitId, price");
        $this->db->from("lubricator_limit");
        $this->db->where('groupId', $groupId);
        $this->db->where_not_in('limitId', $limitId);
        $result = $this->db->get();
        return $result->row();
    }
    public function update($data)
    {
        $this->db->where('limitId', $data['limitId']);
        $result = $this->db->update('lubricator_limit', $data);
        return $result;
    }
    public function getUpdate($limitId)
    {
        $this->db->select("limitId, price");
        $this->db->where('limitId', $limitId);
        $result = $this->db->get("lubricator_limit")->row();
        return $result;
    }
    public function getMaxPrice($groupId)
    {
        $this->db->where('groupId', $groupId);
        $result = $this->db->get('lubricator_limit');
        return $result->row();
    }
}