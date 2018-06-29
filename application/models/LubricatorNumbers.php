<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class LubricatorNumbers extends CI_Model{
    
    function allLubricatorNumbers_count()
    {   
        $query = $this
                ->db
                ->get('lubricator_number');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allLubricatorNumbers($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_number');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function lubricatorNumber_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('lubricator_number',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_number');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function lubricatorNumber_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('lubricator_number',$search)
                ->where('status',$status)
                ->get('lubricator_number');
    
        return $query->num_rows();
    } 

    function updateStatus($lubricator_numberId,$data){
        $this->db->where('lubricator_numberId',$lubricator_numberId);
        $result = $this->db->update('lubricator_number', $data);
        return $result; 
    }

    function getLubricatorNumber($lubricator_numberId){
        return $this->db->where('lubricator_numberId',$lubricator_numberId)->get("lubricator_number")->row();
    }
    
    function delete($lubricator_numberId){
        return $this->db->delete('lubricator_number', array('lubricator_numberId' => $lubricator_numberId));
    }
 
    }
    function wherenotLubricatorNumber($lubricator_numberId,$lubricator_number){
        $this->db->select("lubricator_number");
        $this->db->from("lubricator_number");
        $this->db->where('lubricator_number', $lubricator_number);
        $this->db->where_not_in('lubricator_numberId', $lubricator_numberId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }
    function updateLubricatorNumber($data){
        $this->db->where('lubricator_numberId',$data['lubricator_numberId']);
        $result = $this->db->update('lubricator_number', $data);
        return $result;
    }
    function getlubricatorTypeById($lubricator_numberId){
        $this->db->select("lubricator_numberId,lubricator_number");
        return $this->db->where('lubricator_numberId',$lubricator_numberId)->get("lubricator_number")->row();
    }

}