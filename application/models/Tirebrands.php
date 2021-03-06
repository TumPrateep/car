<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Tirebrands extends CI_Model
{

    public function data_check_create($tire_brandName)
    {
        $this->db->select("tire_brandName");
        $this->db->from("tire_brand");
        $this->db->where("tire_brandName", $tire_brandName);
        $result = $this->db->get();
        return $result->row();
    }

    public function checkBrand($name)
    {
        $this->db->select("tire_brandName");
        $this->db->from("tire_brand");
        $this->db->where("tire_brandName", $name);
        $result = $this->db->count_all_results();
        if ($result > 0) {
            return true;
        }
        return false;
    }
    public function insert($data)
    {
        return $this->db->insert('tire_brand', $data);
    }
    public function getTireBrandById($tire_brandId)
    {
        return $this->db->where('tire_brandId', $tire_brandId)->get("tire_brand")->row();
    }
    public function getUpdate($tire_brandId)
    {
        $this->db->select("tire_brandId,tire_brandName,tire_brandPicture");
        $this->db->from("tire_brand");
        $this->db->where('tire_brandId', $tire_brandId);
        $result = $this->db->get();
        return $result->row();
    }
    public function delete($tire_brandId)
    {
        return $this->db->delete('tire_brand', array('tire_brandId' => $tire_brandId));
    }
    public function wherenot($tire_brandId, $tire_brandName)
    {
        $this->db->select("tire_brandName");
        $this->db->from("tire_brand");
        $this->db->where('tire_brandName', $tire_brandName);
        $this->db->where_not_in('tire_brandId', $tire_brandId);
        $result = $this->db->get();
        return $result->row();
    }
    public function update($data)
    {
        $this->db->where('tire_brandId', $data['tire_brandId']);
        $result = $this->db->update('tire_brand', $data);
        return $result;
    }
    public function allTirebrand_count()
    {
        $query = $this
            ->db
            ->get('tire_brand');

        return $query->num_rows();

    }

    public function allTirebrand($limit, $start, $col, $dir)
    {
        $query = $this
            ->db
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('tire_brand');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }
    public function tirebrand_search($limit, $start, $search, $col, $dir, $status)
    {
        $this->db->like('tire_brandName', $search);
        if ($status != null) {
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('tire_brand');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    public function tirebrand_search_count($search, $status)
    {
        $query = $this
            ->db
            ->like('tire_brandName', $search)
            ->where('status', $status)
            ->get('tire_brand');

        return $query->num_rows();
    }
    public function checkTireBrandforget($tire_brandId)
    {
        $this->db->select("tire_brandId");
        $this->db->from("tire_brand");
        $result = $this->db->count_all_results();
        if ($result > 0) {
            return true;
        }
        return false;
    }
    public function updateStatus($tire_brandId, $data)
    {
        $this->db->where('tire_brandId', $tire_brandId);
        $result = $this->db->update('tire_brand', $data);
        return $result;
    }

    public function getAllTireBrandByName($q, $limit)
    {
        if ($q != null && $q != "") {
            $this->db->like('tire_brandName', $q);
        }
        return $this->db->limit($limit, 0)->get("tire_brand")->result();
    }

    public function checkStatusFromTireBrand($tire_brandId, $status, $userId)
    {

        $this->db->from("tire_brand");
        $this->db->where('status', $status);
        $this->db->where('create_by', $userId);
        $this->db->where('tire_brandId', $tire_brandId);
        $this->db->where('activeFlag', 2);
        $result = $this->db->count_all_results();

        if ($result > 0) {
            return true;
        }
        return false;
    }

    public function getAllTirebrands()
    {
        $this->db->select("tire_brandId,tire_brandName,tire_brandPicture as picture");
        $this->db->where('status', '1');
        $query = $this->db->get("tire_brand");
        return $query->result();
    }
}