<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Managegarages extends CI_Model {
   
    function getmanagegaragesById($garageId){
        return $this->db->where('garageId',$garageId)->get("garage")->row();
    }
  
    function allmanagegarages_count()
    {   
        $query = $this
                ->db
                ->get('garage');
    
        return $query->num_rows();  
    }

    function allmanagegarages($limit,$start,$col,$dir)
    {   
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
  
    function data_check_update($garageId,$businessRegistration){
        $this->db->select("businessRegistration");
        $this->db->from("garage");
        $this->db->where('businessRegistration', $businessRegistration);
        $this->db->where_not_in('garageId', $garageId);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
        $this->db->where('garageId',$data['garageId']);
        $result = $this->db->update('garage', $data);
        return $result;
    }

    // function mechanics_search($limit,$start,$col,$dir,$firstname,$skill)
    // {
    //     $this->db->like('firstName',$firstname);
    //     if($skill != null){
    //         $this->db->where("skill", $skill);
    //     }
    //     $query = $this->db->limit($limit,$start)
    //             ->order_by($col,$dir)
    //             ->get('mechanic');
        
    //     if($query->num_rows()>0)
    //     {
    //         return $query->result();  
    //     }
    //     else
    //     {
    //         return null;
    //     }
        
    // }
    // function mechanics_search_count($firstname,$skill){
    //     $this->db->like('firstName',$firstname);
    //     if($skill != null){
    //         $this->db->where("skill", $skill);
    //     }
    //     $query = $this->db->get('mechanic');
    //     return $query->num_rows();
    // }
    
}