<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorgearbrands extends CI_Model{
    
    function checklubricatorgearbrands($lubricator_gear_brandName){
        $this->db->select("gear_brandName");
        $this->db->from("lubricator_gear_brand");
        $this->db->where("gear_brandName", $lubricator_gear_brandName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }

    function insert($data){
		return $this->db->insert('lubricator_gear_brand', $data);
    }

    function allLubricatorgearbrands_count()
    {   
        $query = $this
                ->db
                ->get('lubricator_gear_brand');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function allLubricatorgearbrands($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_gear_brand');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }

    function lubricatorgearbrands_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('gear_brandName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_gear_brand');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function lubricatorgearbrands_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('gear_brandName',$search)
                ->where('status',$status)
                ->get('lubricator_gear_brand');
    
        return $query->num_rows();
    }

    function getlubricatorgearbrandsById($gear_brandId){
        $this->db->select("gear_brandId, gear_brandName, gear_picture");
        return $this->db->where('gear_brandId',$gear_brandId)->get("lubricator_gear_brand")->row();
    }

    function delete($gear_brandId){
        return $this->db->delete('lubricator_gear_brand', array('gear_brandId' => $gear_brandId));
    }

    function getlubricatorgearbrandsFromId($gear_brandId){
        $this->db->select("gear_brandId, gear_brandName, gear_picture");
        $this->db->where('gear_brandId',$gear_brandId);
        $result = $this->db->get('lubricator_gear_brand')->row();
        return $result;
    }

    function wherenot($gear_brandId, $lubricator_gear_brandName){
        $this->db->select("gear_brandName");
        $this->db->from("lubricator_gear_brand");
        $this->db->where('gear_brandName', $lubricator_gear_brandName);
        $this->db->where_not_in('gear_brandId', $gear_brandId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('gear_brandId',$data['gear_brandId']);
        $result = $this->db->update('lubricator_gear_brand', $data);
        return $result;
    }

    /// 

    function updateStatus($lubricator_brandId,$data){
        $this->db->where('lubricator_brandId',$lubricator_brandId);
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
        $this->db->where('status','1');
        $this->db->order_by("lubricator_brandName","ASC");
        $query = $this->db->get("lubricator_brand");
        return $query->result();
    }

    function data_check_create($lubricator_brandName) {
        $this->db->select("*");
        $this->db->from("lubricator_brand");
        $this->db->where('lubricator_brandName',$lubricator_brandName);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($lubricator_brandName,$lubricator_brandId){
        $this->db->select('*');
        $this->db->from("lubricator_brand");
        $this->db->where('lubricator_brandName',$lubricator_brandName);
        $this->db->where_not_in('lubricator_brandId', $lubricator_brandId);
        $result = $this->db->get();
        return $result->row();
    }
 
}