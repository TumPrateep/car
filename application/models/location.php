<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Location extends CI_Model{

    function getProvinceNameByProvinceId($provinceId){
        $this->db->where("provinceId", $provinceId);    
        return $this->db->get('province')->row("provinceName");
    }

    function getDistrictNameByDistrictId($districtId){
        $this->db->where("districtId", $districtId);    
        return $this->db->get('district')->row("districtName");
    }

    function getSubDistrictBySubDistrictId($subDistrictId){
        $this->db->where("subdistrictId", $subDistrictId);    
        return $this->db->get('subdistrict')->row("subdistrictName");
    }

    function getProvinceNamePlateByProvinceId($provinceId){
        $this->db->where("provinceforcarId", $provinceId);    
        return $this->db->get('provinceforcar')->row("provinceforcarName");
    }

    function getProvinceByProvinceId($provinceId){
        $this->db->select("provinceName,latitude,longtitude");
        $this->db->where("provinceId", $provinceId);    
        return $this->db->get('province')->row();
    }

}