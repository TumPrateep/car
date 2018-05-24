<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class LocationModel extends CI_Model {

	function __construct() {
        parent::__construct(); 
        
    }

    function getSubdistrict($districtId){
        $this->db->select("subdistrictId, subdistrictName");
        $this->db->from('subdistrict');
        $this->db->where('districtId',$districtId);
        $this->db->where('status',1);
        $this->db->order_by("subdistrictName", "asc");
        $result = $this->db->get();
        return $result->result();

    }

    function getDistrict($provinceId){
        $this->db->select('districtId, districtName');
        $this->db->from('district');
        $this->db->where('provinceId',$provinceId);
        $this->db->where('status',1);
        $this->db->order_by("districtName", "asc");
        $result = $this->db->get();
        return $result->result();

    }

    function getProvince(){
        $this->db->select('provinceId,provinceName');
        $this->db->from('province');
        $this->db->where('status',1);
        $this->db->order_by("provinceName", "asc");
        $result = $this->db->get();
        return $result->result();

    }


}