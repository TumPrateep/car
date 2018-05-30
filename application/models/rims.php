<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class rims extends CI_Model{
    
    function delete($rimId){
        return $this->db->delete('rim', array('rimId' => $rimId));
    }

    function getrimbyId($rimId){
        return $this->db->where('rimId',$rimId)->get("rim")->row();
    }

}