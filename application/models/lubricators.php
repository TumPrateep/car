<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricators extends CI_Model{
    
    function allLubricators_count()
    {   
        $query = $this
                ->db
                ->get('lubricator');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allLubricators($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function Lubricator_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('lubricatorName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function Lubricator_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('lubricatorName',$search)
                ->where('status',$status)
                ->get('lubricator');
    
        return $query->num_rows();
    } 

    function updateStatus($lubricatorId,$data){
        $this->db->where('lubricatorId',$lubricatorId);
        $result = $this->db->update('lubricator', $data);
        return $result; 
    }

    function Checklubricator($lubricatorName){
        $this->db->select("lubricatorName");
        $this->db->from("lubricator");
        $this->db->where('lubricatorName',$lubricatorName);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }

    function  insert_lubricator($data){
        return $this->db->insert('lubricator', $data);

    }
    

 
}