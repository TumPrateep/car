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

    function getirebrandById($tire_brandId){
        return $this->db->where('tire_brandId',$tire_brandId)->get("tire_brand")->row();
    }

    function delete($trie_brandId){
        return $this->db->delete('tire_brand', array('trie_brandId' => $tire_brandId));
    }

    function wherenot($tire_brandId,$tire_brandName){
        $this->db->select("tire_brandName");
        $this->db->from("tire_brand");
        $this->db->where('tire_brandName', $tire_brandName);
        $this->db->where_not_in('tire_brandId', $tire_brandId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }

    function update($data){
        $this->db->where('tire_brandId',$data['tire_brandId']);
        $result = $this->db->update('tire_brand', $data);
        return $result;
    }

}