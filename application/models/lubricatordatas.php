<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class lubricatordatas extends CI_Model{

    function getlubricatorbyId($lubricator_dataId){
        $this->db->where('lubricator_dataId',$lubricator_dataId);
        $result = $this->db->get('lubricator_data')->row();
        return $result;
    }

    function delete($lubricator_dataId){
        return $this->db->delete('lubricator_data', array('lubricator_dataId' => $lubricator_dataId));
    }

}