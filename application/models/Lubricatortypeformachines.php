<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class lubricatortypeformachines extends CI_Model{
 
    function insert($data){
        $result = $this->db->insert('lubricatortypeformachine', $data);
        return $result;
    }
    function getLubricatortypeFormachinesById($lubricatortypeFormachineId){
        $this->db->where('lubricatortypeFormachineId',$lubricatortypeFormachineId);
        $result = $this->db->get('lubricatortypeFormachine');
        return $result->row();
    }
    function getUpdate($lubricatortypeformachineId){
        $this->db->select("lubricatortypeFormachineId,lubricatortypeFormachine");
        $this->db->where('lubricatortypeformachineId',$lubricatortypeformachineId);
        $result = $this->db->get('lubricatortypeformachine');
        return $result->row();
    }
    function data_check_create($lubricatortypeFormachine){
        $this->db->select('lubricatortypeFormachine');
        $this->db->from('lubricatortypeFormachine');
        $this->db->where('lubricatortypeFormachine',$lubricatortypeFormachine);
        $result = $this->db->get();
        
        return $result->row();
    }
    function data_check_update($lubricatortypeformachineId, $lubricatortypeFormachine){
        $this->db->select('lubricatortypeFormachine');
        $this->db->from('lubricatortypeFormachine');
        $this->db->where('lubricatortypeFormachine',$lubricatortypeFormachine);
        $this->db->where_not_in('lubricatortypeformachineId',$lubricatortypeformachineId);
        $result = $this->db->get();
        return $result->row();
    }
    function getAllLubricatortypeformachine(){   
        $this->db->get('lubricatortypeformachine');
        $this->db->where('status','1');
        return $result = $this->db->get();
    }

    function update($data){
        $this->db->where('lubricatortypeFormachineId',$data["lubricatortypeFormachineId"]);
        return $this->db->update('lubricatortypeFormachine', $data);
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
    function lubricatortypeformachines_search($limit,$start,$search,$dir,$col,$status)
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
    function delete($lubricatortypeFormachineId){
        return $this->db->delete('lubricatortypeFormachine', array('lubricatortypeFormachineId' => $lubricatortypeFormachineId));
    } 


}
