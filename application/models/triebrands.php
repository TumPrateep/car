<?php if(!defined('BASEPATH')) exit('No direct script allowed');
//ยี่ห้อยาง นะ
class Triebrands extends CI_Model{

    function checktriebrands($tire_brandName) {
        $this->db->select("*");
        $this->db->from("tire_brand");
        $this->db->where("tire_brandName",$tire_brandName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;

    }
    function checkBrand($name){
        $this->db->select("tire_brandName");
        $this->db->from("tire_brand");
        $this->db->where("tire_brandName", $name);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }
    function insert_triebrands($data){
		return $this->db->insert('tire_brand', $data);
    }

    function getirebrandById($tire_brandId){
        return $this->db->where('tire_brandId',$tire_brandId)->get("tire_brand")->row();
    }

    function delete($tire_brandId){
        return $this->db->delete('tire_brand', array('tire_brandId' => $tire_brandId));
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

    function allTirebrand_count()
    {   
        $query = $this
                ->db
                ->get('tire_brand');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allTirebrand($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('tire_brand');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }

    function tirebrand_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('tire_brandName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('tire_brand');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function tirebrand_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('tire_brandName',$search)
                ->where('status',$status)
                ->get('tire_brand');
    
        return $query->num_rows();
    } 

    function checkTireBrandforget($tire_brandId){
        $this->db->select("tire_brandId");
        $this->db->from("tire_brand");
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }
    function updateStatus($tire_brandId,$data){
        $this->db->where('tire_brandId',$tire_brandId);
        $result = $this->db->update('tire_brand', $data);
        return $result; 
    }
    
}