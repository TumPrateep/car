<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Carprofiles extends CI_Model {

	function __construct() {
        parent::__construct(); 
        
    }

    function getCarProfileByUserId($userId){
        $this->db->select('car_profile.car_profileId, concat(car_profile.character_plate, " ", car_profile.number_plate, " ", provinceforcar.provinceforcarName) as plate');
        $this->db->from('car_profile');
        $this->db->join('provinceforcar', 'car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->where("userId", $userId);

        $query = $this->db->get();
        return $query->result();
    }

}