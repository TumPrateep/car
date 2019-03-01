<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Carprofiles extends CI_Model {

	function __construct() {
        parent::__construct(); 
        
    }
    function insert($data){
		return $this->db->insert('car_profile', $data);
    }

    function allprofile_count()
    {   
        $query = $this
                ->db
                ->get('car_profile');
    
        return $query->num_rows();  
    }
    function allprofile($limit,$start,$col,$dir)
    {   
        $query = $this
            ->db
            ->limit($limit,$start)
            ->order_by($col,$dir)
            ->join("provinceforcar","provinceforcar.provinceforcarId = car_profile.province_plate")
            ->get('car_profile');
            
            // ->where('car_profile.status', 1);

            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }
        
    }

    function getCarProfileByUserId($userId,$car_profileId){
        $this->db->select('car_profile.car_profileId, concat(car_profile.character_plate, " ", car_profile.number_plate, " ", provinceforcar.provinceforcarName) as plate');
        $this->db->from('car_profile');
        $this->db->join('provinceforcar', 'car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->where("userId", $userId);
        $this->db->where("car_profileId", $car_profileId);
        $query = $this->db->get();
        return $query->result();
    }

    function getCarProfileByUserIdAndCarprofileId($userId,$car_profileId){
        $this->db->select('car_profileId,number_plate,character_plate,province_plate,mileage,color,pictureFront');
        $this->db->from('car_profile');
        $this->db->where("userId", $userId);
        $this->db->where("car_profileId", $car_profileId);
        $query = $this->db->get();
        return $query->row();
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
        $this->db->select('car_profile.car_profileId, car_profile.character_plate, car_profile.number_plate, car_profile.province_plate, car_profile.pictureFront, provinceforcar.provinceforcarName');
        $this->db->from("car_profile");
        $this->db->join("provinceforcar","provinceforcar.provinceforcarId = car_profile.province_plate");
        $this->db->where('car_profile.status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function data_check_update($character_plate, $number_plate, $province_plate, $userId, $car_profileId){
        $this->db->select("car_profileId");
        $this->db->from("car_profile");
        $this->db->where('character_plate',$character_plate);
        $this->db->where('number_plate',$number_plate);
        $this->db->where('province_plate',$province_plate);
        $this->db->where('userId', $userId);
        $this->db->where_not_in('car_profileId', $car_profileId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('car_profileId',$data['car_profileId']);
        $result = $this->db->update('car_profile', $data);
        return $result;
    }

    function carprofile_search($limit,$start,$col,$dir,$character_plate, $number_plate, $province_plate)
    {
        $this->db->like('character_plate',$character_plate);
        $this->db->like('number_plate',$number_plate);
        $this->db->like('province_plate',$province_plate);
        // if($skill != null){
        //     $this->db->where("skill", $skill);
        // }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('car_profile');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
        
    }
    function carprofile_search_count($character_plate, $number_plate, $province_plate){
        $this->db->like('character_plate',$character_plate);
        $this->db->like('number_plate',$number_plate);
        $this->db->like('province_plate',$province_plate);
        // if($skill != null){
        //     $this->db->where("skill", $skill);
        // }
        $query = $this->db->get('car_profile');
        return $query->num_rows();
    }

   
}