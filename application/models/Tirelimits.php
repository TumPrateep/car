<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Tirelimits extends CI_Model
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

    public function insert($data)
    {
        return $this->db->insert('tire_limit', $data);
    }

    public function data_check_create($rimId, $groupId)
    {
        $this->db->from("tire_limit");
        $this->db->where('rimId', $rimId);
        $this->db->where('groupId', $groupId);
        $result = $this->db->get();
        return $result->row();
    }

    public function allTirechanges_count($groupId)
    {
        $this->db->select('tire_limit.limitId, tire_limit.price, tire_limit.groupId, tire_limit.rimId, rim.rimName');
        $this->db->from('tire_limit');
        $this->db->join('rim', 'tire_limit.rimId = rim.rimId');
        $this->db->where('tire_limit.groupId', $groupId);
        $query = $this->db->get();

        return $query->num_rows();

    }

    public function allTirechanges($limit, $start, $col, $dir, $groupId)
    {
        $this->db->select('tire_limit.limitId, tire_limit.price, tire_limit.groupId, tire_limit.rimId, rim.rimName');
        $this->db->from('tire_limit');
        $this->db->join('rim', 'tire_limit.rimId = rim.rimId');
        $this->db->where('tire_limit.groupId', $groupId);
        $query = $this->db->limit($limit, $start)->order_by($col, $dir)->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function tirechanges_search($limit, $start, $search, $col, $dir, $groupId)
    {

        $this->db->select('tire_limit.limitId, tire_limit.price, tire_limit.groupId, tire_limit.rimId, rim.rimName');
        $this->db->from('tire_limit');
        $this->db->join('rim', 'tire_limit.rimId = rim.rimId');
        $this->db->like('rim.rimName', $search);
        $this->db->where('tire_limit.groupId', $groupId);
        // if($status != null){
        //     $this->db->where("tire_change.status", $status);
        // }
        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function tirechanges_search_count($search, $groupId)
    {

        $this->db->select('tire_limit.limitId, tire_limit.price, tire_limit.groupId, tire_limit.rimId, rim.rimName');
        $this->db->from('tire_limit');
        $this->db->join('rim', 'tire_limit.rimId = rim.rimId');
        $this->db->like('rim.rimName', $search);
        $this->db->where('tire_limit.groupId', $groupId);
        // if($status != null){
        //     $this->db->where("tire_change.status", $status);
        // }
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function getUpdate($limitId)
    {
        $this->db->select("limitId, price, rimId");
        $this->db->where('limitId', $limitId);
        $result = $this->db->get("tire_limit")->row();
        return $result;
    }

    public function getTireChangeById($limitId)
    {
        $this->db->select("limitId");
        $this->db->where('limitId', $limitId);
        $result = $this->db->get("tire_limit");
        return $result->row();
    }

    public function delete($limitId)
    {
        return $this->db->delete('tire_limit', array('limitId' => $limitId));
    }

    public function data_check_update($limitId, $rimId, $groupId)
    {
        $this->db->select("limitId, rimId, price");
        $this->db->from("tire_limit");
        $this->db->where('rimId', $rimId);
        $this->db->where('groupId', $groupId);
        $this->db->where_not_in('limitId', $limitId);
        $result = $this->db->get();
        return $result->row();
    }

    public function update($data)
    {
        $this->db->where('limitId', $data['limitId']);
        $result = $this->db->update('tire_limit', $data);
        return $result;
    }

    public function getMaxPrice($groupId, $rimId)
    {
        $this->db->where('rimId', $rimId);
        $this->db->where('groupId', $groupId);
        $result = $this->db->get('tire_limit');
        return $result->row();
    }

}