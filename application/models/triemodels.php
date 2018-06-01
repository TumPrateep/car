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

}