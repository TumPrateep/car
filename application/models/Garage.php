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

    function getGarageByGarageId($garageId){
        $this->db->select("garageId,comment,businessRegistration,garageName,garageAddress,postCode,latitude,longtitude,approve,subdistrictId,districtId,provinceId,
                           option1,option2,option3,option4,option_outher,garagePicture,firstname,lastname,idcard,addressGarage,userId");
        $this->db->from("garage");
        $this->db->where("garageId" ,$garageId);
        $query = $this->db->get();
        return $query->row();
    }

    function update($data){
        $this->db->where('garageId',$data['garageId']);
        $result = $this->db->update('garage', $data);
        return $result;
    }

    function checkDuplicate($garageId, $businessRegistration){
        $this->db->from('garage');
        $this->db->where("businessRegistration", $businessRegistration);
        $this->db->where_not_in("garageId", $garageId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return true;
        }else{
            return false;
        }
    }

    function getAllGarageByDataType($dataType){
        $this->db->select('garageId, garageName, picture, dayopenhour, openingtime, closingtime, garageService, option1, option2, option3, option4');
        $this->db->where('status', 1);
        if($dataType["spare"] == 1){
            $this->db->where("garageService like '1__'");
        }
        if($dataType["tire"] == 1){
            $this->db->where("garageService like '_1_'");
        }
        if($dataType["lubricator"] == 1){
            $this->db->where("garageService like '__1'");
        }
        $query = $this->db->get("garage");
        return $query->result();
    }

    function getAllGarage(){
        $this->db->select('garageId, garageName, picture, dayopenhour');
        $this->db->where('status', 1);
        $query = $this->db->get("garage");
        return $query->result();
    }

    function findGarageByUserId($userId){
        $this->db->where("userId", $userId);
        return $this->db->get("garage")->row("garageId");
    }

    function getGarageporfile($garageId){
        $this->db->select('garageId, garageName, picture, dayopenhour, openingtime, closingtime, phone');
        $this->db->where("garageId", $garageId);
        $query = $this->db->get("garage");
        return $query->row();
    }

    // เข้างลางเป็นของ Garagesmanagement

    function allData_count(){
        $query = $this->db->get('garage');
        return $query->num_rows();  
    }

    function allData($limit,$start,$order,$dir){
        $this->db->select('garage.garageId, garage.picture, garage.garageName, mechanic.titleName, mechanic.firstName, mechanic.lastName, garage.phone, garage.status');
        $this->db->from('garage');
        $this->db->join('mechanic','mechanic.garageId = garage.garageId');
        $this->db->where('mechanic.status', 1);
        

        $this->db->limit($limit,$start)->order_by($order,$dir);
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }

    function Garagesmanagement_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->select('garage.garageId, garage.picture, garage.garageName, mechanic.titleName, mechanic.firstName, mechanic.lastName, garage.phone, garage.status');
        $this->db->from('garage');
        $this->db->join('mechanic','mechanic.garageId = garage.garageId');
        $this->db->where('mechanic.status', 1);

        $this->db->like('garage.garageName',$search);
        $this->db->like('garage.status',$status);


        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function Garagesmanagement_search_count($search, $status)
    {
        $this->db->select('garage.garageId, garage.picture, garage.garageName, mechanic.titleName, mechanic.firstName, mechanic.lastName, garage.phone, garage.status');
        $this->db->from('garage');
        $this->db->join('mechanic','mechanic.garageId = garage.garageId');
        $this->db->where('mechanic.status', 1);

        $this->db->like('garage.garageName',$search);
        $this->db->like('garage.status',$status);

        $query = $this->db->get();
        return $query->num_rows();
    }

    function getGaragesmanagementById($garageId){
        $this->db->select('garage.garageId, garage.picture, garage.garageName, mechanic.titleName, mechanic.firstName, mechanic.lastName, garage.phone, garage.status ,
        garage.hno, garage.alley, garage.road, garage.village, garage.provinceId, garage.districtId, garage.subdistrictId, mechanic.phone AS mechanicphone');
        $this->db->from('garage');
        $this->db->join('mechanic','mechanic.garageId = garage.garageId');
        $this->db->where('garage.garageId', $garageId);

        $query = $this->db->get();
        return $query->row();
    }

    function getUpdate($garageId){
        $this->db->select('garageId, garageName, phone, hno, alley, road, village');
        $this->db->where('garageId',$garageId);
        $result = $this->db->get("garage")->row();
        return $result;
    }

    function data_check_update($garageId,$garageName){
        $this->db->from("garage");
        $this->db->where('garageName',$garageName);
        $this->db->where_not_in('garageId',$garageId);
        $result = $this->db->get();
        return $result->row();
    }

}