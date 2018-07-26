<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Garage extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }

    function getGarageFromGarageByUserId($userId){
        return $this->db->where('userId',$userId)->get("garage")->row();
    }

    function listGarageSearchByGarageNameAndProvinceId($garageName, $provinceId){
        // $this->db->select("garage.garageId,garage.businessRegistration,garage.garageName,garage.garageAddress,garage.latitude,garage.longtitude,garage.approve,garage.firstname,garage.lastname,province.provinceName,district.districtName,subdistrict.subdistrictName");
        $this->db->select("garage.garageId,garage.garageName,garage.latitude,garage.longtitude");
        $this->db->from("garage");
        // $this->db->join("province","province.provinceId = garage.provinceId");
        // $this->db->join("district","district.districtId = garage.districtId");
        // $this->db->join("subdistrict","subdistrict.subdistrictId = garage.subdistrictId");
        $this->db->where("garage.provinceId" ,$provinceId);
        if(!empty($garageName)){
            $this->db->like("garage.garageName", $garageName);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getViewGarageByGarageId($garageId){
        $this->db->select("garage.garageId,garage.businessRegistration,garage.garageName,garage.garageAddress,garage.latitude,garage.longtitude,garage.approve,garage.firstname,garage.lastname,province.provinceName,district.districtName,subdistrict.subdistrictName");
        $this->db->from("garage");
        $this->db->join("province","province.provinceId = garage.provinceId");
        $this->db->join("district","district.districtId = garage.districtId");
        $this->db->join("subdistrict","subdistrict.subdistrictId = garage.subdistrictId");
        $this->db->where("garage.garageId" ,$garageId);
        $query = $this->db->get();
        return $query->row();
    }

}