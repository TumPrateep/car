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

    function year_search($search){

        $this->db->where('brandId',$search['brandId']);
        $this->db->where('modelId',$search['modelId']);
        $this->db->where('year',$search['year']);
        $result = $this->db->get('year');
         
        if($result->num_rows() > 0){
            return false;
        }   
        return true;
    }

    function insert_year($data){
        $result = $this->db->insert('year', $data);
        return $result;
    }


    function insert_model($data){
		$this->db->insert('model', $data);

    }
    
    function model_search($modelName){
        $this->db->select("modelName");
        $this->db->from("model");
        $this->db->where("modelName", $modelName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }
	
}