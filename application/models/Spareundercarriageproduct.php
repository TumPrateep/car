<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Spareundercarriageproduct extends CI_Model{

    function allsparesUndercarriages_count()
    {   
        $query = $this
                ->db
                ->get('spares_undercarriage');
    
        return $query->num_rows();  

    }

    function allsparesUndercarriage($limit,$start,$col,$dir)
    {   
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)
            ->get('spares_undercarriage');

        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   

}