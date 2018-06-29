<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class LubricatorTypes extends CI_Model{
    
    function allLubricatorTypes_count()
    {   
        $query = $this
                ->db
                ->get('lubricator_type');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allLubricatorTypes($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_type');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function lubricatorTypes_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('lubricator_typeName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_type');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function lubricatorTypes_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('lubricator_typeName',$search)
                ->where('status',$status)
                ->get('lubricator_type');
    
        return $query->num_rows();
    } 

    function updateStatus($lubricator_typeId,$data){
        $this->db->where('lubricator_typeId',$lubricator_typeId);
        $result = $this->db->update('lubricator_type', $data);
        return $result; 
    }

    function getAllLubricatorTypes(){
        $this->db->select("lubricator_typeId,lubricator_typeName");
        $result = $this->db->get("lubricator_type")->result();
        return $result;
    }
    
    // function ChecklubricatorTypes($lubricator_typeId,$status,$userId){
    //     $this->db->from('lubricator_type');
    //     $this->db->where('lubricator_typeId',$lubricator_typeId);
    //     $this->db->where('status',$status);
    //     $this->db->where('create_by',$userId);
    //     $this->db->where('activeFlag',2);
    //     $result = $this->db->count_all_results();
    //     if($result > 0 ){
    //         return true ;
    //     }
    //     return false;
    // }
    function checklubricatorTypes($lubricator_typeName) {
        $this->db->select("*");
        $this->db->from("lubricator_type");
        $this->db->where('lubricator_typeName',$lubricator_typeName);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }
}