<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Prices extends CI_Model
{

    public function getPriceFromGarageByRimId($rimId)
    {
        $this->db->from("tire_change_garage");
        $this->db->where("rimId", $rimId);
        $this->db->order_by('tire_price', 'asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function getPriceFromCarjaideeByRimId($rimId)
    {
        $this->db->from("tire_change");
        $this->db->where("rimId", $rimId);
        $this->db->order_by('tire_price', 'asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row('tire_price');
    }

    public function getPriceFromCarjaideeByTireSize($rimId, $tire_sizeId)
    {
        $this->db->select('tire_size_price as price, unit_id');
        $this->db->from("tire_size_charge");
        $this->db->where("rimId", $rimId);
        $this->db->where("tire_sizeId", $tire_sizeId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getPriceFromCarjaideeByTire($rimId, $tire_sizeId)
    {
        $this->db->select('tire_price as price, unit_id');
        $this->db->from('tire_change');
        $this->db->where("rimId", $rimId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getPriceCarjaidee($rimId, $tire_sizeId)
    {
        $data = $this->getPriceFromCarjaideeByTireSize($rimId, $tire_sizeId);
        if (empty($data)) {
            $data = $this->getPriceFromCarjaideeByTire($rimId, $tire_sizeId);
        }

        return $data;
    }

    public function getPriceCarjaideeChangePrice($rimId)
    {
        $this->db->select("rimId,tire_price as price");
        $this->db->where('rimId', $rimId);
        $result = $this->db->get("tire_change");
        return $result->row('price');
    }

    public function getPriceService($rimId)
    {
        $this->db->select("rimId,price");
        $this->db->where('rimId', $rimId);
        $result = $this->db->get("tire_service");
        return $result->row();
    }

    public function getPriceFromGarageByGarageId($rimId, $garageId)
    {
        $this->db->from("garage");
        $this->db->join("tire_change_garage", "garage.garageId = tire_change_garage.garageId");

        $this->db->where("tire_change_garage.rimId", $rimId);
        $this->db->where("garage.garageId", $garageId);
        $query = $this->db->get();
        return $query->row();
    }
}