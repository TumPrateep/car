<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Caraccessories extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }

    function getCarAccessoriesFromCarAccessoriesByUserId($userId){
        return $this->db->where('userId',$userId)->get("car_accessories")->row();
    }
    function allData_count(){
        $query = $this->db->get('car_accessories');
        return $query->num_rows();  
    }

    function allData($limit,$start,$order,$dir){
        $this->db->select('car_accessoriesId, car_accessoriesName,CONCAT(firstname,lastname)as name, phone, status');
        $this->db->from('car_accessories');

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

    function update($data){
        $this->db->where('car_accessoriesId',$data['car_accessoriesId']);
        $result = $this->db->update('car_accessories', $data);
        // dd();
        return $result;
    }

    function getSparepictireById($car_accessoriesId){
        $query = $this->db->where("car_accessoriesId", $car_accessoriesId)->get("car_accessories");
        return $query->row();
    }


    function getSpareById($spare_pictire_id){
        $this->db->where('spare_pictire_id',$spare_pictire_id);
        $result = $this->db->get("spares_picture");
        return $result->row();
    }

    function getUpdate($car_accessoriesId){
        $this->db->select('car_accessoriesId, car_accessoriesName, phone, titlename, firstname, lastname, hno, alley, road, village');
        $this->db->where('car_accessoriesId',$car_accessoriesId);
        $result = $this->db->get("car_accessories")->row();
        return $result;
    }

    function data_check_update($car_accessoriesId,$car_accessoriesName){
        $this->db->from("car_accessories");
        $this->db->where('car_accessoriesName',$car_accessoriesName);
        $this->db->where_not_in('car_accessoriesId',$car_accessoriesId);
        $result = $this->db->get();
        return $result->row();
    }

    function delete($spare_pictire_id){
        return $this->db->delete('spares_picture', array('spare_pictire_id' => $spare_pictire_id));
    }

    function sparesUndercarriage_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->select('car_accessoriesId, car_accessoriesName,CONCAT(firstname,lastname)as name, phone, status');
        $this->db->from('car_accessories');

        $this->db->like('car_accessoriesName',$search);
        $this->db->like('status',$status);


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
    function sparesUndercarriage_search_count($search, $status)
    {
        $this->db->select('car_accessoriesId, car_accessoriesName,CONCAT(firstname,lastname)as name, phone, status');
        $this->db->from('car_accessories');

        $this->db->like('car_accessoriesName',$search);
        $this->db->like('status',$status);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function getshowuser($car_accessoriesId){
        $this->db->select('car_accessories.car_accessoriesId, user_profile.activeFlag, user_profile.create_at, user_profile.districtId, user_profile.firstname, user_profile.hno, user_profile.lastname,
        user_profile.phone1, user_profile.phone2, user_profile.postCodes, user_profile.provinceId, user_profile.road, user_profile.status,
        user_profile.subdistrictId, user_profile.titleName, user_profile.userId, user_profile.user_profile, user_profile.village');
        $this->db->from('car_accessories');
        $this->db->join("user_profile","user_profile.userId = car_accessories.userId");
        $this->db->where("car_accessories.car_accessoriesId", $car_accessoriesId);
        $this->db->where("user_profile.status", 1);    
        $query = $this->db->get();
        return $query->row();
    }

}