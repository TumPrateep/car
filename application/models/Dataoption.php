<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Dataoption extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }

    function getPictureSpare($option){
        $this->db->select("picture");
        $this->db->from("spare_product");
        $this->db->where("spares_undercarriageId", $option['spares_undercarriageId']);
        $this->db->where("spares_brandId", $option['spares_brandId']);
        $this->db->where("brandId", $option['brandId']);
        $this->db->where("modelId", $option['modelId']);
        $this->db->where("modelofcarId", $option['modelofcarId']);
        $query = $this->db->get();
        return $query->row();
    }
    
}