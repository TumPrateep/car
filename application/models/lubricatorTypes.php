<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class LubricatorTypes extends CI_Model{
    
    function allLubricatorTypes_count()
    {   
        $query = $this
                ->db
                ->get('lubricator_type');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allLubricatorTypes($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_type');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function lubricatorTypes_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('lubricator_typeName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_type');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function lubricatorTypes_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('lubricator_typeName',$search)
                ->where('status',$status)
                ->get('lubricator_type');
    
        return $query->num_rows();
    } 

    function updateStatus($lubricator_typeId,$data){
        $this->db->where('lubricator_typeId',$lubricator_typeId);
        $result = $this->db->update('lubricator_type', $data);
        return $result; 
    }

 
}