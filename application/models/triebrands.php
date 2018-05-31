<?php if(!defined('BASEPATH')) exit('No direct script allowed');
//ยี่ห้อยาง นะ
class triebrands extends CI_Model{

    function checktriebrands($trie_brandName) {
        $this->db->select("*");
        $this->db->from("trie_brand");
        $this->db->where('trie_brandName',$trie_brandName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;

    }
    function insert_triebrands($data){
		return $this->db->insert('trie_brand', $data);
    }

}