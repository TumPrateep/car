<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Spare extends CI_Model{

    function allSpare_count($brandId)
    {   
        $this->db->where("spareId", $spareId);
        $query = $this->db->get('spare');
    
        return $query->num_rows();  

    }
    
    function allSpare($limit,$start,$col,$dir,$spareId)
    {   
        $this->db->where("spareId", $spareId);
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('spare');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function spare_search($limit,$start,$search,$col,$dir,$spareId)
    {
        $this->db->where("spareId", $spareId);
        $query = $this
                ->db
                ->like('spareName',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('spare');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function spare_search_count($search, $spareId)
    {
        $this->db->where("spareId", $spareId);
        $query = $this
                ->db
                ->like('SpareName',$search)
                ->get('Spare');
    
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