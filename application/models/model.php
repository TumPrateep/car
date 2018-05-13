<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Model extends CI_Model{

	function __construct() {
        parent::__construct(); 
        
    }

    function allModel_count($brandId)
    {   
        $this->db->where("branId", $brandId);
        $query = $this->db->get('model');
    
        return $query->num_rows();  

    }
    
    function allModel($limit,$start,$col,$dir,$brandId)
    {   
       $this->db->where("branId", $brandId);
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('model');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function model_search($limit,$start,$search,$col,$dir,$brandIds)
    {
        $this->db->where("branId", $brandId);
        $query = $this
                ->db
                ->like('modelName',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('model');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function model_search_count($search, $brandId)
    {
        $this->db->where("branId", $brandId);
        $query = $this
                ->db
                ->like('modelName',$search)
                ->get('model');
    
        return $query->num_rows();
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