<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class LubricatortypeFormachines extends CI_Model{
 
    function insert($data){
        $result = $this->db->insert('lubricatortypeformachine', $data);
        return $result;
    }
    function getLubricatortypeFormachines($lubricatortypeformachineId){
        $this->db->where('lubricatortypeformachineId',$lubricatortypeformachineId);
        $result = $this->db->get('lubricatortypeformachine')->row();
        return $result;
    }
}