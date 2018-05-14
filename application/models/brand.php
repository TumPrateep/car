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

    

    
    function check_brand($brandName) {

        $this->db->select("*");
        $this->db->from("brand");
        $this->db->where('brandName',$brandName);
        // $this->db->get();
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }else{
            return false;
        }

    }
    
    function get_brand($brandName){
        return $this->db->where('brandName',$brandName)->get("brand")->row();
    }
	

    function insert_brand($data){
		$this->db->insert('brand', $data);
    }

    function checkBrand($name){
        $this->db->select("brandName");
        $this->db->from("brand");
        $this->db->where("brandName", $name);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function delete($brandId){
        return $this->db->delete('brand', array('brandId' => $brandId));
    }

    function getBrandById($brandId){
        return $this->db->where('brandId',$brandId)->get("brand")->row();
    }

}