<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatortypeformachines extends CI_Model{
    
    function getAllLubricatortypeformachine()
    {   
        $query = $this->db->get('lubricatortypeformachine');
        return $query->result();                                                                                                                                                                                      
    }

}