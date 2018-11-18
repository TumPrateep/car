<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Triesizes extends CI_Model{
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
    function insert($data){
        $result = $this->db->insert('tire_size', $data);
        return $result;
    }
    function gettrie_sizeforrim($tire_size,$rimId,$tire_series){
        // $this->db->select("tire_size");
        $this->db->from("tire_size");
        $this->db->where('tire_size.tire_size', $tire_size);
        $this->db->where('tire_size.tire_series', $tire_series);
        $this->db->where('tire_size.rimId' , $rimId);
        $result = $this->db->get();
        return $result->row();
    }
    function gettrie_sizeById($tire_sizeId){
        return $this->db->where('tire_sizeId',$tire_sizeId)->get("tire_size")->row();
    }
    function isDuplicate($tire_size, $tire_series, $rim, $rimId, $tire_sizeId=null){
        if($tire_sizeId != null){
            $this->db->where('tire_sizeId', $tire_sizeId);
        }
        $this->db->where('rimId', $rimId);
        $this->db->where('tire_size', $tire_size);
        $this->db->where('tire_series', $tire_series);
        $this->db->where('rim', $rim);
        $this->db->from('tire_size');
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
    
    function data_check_update($tire_sizeId,$tire_size,$rimId){
        $this->db->select("tire_size");
        $this->db->from("tire_size");
        $this->db->where('tire_size', $tire_size);
        $this->db->where('rimId', $rimId);
        $this->db->where_not_in('tire_sizeId', $tire_sizeId);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
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
        $this->db->select("tire_size.tire_size,tire_size.tire_series,rim.rimName,rim.rimId,tire_size.tire_sizeId, tire_size.tire_size, tire_size.tire_series, tire_size.status");
        $this->db->where("tire_size.rimId", $rimId);
        $this->db->join('rim','rim.rimId = tire_size.rimId');
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
        if($status != null){
            $this->db->where("tire_size.status", $status);
        }
        $this->db->select("tire_size.tire_size,tire_size.tire_series,rim.rimName,rim.rimId,tire_size.tire_sizeId, tire_size.tire_size, tire_size.tire_series, tire_size.status");
        $this->db->join('rim','rim.rimId = tire_size.rimId');
        $this->db->where("tire_size.rimId", $rimId)
            ->group_start()
                ->like('tire_size.tire_size',$search)
                ->or_like('tire_size.tire_series',$search)
                ->or_like('rim.rimName',$search)
            ->group_end()
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
        if($status != null){
            $this->db->where("tire_size.status", $status);
        }
        $this->db->select("tire_size.tire_size,tire_size.tire_series,rim.rimName,rim.rimId,tire_size.tire_sizeId, tire_size.tire_size, tire_size.tire_series, tire_size.status");
        $this->db->join('rim','rim.rimId = tire_size.rimId');
        $query = $this->db->where("tire_size.rimId", $rimId)
            ->group_start()
                ->like('tire_size',$search)
                ->or_like('tire_series',$search)
                ->or_like('rim',$search)
            ->group_end()
            ->get('tire_size');
    
        return $query->num_rows();
    }
    function getiresizeById($tire_sizeId){
        $this->db->select("tire_size.tire_size,tire_size.tire_series,rim.rimName,rim.rimId,tire_size.tire_sizeId, tire_size.tire_size, tire_size.tire_series, tire_size.status");
        $this->db->join('rim','rim.rimId = tire_size.rimId');
        return $this->db->where('tire_size.tire_sizeId',$tire_sizeId)->get("tire_size")->row();
    }
    function delete($tire_sizeId){
        return $this->db->delete('tire_size', array('tire_sizeId' => $tire_sizeId));
    }
    function insert_Tiremodel($data){
        $result = $this->db->insert('tire_model', $data);
        return $result;
    }
    function geTiresizeFromTiresizeBytireId($tire_sizeId){
        $this->db->select("tire_size.tire_size,tire_size.tire_series,rim.rimName,rim.rimId,tire_size.tire_sizeId, tire_size.tire_size, tire_size.tire_series, tire_size.status");    
        $this->db->join('rim','rim.rimId = tire_size.rimId');
        $this->db->where('tire_size.tire_sizeId',$tire_sizeId);
        $result = $this->db->get('tire_size')->row();
        return $result;
    }
    function updateStatus($tire_sizeId,$data){
        $this->db->where('tire_sizeId',$tire_sizeId);
        $result = $this->db->update('tire_size', $data);
        return $result; 
    }
    
    function getAllTireSizeByName($q, $limit, $tireRimId){
        $this->db->select("CONCAT(CONCAT(tire_size.tire_size, '/', tire_size.tire_series),'R', rim.rimName) AS tire_sizeName", FALSE);
        $this->db->select("tire_size.tire_size,tire_size.tire_series,rim.rimName,rim.rimId,tire_size.tire_sizeId, tire_size.tire_size, tire_size.tire_series, tire_size.status");        
        $this->db->join('rim','rim.rimId = tire_size.rimId');
        if($q != null && $q != ""){
            $this->db->where("CONCAT(CONCAT(tire_size.tire_size, '/', tire_size.tire_series),'R', rim.rimName) LIKE '%".$q."%'", NULL, FALSE);
        }       
        return $this->db->limit($limit, 0)->get("tire_size")->result();
    }
    
    function checkStatusFromTireSize($tire_sizeId,$status,$userId){
        $this->db->from('tire_size');
        $this->db->where('tire_sizeId',$tire_sizeId);
        $this->db->where('status',$status);
        $this->db->where('create_by',$userId);
        $this->db->where('activeFlag',2);
        $result = $this->db->count_all_results();
        if($result > 0 ){
            return true ;
        }
        return false;
    }

    function getAllTireSizeByrimId($rimId){
        $this->db->select('tire_sizeId,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size');
        $this->db->join('rim','rim.rimId = tire_size.rimId');
        $this->db->where("rim.rimId", $rimId);
        $this->db->where('tire_size.status','1');
        $query = $this->db->get("tire_size");
    
        return $query->result();
    }

    
}