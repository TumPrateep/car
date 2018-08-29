<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class LubricatortypeFormachines extends CI_Model{
 
    function insert($data){
        $result = $this->db->insert('lubricatortypeformachine', $data);
        return $result;
    }
}