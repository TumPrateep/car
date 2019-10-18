<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Garagesmanagements extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }

    function update($data){
        $this->db->trans_begin();
        $this->db->where('garageId',$data['garagedata']['garageId']);
        $this->db->update('garage',$data['garagedata']);

        $this->db->where('mechanicId',$data['mechanicdata']['mechanicId']);
        $this->db->update('mechanic',$data['mechanicdata']);
        
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }

}