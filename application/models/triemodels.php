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

    function get_Tiremodel($trie_brandId,$tire_modelName){
        $this->db->select("tire_modelName");
        $this->db->from("tire_model");
        $this->db->where('tire_modelName', $tire_modelName);
        $this->db->where('trie_brandId', $trie_brandId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function insert_Tiremodel($data){
        $result = $this->db->insert('tire_model', $data);
        return $result;
    }


}