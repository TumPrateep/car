<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Spare extends CI_Model{

    function allSpare_count($brandsbrandId)
    {   
        $this->db->where("sparesbrandId", $sparesbrandId);
        $query = $this->db->get('sparesbrand');
    
        return $query->num_rows();  

    }
    
    function allSpare($limit,$start,$col,$dir,$sparesbrandId)
    {   
        $this->db->where("sparesbrandId", $sparesbrandId);
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('sparesbrand');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function spare_search($limit,$start,$search,$col,$dir,$sparesbrandId)
    {
        $this->db->where("sparesbrandId", $sparesbrandId);
        $query = $this
                ->db
                ->like('sparesbrandName',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('sparesbrand');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function spare_search_count($search, $sparesbrandId)
    {
        $this->db->where("sparesbrandId", $sparesbrandId);
        $query = $this
                ->db
                ->like('sparesbrandName',$search)
                ->get('sparesbrandName');
    
        return $query->num_rows();
    }

    function insertBrand($data){
        $result = $this->db->insert('sparesbrand', $data);
        return $result;
    }

    function getBrand($sparesbrandName){
        $this->db->select("sparesbrandName");
        $this->db->from("sparesbrand");
        $this->db->where('sparesbrandName', $sparesbrandName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }