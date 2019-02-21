<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Carprofiles extends CI_Model {

	function __construct() {
        parent::__construct(); 
        
    }
    function insert($data){
		return $this->db->insert('car_profile', $data);
    }

    function getCarProfileByUserId($userId){
        $this->db->select('car_profile.car_profileId, concat(car_profile.character_plate, " ", car_profile.number_plate, " ", provinceforcar.provinceforcarName) as plate');
        $this->db->from('car_profile');
        $this->db->join('provinceforcar', 'car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->where("userId", $userId);

        $query = $this->db->get();
        return $query->result();
    }
    
    function data_check_create($character_plate, $number_plate, $province_plate, $userId){
        $this->db->select("car_profileId");
        $this->db->from("car_profile");
        $this->db->where('character_plate', $character_plate);
        $this->db->where('number_plate',$number_plate);
        $this->db->where('province_plate',$province_plate);
        $this->db->where('userId', $userId);
        $result = $this->db->get();
        return $result->row();

    }

    function getAllCarProfile(){
        $this->db->select('car_profileId, character_plate, number_plate, province_plate, pictureFront');
        $this->db->where('status', 1);
        $query = $this->db->get("car_profile");
        return $query->result();
    }

}