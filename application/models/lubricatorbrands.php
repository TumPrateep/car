<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorbrands extends CI_Model{
    
    function allLubricatorbrand_count()
    {   
        $query = $this
                ->db
                ->get('lubricator_brand');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allLubricatorbrand($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_brand');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function lubricatorbrand_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('lubricator_brandName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_brand');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function lubricatorbrand_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('lubricator_brandName',$search)
                ->where('status',$status)
                ->get('lubricator_brand');
    
        return $query->num_rows();
    } 

    function updateStatus($lubricator_brandId,$data){
        $this->db->where('lubricator_brandId',$lubricator_brandId);
        $result = $this->db->update('lubricator_brand', $data);
        return $result; 
    }

    function checklubricatorbrand($lubricator_brandName){
        $this->db->select("lubricator_brandName");
        $this->db->from("lubricator_brand");
        $this->db->where("lubricator_brandName", $lubricator_brandName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }
    function insert_lubricatorbrand($data){
		return $this->db->insert('lubricator_brand', $data);
    }

    function getlubricatorById($lubricator_brandId){
        $this->db->select("lubricator_brandId,lubricator_brandName,lubricator_brandPicture");
        return $this->db->where('lubricator_brandId',$lubricator_brandId)->get("lubricator_brand")->row();
    }
    
    function delete($lubricator_brandId){
        return $this->db->delete('lubricator_brand', array('lubricator_brandId' => $lubricator_brandId));
    }
    function geTubricatorbrandFromId($lubricator_brandId){
        $this->db->select('lubricator_brandName,lubricator_brandPicture,lubricator_brandId');
        $this->db->where('lubricator_brandId',$lubricator_brandId);
        $result = $this->db->get('lubricator_brand')->row();
        return $result;
    }

    function checklubricatorbrandforUpdate($lubricator_brandId,$lubricator_brandName){
        $this->db->select("lubricator_brandName");
        $this->db->from("lubricator_brand");
        $this->db->where('lubricator_brandName', $lubricator_brandName);
        $this->db->where_not_in('lubricator_brandId', $lubricator_brandId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }
    function update($data){
        $this->db->where('lubricator_brandId',$data['lubricator_brandId']);
        $result = $this->db->update('lubricator_brand', $data);
        return $result;
    }

    function checkStatusFromlubricatorbrand($lubricator_brandId,$status,$userId){
        $this->db->from('lubricator_brand');
        $this->db->where('lubricator_brandId',$lubricator_brandId);
        $this->db->where('status',$status);
        $this->db->where('create_by',$userId);
        $this->db->where('activeFlag',2);

        $result = $this->db->count_all_results();
        if($result > 0 ){
            return true ;
        }
        return false;
    }

    function checkStatusFromBrand($lubricator_brandId,$status,$userId){
        $this->db->from('lubricator_brand');
        $this->db->where('lubricator_brandId',$lubricator_brandId);
        $this->db->where('status',$status);
        $this->db->where('create_by',$userId);
        $this->db->where('activeFlag',2);
        $result = $this->db->count_all_results();
        if($result > 0){
            return true;
        }
        return false;
    }
    
    function getAllLubricatorBrand(){
        $this->db->select("lubricator_brandId,lubricator_brandName");
        $this->db->order_by("lubricator_brandName","ASC");
        $query = $this->db->get("lubricator_brand");
        return $query->result();
    }
 
}