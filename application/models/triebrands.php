<?php if(!defined('BASEPATH')) exit('No direct script allowed');
//ยี่ห้อยาง นะ
class triebrands extends CI_Model{

    function checktriebrands($tire_brandName) {
        $this->db->select("*");
        $this->db->from("tire_brand");
        $this->db->where('tire_brandName',$tire_brandName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;

    }
    function insert_triebrands($data){
		return $this->db->insert('tire_brand', $data);
    }

}