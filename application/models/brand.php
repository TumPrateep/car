<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Brand extends CI_Model {

	function __construct() {
        parent::__construct(); 
        
    }

    function allBrand_count()
    {   
        $query = $this
                ->db
                ->get('brand');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allBrand($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('brand');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function brand_search($limit,$start,$search,$col,$dir)
    {
        $query = $this
                ->db
                ->like('brandName',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('brand');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function brand_search_count($search)
    {
        $query = $this
                ->db
                ->like('brandName',$search)
                ->get('brand');
    
        return $query->num_rows();
    } 

    

    function get_brand($brandname) {

		return $this->db->get_where('brand',$brandname);
	}
	
}