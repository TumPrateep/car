<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class lubricatortypeformachines extends CI_Model{
 
    function insert($data){
        $result = $this->db->insert('lubricatortypeformachine', $data);
        return $result;
    }
    function getLubricatortypeFormachines($lubricatortypeformachineId){
        $this->db->where('lubricatortypeformachineId',$lubricatortypeformachineId);
        $result = $this->db->get('lubricatortypeformachine')->row();
        return $result;
    }
    function data_check_create($lubricatortypeFormachine){
        $this->db->select('lubricatortypeformachine');
        $this->db->from('lubricatortypeFormachine');
        $this->db->where('lubricatortypeFormachine',$lubricatortypeFormachine);
        $result = $this->db->get();
        
        return $result->row();

    }
    function getAllLubricatortypeformachine(){   
        $query = $this->db->get('lubricatortypeformachine');
        return $query->result();
    }

    function allLubricatortypeformachines_count()
    {   
        $query = $this
                ->db
                ->get('lubricatortypeformachine');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allLubricatortypeformachines($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricatortypeformachine');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function lubricatortypeformachines_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('lubricatortypeFormachine',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricatortypeformachine');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function lubricatortypeformachines_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('lubricatortypeFormachine',$search)
                ->where('status',$status)
                ->get('lubricatortypeformachine');
    
        return $query->num_rows();
    }    


}
