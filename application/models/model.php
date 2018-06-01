<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Model extends CI_Model{

    function allModel_count($brandId)
    {   
        $this->db->where("brandId", $brandId);
        $query = $this->db->get('model');
    
        return $query->num_rows();  

    }
    
    function allModel($limit,$start,$col,$dir,$brandId)
    {   
       $this->db->where("brandId", $brandId);
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
   
    function model_search($limit,$start,$search,$col,$dir,$brandId)
    {
        $query = $this
                ->db
                ->where("(`modelName` LIKE '%".$search."%' or  `yearStart` LIKE '%".$search."%' or `yearEnd` LIKE '%".$search."%') and `brandId` = ".$brandId,null,false)
                // ->like('modelName',$search)
                // ->or_like('yearStart',$search)
                // ->or_like('yearEnd',$search)
                // ->where("brandId", $brandId)
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
        $query = $this->db
            ->where("(`modelName` LIKE '%".$search."%' or  `yearStart` LIKE '%".$search."%' or `yearEnd` LIKE '%".$search."%') and `brandId` = ".$brandId,null,false)
            // ->like('modelName',$search)
            // ->or_like('yearStart',$search)
            // ->or_like('yearEnd',$search)
            // ->where("brandId", $brandId)
            ->get('model');
    
        return $query->num_rows();
    } 

    
    function insert_model($data){
        $result = $this->db->insert('model', $data);
        return $result;
    }
    
    function get_model($brandId,$modelName){
        $this->db->select("modelName");
        $this->db->from("model");
        $this->db->where('modelName', $modelName);
        $this->db->where('brandId', $brandId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function get_modelbyId($modelId){
        $this->db->select("modelId");
        $this->db->from("model");
        $this->db->where('modelId', $$modelId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function getmodel($modelId){
        $this->db->where('modelId',$modelId);
        $result = $this->db->get('model')->row();
        return $result;
    }

    function delete($modelId){
        return $this->db->delete('model', array('modelId' => $modelId));
    }

    function update($data){
        $this->db->where('modelId',$data['modelId']);
        $result = $this->db->update('model', $data);
        return $result;
    }

    function wherenot($modelId,$modelName,$brandId){
        $this->db->select("modelName");
        $this->db->from("model");
        $this->db->where('modelName', $modelName);
        $this->db->where('brandId', $brandId);
        $this->db->where_not_in('modelId', $modelId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function updateStatus($modelId,$data){
        $this->db->where('modelId',$modelId);
        $result = $this->db->update('model', $data);
        return $result; 
    }

}