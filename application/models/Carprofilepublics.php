<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Carprofilepublics extends CI_Model {
    function delete($car_profileId){
        return $this->db->delete('car_profile', array('car_profileId' => $car_profileId));
    }
    function getcarprofileById($car_profileId){
        return $this->db->where('car_profileId',$car_profileId)->get("car_profile")->row();
    }
    function insert($data){
		return $this->db->insert('car_profile', $data);
    }
    function allcarprofile_count()
    {   
        $query = $this
                ->db
                ->get('car_profile');
    
        return $query->num_rows();  
    }
    function allcarprofile($limit,$start,$col,$dir)
    {   
        $query = $this
            ->db
            ->limit($limit,$start)
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
    function data_check_create($personalid,$garageId) {
        // $this->db->select("");
        $this->db->from("car_profile");
        $this->db->where('character_plate',$character_plate);
        $this->db->where('number_plate',$number_plate);
        $this->db->where('province_plate',$province_plate);
        $result = $this->db->get();
        return $result->row();
    }
    function data_check_update($mechanicId,$firstName){
        // $this->db->select("");
        $this->db->from("car_profile");
        $this->db->where('character_plate',$character_plate);
        $this->db->where('number_plate',$number_plate);
        $this->db->where('province_plate',$province_plate);
        
        $this->db->where_not_in('car_profileId', $car_profileId);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
        $this->db->where('car_profileId',$data['car_profileId']);
        $result = $this->db->update('car_profile', $data);
        return $result;
    }
    function carprofile_search($limit,$start,$col,$dir,$firstname,$skill)
    {
        // $this->db->like('firstName',$firstname);
        if($skill != null){
            $this->db->where("skill", $skill);
        }
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
    function carprofile_search_count($firstname,$skill){
        // $this->db->like('firstName',$firstname);
        if($skill != null){
            $this->db->where("skill", $skill);
        }
        $query = $this->db->get('car_profile');
        return $query->num_rows();
    }
    
}