<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Prices extends CI_Model{

    function getPriceFromGarageByRimId($rimId){
        $this->db->from("tire_change_garage");
        $this->db->where("rimId", $rimId);
        $this->db->order_by('tire_price', 'asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    function getPriceFromCarjaideeByTireSize($rimId, $tire_sizeId){
        $this->db->select('tire_size_price as price, unit_id');
        $this->db->from("tire_size_charge");
        $this->db->where("rimId", $rimId);
        $this->db->where("tire_sizeId", $tire_sizeId);
        $query = $this->db->get();
        return $query->row();
    }

    function getPriceFromCarjaideeByTire($rimId, $tire_sizeId){
        $this->db->select('tire_price as price, unit_id');
        $this->db->from('tire_change');
        $this->db->where("rimId", $rimId);
        $query = $this->db->get();
        return $query->row();
    }

    function getPriceCarjaidee($rimId, $tire_sizeId){
        $data = $this->getPriceFromCarjaideeByTireSize($rimId, $tire_sizeId);
        if(empty($data)){
            $data = $this->getPriceFromCarjaideeByTire($rimId, $tire_sizeId);
        }

        return $data;
    }

}   