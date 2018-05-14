<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Year extends CI_Model{

    function year_search($search){
        $this->db->where('brandId',$search['brandId']);
        $this->db->where('modelId',$search['modelId']);
        $this->db->where('year',$search['year']);
        $result = $this->db->get('year');
        
        if($result->num_rows() > 0){
            return false;
        }   
        return true;
    }

    function insert_year($data){
        $result = $this->db->insert('year', $data);
        return $result;
    }
    
   
}

?>