<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class trieSizes extends CI_Model{

    function checktrie_size($tire__sizeName) {
        $this->db->select("*");
        $this->db->from("tire__size");
        $this->db->where('tire__sizeName',$tire__sizeName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;

    }
    function inserttrie_size($data){
        $result = $this->db->insert('tire__size', $data);
        return $result;
    }

    function gettrie_sizeforrim($tire__size,$rimId){
        $this->db->select("tire__size");
        $this->db->from("tire__size");
        $this->db->where('tire__size', $trie_size);
        $this->db->where('rimId' , $rimId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }
     function wherenotTriesize($tire__sizeId,$tire__size,$rimId){
        $this->db->select("tire__size");
        $this->db->from("tire__size");
        $this->db->where('tire__size', $trie_size);
        $this->db->where('rimId', $rimId);
        $this->db->where_not_in('rimId', $rimId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function updateTriesize($data){
        $this->db->where('tire__sizeId',$data['trie_sizeId']);
        $result = $this->db->update('tire__size', $data);
        return $result;
    }

    function alltrieSize_count($rimId)
    {   
        
        $this->db->where("rimId", $rimId);
        $query = $this->db->get('trie_size');
    
        return $query->num_rows();  

    }

    function allTriesize($limit,$start,$col,$dir,$rimId)
    {   
        $this->db->where("rimId", $rimId);
        $query = $this
                 ->db
                 ->limit($limit,$start)
                 ->order_by($col,$dir)
                 ->get('trie_size');
         
         if($query->num_rows()>0)
         {
             return $query->result(); 
         }
         else
         {
             return null;
         }
        
    }

    function trie_size_search($limit,$start,$search,$col,$dir,$rimId)
    {
        $this->db->where("rimId", $rimId);
        $query = $this
                ->db
                ->like('tire__size',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('tire__size');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function trie_size_search_count($search, $rimId)
    {
        $this->db->where("rimId", $rimId);
        $query = $this
                ->db
                ->like('tire__size',$search)
                ->get('tire__size');
    
        return $query->num_rows();
    }

}