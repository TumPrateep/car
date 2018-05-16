<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Spares extends CI_Model{

    function allSpares_count($sparesId)
    {   
        $this->db->where("sparesbrandId", $sparesId);
        $query = $this->db->get('sparesbrand');
    
        return $query->num_rows();  

    }
    
    function allSpares($limit,$start,$col,$dir,$sparesId)
    {   
        $this->db->where("sparesId", $sparesId);
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('sparesId');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function spare_search($limit,$start,$search,$col,$dir,$sparesId)
    {
        $this->db->where("sparesId", $sparesId);
        $query = $this
                ->db
                ->like('sparesName',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('spares');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function spare_search_count($search, $sparesId)
    {
        $this->db->where("sparesId", $sparesId);
        $query = $this
                ->db
                ->like('sparesName',$search)
                ->get('sparesName');
    
        return $query->num_rows();
    }

   

}