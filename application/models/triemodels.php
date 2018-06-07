<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Triemodels extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    function getireById($tire_modelId){
        return $this->db->where('tire_modelId',$tire_modelId)->get("tire_model")->row();
    }

    function delete($tire_modelId){
        return $this->db->delete('tire_model', array('tire_modelId' => $tire_modelId));
    }

    function wherenotTireModelid($tire_modelId,$tire_modelName){
        $this->db->select("tire_modelName");
        $this->db->from("triemodels");
        $this->db->where('tire_modelName', $tire_modelName);
        $this->db->where_not_in('tire_modelId', $tire_modelId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }    
    function updateTireModel($data){
        $this->db->where('tire_modelId',$data['tire_modelId']);
        $result = $this->db->update('tire_modelId', $data);
        return $result;
    }
     
    function insert_Tiremodel($data){
        $result = $this->db->insert('tire_model', $data);
        return $result;
    }

    function get_tiremodel($tire_brandId,$tire_modelName){
        $this->db->select("tire_modelName");
        $this->db->from("tire_model");
        $this->db->where('tire_modelName', $tire_modelName);
        $this->db->where('tire_brandId', $tire_brandId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function allTireModel_count($tire_brandId)
    {   
        $this->db->where("tire_brandId", $tire_brandId);
        $query = $this->db->get('tire_model');
    
        return $query->num_rows();  

    }

     function allTireModel($limit,$start,$col,$dir,$tire_brandId)
    {   
       $this->db->where("tire_brandId", $tire_brandId);
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('tire_model');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }

    function tireModel_search($limit,$start,$search,$col,$dir,$tire_brandId)
    {
        $this->db->where("tire_brandId", $tire_brandId);
        $query = $this
                ->db
                ->like('tire_modelName',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('tire_model');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function tireModel_search_count($search,$tire_brandId)
    {
        $this->db->where("tire_brandId", $tire_brandId);
        $query = $this
                ->db
                ->like('tire_modelName',$search)
                ->get('tire_model');
    
        return $query->num_rows();
    } 
    function checksparestriemodels($tire_modelId,$tire_brandId) {
        $this->db->select("tire_brandId");
        $this->db->from("tire_model");
        $this->db->where('tire_modelId',$tire_modelId);
        $this->db->where('tire_brandId',$tire_brandId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;

    }

    function geTireModelNameFromTireModelBytireId($tire_modelId){
        $this->db->select('tire_modelName');
        $this->db->where('tire_modelId',$tire_modelId);
        $result = $this->db->get('tire_model')->row();
        return $result;
    }
}