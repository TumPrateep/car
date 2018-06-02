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

    function wherenotTireModelid($tire_modelId,$tire_modelName,$tire_brandId){
        $this->db->select("tire_modelName");
        $this->db->from("triemodels");
        $this->db->where('tire_modelName', $tire_modelName);
        $this->db->where('tire_modelId', $tire_modelId);
        $this->db->where_not_in('tire_brandId', $tire_brandId);
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
}