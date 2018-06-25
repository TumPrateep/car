<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorbrands extends CI_Model{
    
    function allLubricatorbrand_count()
    {   
        $query = $this
                ->db
                ->get('lubricator_brand');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allLubricatorbrand($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_brand');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function lubricatorbrand_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('lubricator_brandName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_brand');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function lubricatorbrand_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('lubricator_brandName',$search)
                ->where('status',$status)
                ->get('lubricator_brand');
    
        return $query->num_rows();
    } 

    function updateStatus($lubricator_brandId,$data){
        $this->db->where('lubricator_brandId',$lubricator_brandId);
        $result = $this->db->update('lubricator_brand', $data);
        return $result; 
    }

 
}