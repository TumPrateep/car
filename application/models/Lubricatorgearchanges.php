<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorgearchanges extends CI_Model{

    function data_check_create(){
        $this->db->from("lubricator_gear_change");
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($lubricator_gear_changeId){
        $this->db->from("lubricator_gear_change");
        $this->db->where_not_in('lubricator_gear_changeId',$lubricator_gear_changeId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('lubricator_gear_changeId',$data['lubricator_gear_changeId']);
        $result = $this->db->update('lubricator_gear_change', $data);
        return $result;
    }

    function getLubricatorChangeById($lubricator_gear_changeId){
        $this->db->select("lubricator_gear_changeId");
        $this->db->where('lubricator_gear_changeId',$lubricator_gear_changeId);
        $result = $this->db->get("lubricator_gear_change");
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('lubricator_gear_change',$data);
    }

    function allLubricatorgearchanges($limit,$start,$col,$dir){
        $this->db->select('lubricator_gear_changeId,lubricator_gear_price,status');
        $this->db->from('lubricator_gear_change');

        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }

    function allLubricatorsgearchanges_count(){  
        $this->db->select('lubricator_gear_change.lubricator_gear_changeId, lubricator_gear_change.lubricator_gear_price, lubricator_gear_change.status');
        $this->db->from('lubricator_gear_change');
        $query = $this->db->get();
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function lubricatorgearchanges_search($limit,$start,$search,$col,$dir,$status){
        
        $this->db->select('lubricator_gear_change.lubricator_gear_changeId, lubricator_gear_change.lubricator_gear_price, lubricator_gear_change.status');
        $this->db->from('lubricator_gear_change');
        if($search != null){
            $this->db->where("lubricator_gear_change.lubricator_gear_changeId",$search);
        }
        if($status != null){
            $this->db->where("lubricator_gear_change.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
                
        if($query->num_rows()>0){
            return $query->result();  
        }else{
            return null;
        }
    }

    function lubricatorgearchanges_search_count($search,$status){
       
        $this->db->select('lubricator_gear_change.lubricator_gear_changeId,lubricator_gear_change.lubricator_gear_price, lubricator_gear_change.status');
        $this->db->from('lubricator_gear_change');
        if($search != null){
            $this->db->where("lubricator_gear_change.lubricator_gear_changeId",$search);
        }
        if($status != null){
            $this->db->where("lubricator_gear_change.status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    } 

    function getUpdate($lubricator_gear_changeId){
        $this->db->select('lubricator_gear_change.lubricator_gear_changeId,lubricator_gear_change.lubricator_gear_price');
        $this->db->where('lubricator_gear_changeId',$lubricator_gear_changeId);
        $result = $this->db->get("lubricator_gear_change")->row();
        return $result;
    }

    function delete($lubricator_gear_changeId){
        return $this->db->delete('lubricator_gear_change', array('lubricator_gear_changeId' => $lubricator_gear_changeId));
    }

    function getLubricatorChangePrice(){
        $this->db->select('lubricator_gear_price');
        $result = $this->db->get("lubricator_gear_change");
        return $result->row();
    }

}