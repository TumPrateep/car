<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class modelofcars extends CI_Model{
    function checkduplicate($modelofcarName,$modelId,$brandId){
        $this->db->from('modelofcar');
        $this->db->where('modelofcarName',$modelofcarName);
        $this->db->where('modelId',$modelId);
        $this->db->where('brandId',$brandId);
        $result = $this->db->count_all_results();
        if($result > 0 ){
            return false ;
        }
            return true;
    }
    function insert($data){
        return $this->db->insert('modelofcar',$data);
    }
}