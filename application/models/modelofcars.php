<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class modelofcars extends CI_Model{
    function checkduplicate($modelofcarName,$modelId,$brandId){
        $this->db->from('modelofcar');
        $this->db->where('modelofcarName',$modelofcarName);
        $this->db->where('modelId',$modelId);
        $this->db->where('brandId',$brandId);
        $result = $this->db->count_all_results();
        if($result > 0 ){
            return false;
        }
            return true;
    }
    function insert($data){
        return $this->db->insert('modelofcar',$data);
    }
    function checkduplicateforupdate($modelofcarName,$modelId,$brandId,$modelofcarId){
        $this->db->from('modelofcar');
        $this->db->where('modelofcarName',$modelofcarName);
        $this->db->where('modelId',$modelId);
        $this->db->where('brandId',$brandId);
        $this->db->where_not_in('modelofcarId',$modelofcarId);
        $result = $this->db->count_all_results();
        if($result > 0 ){
            return false;
        }
            return true;
    }

    function update($data,$modelofcarId){
        $this->db->where('modelofcarId',$modelofcarId);
        $result = $this->db->update('modelofcar',$data);
        return $result;
    }
    function Check($modelofcarId){
        $this->db->from('modelofcar');
        $this->db->where('modelofcarId',$modelofcarId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return true;
        }
            return false;
    }
    function delete($modelofcarId){
        return $this->db->delete('modelofcar',array('modelofcarId' => $modelofcarId));
    }
    function Checkpermistion($userId,$modelofcarId){
        $this->db->from('modelofcar');
        $this->db->where('modelofcarId',$modelofcarId);
        $this->db->where('create_by',$userId);
        $this->db->where('status',2);
        $this->db->where('activeFlag',2);
        $result = $this->db->count_all_results();
        if($result > 0 ){
            return true;
        }
            return false;
    }
}