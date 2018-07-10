<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class tirechanges extends CI_Model{
    function checkDuplicate($tire_front,$tire_back,$rimId){
        $this->db->from("tire_change");
        $this->db->where('tire_front',$tire_front);
        $this->db->where('tire_back',$tire_back);
        $this->db->where('rimId',$rimId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }else
            return true;
    }
    function insert($data){
        return $this->db->insert('tire_change',$data);
    }
    function checkDuplicateById($tire_changeId,$tire_front,$tire_back,$rimId){
        $this->db->select("tire_front,tire_back,rimId");
        $this->db->from("tire_change");
        $this->db->where('tire_front',$tire_front);
        $this->db->where('tire_back',$tire_back);
        $this->db->where('rimId',$rimId);
        $this->db->where_not_in('tire_changeId');
        $result = $this ->db->count_all_results();
        if($result > 0){
            return false;
        }else
            return true;
    }
    function update($data){
        $this->db->where('tire_changeId',$data['tire_changeId']);
        $result = $this->db->update('tire_change', $data);
        return $result;
    }
    function checkData($tire_changeId){
        $this->db->select("tire_front,tire_back,rimId");
        return $this->db->where('tire_changeId',$tire_changeId)->get("tire_change")->row(); 
    }
    function delete($tire_changeId){
        return $this->db->delete('tire_change', array('tire_changeId' => $tire_changeId));
    }

   
}