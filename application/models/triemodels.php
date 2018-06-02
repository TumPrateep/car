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

<<<<<<< HEAD
    function get_Tiremodel($trie_brandId,$tire_modelName){
        $this->db->select("tire_modelName");
        $this->db->from("tire_model");
        $this->db->where('tire_modelName', $tire_modelName);
        $this->db->where('trie_brandId', $trie_brandId);
=======
    function wherenotTireModelid($tire_modelId,$tire_modelName,$tire_brandId){
        $this->db->select("tire_modelName");
        $this->db->from("triemodels");
        $this->db->where('tire_modelName', $tire_modelName);
        $this->db->where('tire_modelId', $tire_modelId);
        $this->db->where_not_in('tire_brandId', $tire_brandId);
>>>>>>> e9e6a7ba42d3eb8c300ffb7c3b04be16463b9095
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
<<<<<<< HEAD
    }

    function insert_Tiremodel($data){
        $result = $this->db->insert('tire_model', $data);
        return $result;
    }


=======
    }    
    function updateTireModel($data){
        $this->db->where('tire_modelId',$data['tire_modelId']);
        $result = $this->db->update('tire_modelId', $data);
        return $result;
    }
     
>>>>>>> e9e6a7ba42d3eb8c300ffb7c3b04be16463b9095
}