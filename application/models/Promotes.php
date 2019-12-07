<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Promotes extends CI_Model
{

    public function insert($data)
    {
        $result = $this->db->insert('promote', $data);
        return $result;
    }

    public function data_check_create($promoteId)
    {
        // $this->db->select("personalid");
        $this->db->from("promote");
        $this->db->where('promoteId', $promoteId);
        $result = $this->db->get();
        return $result->row();
    }

    public function allPromotes_count()
    {
        $this->db->select("promoteId, image_url, status");
        $this->db->from('promote');
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function allPromotes($limit, $start, $order, $dir) //$limit,$start,$col,$dir,$order

    {
        $this->db->select("promoteId, image_url, status");
        $this->db->from('promote');
        $this->db->limit($limit, $start)->order_by($order, $dir);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function delete($promoteId)
    {
        return $this->db->delete('promote', array('promoteId' => $promoteId));
    }

    public function getPromoteById($promoteId)
    {
        return $this->db->where('promoteId', $promoteId)->get("promote")->row();
    }

    public function update($data)
    {
        $this->db->where('promoteId', $data['promoteId']);
        $result = $this->db->update('promote', $data);
        return $result;
    }

    public function getAllBannerWithStatus()
    {
        $this->db->where('status', 1);
        $result = $this->db->get('promote');
        return $result->result();
    }

}