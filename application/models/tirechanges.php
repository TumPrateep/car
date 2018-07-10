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


   
}