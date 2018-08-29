
<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class machinetypes extends CI_Model{
    
    function  insert($data){
        return $this->db->insert('machinetype', $data);
    }

    function update($data){
        $this->db->where('machinetypeId',$data['machinetypeId']);
        $result = $this->db->update('machinetype', $data);
        return $result;
    }
    
    function delete($machinetypeId){
        return $this->db->delete('machinetype', array('machinetypeId' => $machinetypeId));
    }

    function getmachinetypebyId($machinetypeId){
        $this->db->select("machinetypeId");
        $this->db->from("machinetype");
        $this->db->where('machinetypeId', $machinetypeId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }

}