<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatortypeformachines extends CI_Model{
 
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

}
