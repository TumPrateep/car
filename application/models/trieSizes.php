<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class trieSizes extends CI_Model{
    function checktrie_size($tire__sizeName) {
        $this->db->select("*");
        $this->db->from("tire_size");
        $this->db->where('tire_sizeName',$tire_sizeName);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }
    function inserttrie_size($data){
        $result = $this->db->insert('tire_size', $data);
        return $result;
    }
    function gettrie_sizeforrim($tire_size,$rimId){
        $this->db->select("tire_size");
        $this->db->from("tire_size");
        $this->db->where('tire_size', $tire_size);
        $this->db->where('rimId' , $rimId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }
   
    function wherenotTriesize($tire_sizeId,$tire_size,$rimId){
        $this->db->select("tire_size");
        $this->db->from("tire_size");
        $this->db->where('tire_size', $tire_size);
        $this->db->where('rimId', $rimId);
        $this->db->where_not_in('tire_sizeId', $tire_sizeId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }
    
    function updateTriesizes($data){
        $this->db->where('tire_sizeId',$data['tire_sizeId']);
        $result = $this->db->update('tire_size', $data);
        return $result;
    }
    function alltrieSize_count($rimId)
    {   
        
        $this->db->where("rimId", $rimId);
        $query = $this->db->get('tire_size');
    
        return $query->num_rows();  
    }
    
    function allTriesize($limit,$start,$col,$dir,$rimId)
    {   
        $this->db->where("rimId", $rimId);
        $query = $this
                 ->db
                 ->limit($limit,$start)
                 ->order_by($col,$dir)
                 ->get('tire_size');
         
         if($query->num_rows()>0)
         {
             return $query->result(); 
         }
         else
         {
             return null;
         }
        
    }
    function trie_size_search($limit,$start,$search,$col,$dir,$rimId,$status)
    {
        $this->db->like('tire_size',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->where("rimId", $rimId)
        ->limit($limit,$start)
        ->order_by($col,$dir)
        ->get('tire_size');
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
        
    }
    function trie_size_search_count($search, $rimId,$status)
    {
        $this->db->where("rimId", $rimId);
        $query = $this
                ->db
                ->like('tire_size',$search)
                ->or_like('rim',$search)
                ->where('status',$status)
                ->or_where('rimId',$rimId)
                ->get('tire_size');
    
        return $query->num_rows();
    }
    function getiresizeById($tire_sizeId){
        $this->db->select("tire_size,tire_series,rim");
        return $this->db->where('tire_sizeId',$tire_sizeId)->get("tire_size")->row();
    }
    function delete($tire_sizeId){
        return $this->db->delete('tire_size', array('tire_sizeId' => $tire_sizeId));
    }
    function insert_Tiremodel($data){
        $result = $this->db->insert('tire_model', $data);
        return $result;
    }
    function geTiresizeFromTiresizeBytireId($tire_sizeId){
        $this->db->select('tire_size');
        $this->db->where('tire_sizeId',$tire_sizeId);
        $result = $this->db->get('tire_size')->row();
        return $result;
    }
    function updateStatus($tire_sizeId,$data){
        $this->db->where('tire_sizeId',$tire_sizeId);
        $result = $this->db->update('tire_size', $data);
        return $result; 
    }
    
}