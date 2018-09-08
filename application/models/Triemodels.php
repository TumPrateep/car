<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Triemodels extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    function geTireModelById($tire_modelId){
        return $this->db->where('tire_modelId',$tire_modelId)->get("tire_model")->row();
    }

    function delete($tire_modelId){
        return $this->db->delete('tire_model', array('tire_modelId' => $tire_modelId));
    }

    function data_check_update($tire_modelId,$tire_modelName){
        $this->db->select("tire_modelName");
        $this->db->from("tire_model");
        $this->db->where('tire_modelName', $tire_modelName);
        $this->db->where_not_in('tire_modelId', $tire_modelId);
        $result = $this->db->get();
        return $result->row();
    }   

    function update($data){
        $this->db->where('tire_modelId',$data['tire_modelId']);
        $result = $this->db->update('tire_model', $data);
        return $result;
    }
     
    function insert($data){
        $result = $this->db->insert('tire_model', $data);
        return $result;
    }

    function data_check_create($tire_brandId,$tire_modelName){
        $this->db->select("tire_modelName");
        $this->db->from("tire_model");
        $this->db->where('tire_modelName', $tire_modelName);
        $this->db->where('tire_brandId', $tire_brandId);
        $result = $this->db->get();
        return $result->row();
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

    function tireModel_search($limit,$start,$search,$col,$dir,$tire_brandId,$status)
    {
        $this->db->where("tire_brandId", $tire_brandId);
        if($status != null){
            $this->db->where("status", $status);
        }
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

    function tireModel_search_count($search,$tire_brandId,$status)
    {
        $this->db->where("tire_brandId", $tire_brandId);
        $query = $this
                ->db
                ->like('tire_modelName',$search)
                ->where('status',$status)
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

    function getUpdate($tire_modelId){
        $this->db->select('tire_modelName');
        $this->db->where('tire_modelId',$tire_modelId);
        $result = $this->db->get('tire_model');
        return $result->row();
    }
    function updateStatus($tire_modelId,$data){
        $this->db->where('tire_modelId',$tire_modelId);
        $result = $this->db->update('tire_model', $data);
        return $result; 
    }

    function getAllTireModelByName($q, $limit, $tireBrandId){
        $this->db->where('tire_brandId',$tireBrandId);
        if($q != null && $q != ""){
            $this->db->like('tire_modelName',$q); 
        }       
        return $this->db->limit($limit, 0)->get("tire_model")->result();
    }

    function checkStatusFromTireModel($tire_modelId,$status,$userId){
        $this->db->from('tire_model');
        $this->db->where('tire_modelId',$tire_modelId);
        $this->db->where('status',$status);
        $this->db->where('create_by',$userId);
        $this->db->where('activeFlag',2);
        $result = $this->db->count_all_results();
        if($result > 0 ){
            return true ;
        }
        return false;
    }

    function getAllTireModelByTireBrandId($tire_brandId){
        $this->db->select("tire_modelId,tire_modelName");
        $this->db->where("tire_brandId", $tire_brandId);
        $query = $this->db->get("tire_model");
        return $query->result();
    }
}