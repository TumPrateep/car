<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class LocationModel extends CI_Model {

	function __construct() {
        parent::__construct(); 
        
    }

    function getSubdistrict($districtId){
        $this->db->from('subdistrict');
        $this->db->where('districtId',$districtId);
        $this->db->where('status',1);
        $this->db->order_by("subdistrictName", "asc");
        $result = $this->db->get();
        return $result->result();

    }

    function getDistrict($provinceId){
        $this->db->from('district');
        $this->db->where('provinceId',$provinceId);
        $this->db->where('status',1);
        $this->db->order_by("districtName", "asc");
        $result = $this->db->get();
        return $result->result();

    }


}