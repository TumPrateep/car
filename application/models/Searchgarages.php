<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Searchgarages extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }
    function getgarageById($garageId){
        return $this->db->where('garageId',$garageId)->get("garage")->row();
    }

    // function alllubricatordata_count($userId){
    //     $this->db->where("lubricator_data.create_by", $userId);
    //     $query = $this->db->get('lubricator_data');
     
    //      return $query->num_rows();
    // }

    function allgarage_count(){   
        $query = $this
                ->db
                ->get('garage');
    
        return $query->num_rows();  
    }

    function allgarage($limit,$start,$col,$dir){   
        $query = $this
            ->db
            ->limit($limit,$start)
            ->order_by($col,$dir)
            ->get('garage');
            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }   
    }

      
    // function allgarage($limit,$start,$col,$dir,$garageId){
    //     $this->db->select('garageId,garageName,businessRegistration,garageAddress,postCode,subdistrictId,districtId,provinceId,latitude,longtitude');
    //     $this->db->from('garage');
    //     $this->db->where("garageId",$garageId);

    //     $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
    //     if($query->num_rows()>0){
    //         return $query->result(); 
    //     }else{
    //         return null;
    //     }
        
    // }
    // function allgarage_count($garageId){  
    //     $this->db->select('garageId');
    //     $this->db->from('garage');
    //     $this->db->where("garageId",$garageId);
    //     $query = $this->db->get();
    //     return $query->num_rows();  
                                                                                                                                                                                                
    // }
    
    function garage_search($limit,$start,$col,$dir,$garageName,$businessRegistration)
    {
        $this->db->like('garageName',$garageName);
        if($skill != null){
            $this->db->where("businessRegistration", $businessRegistration);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('garage');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
        
    }

    function garage_search_count($garageName,$businessRegistration){
        $this->db->like('garageName',$garageName);
        if($skill != null){
            $this->db->where("businessRegistration", $businessRegistration);
        }
        $query = $this->db->get('garage');
        return $query->num_rows();
    }

  

}