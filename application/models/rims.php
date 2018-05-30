<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class rims extends CI_Model{
    
    function delete($rimId){
        return $this->db->delete('rim', array('rimId' => $rimId));
    }

    function getrimbyId($rimId){
        return $this->db->where('rimId',$rimId)->get("rim")->row();
    }

    function insert_rim($data){
		return $this->db->insert('rim', $data);
    }
    function checkrim($rimName) {
        $this->db->select("*");
        $this->db->from("rim");
        $this->db->where('rimName',$rimName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;

    }
}