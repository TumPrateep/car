<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorchanges extends CI_Model{

    function data_check_create($machineId){
        $this->db->from("lubricator_change");
        $this->db->where('machine_id', $machineId);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($lubricator_changeId, $machineId){
        $this->db->from("lubricator_change");
        $this->db->where_not_in('lubricator_changeId',$lubricator_changeId);
        $this->db->where('machine_id', $machineId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('lubricator_changeId',$data['lubricator_changeId']);
        $result = $this->db->update('lubricator_change', $data);
        return $result;
    }

    function getLubricatorChangeById($lubricator_changeId){
        $this->db->select("lubricator_changeId");
        $this->db->where('lubricator_changeId',$lubricator_changeId);
        $result = $this->db->get("lubricator_change");
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('lubricator_change',$data);
    }

    function allLubricatorchanges($limit,$start,$col,$dir){
        $this->db->select('lubricator_change.lubricator_changeId,lubricator_change.lubricator_price,lubricator_change.status, unit.unit, machine.machine_type');
        $this->db->from('lubricator_change');
        $this->db->join('unit','unit.unit_id = lubricator_change.unit_id');
        $this->db->join('machine','lubricator_change.machine_id = machine.machineId');
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }

    function allLubricatorschanges_count(){  
        $this->db->select('lubricator_change.lubricator_changeId, lubricator_change.lubricator_price, lubricator_change.status');
        $this->db->from('lubricator_change');
        $query = $this->db->get();
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function lubricatorchanges_search($limit,$start,$search,$col,$dir,$status){
        
        $this->db->select('lubricator_change.lubricator_changeId,lubricator_change.lubricator_price,lubricator_change.status, unit.unit, machine.machine_type');
        $this->db->from('lubricator_change');
        $this->db->join('unit','unit.unit_id = lubricator_change.unit_id');
        $this->db->join('machine','lubricator_change.machine_id = machine.machineId');
        if($search != null){
            $this->db->where("lubricator_change.lubricator_changeId",$search);
        }
        if($status != null){
            $this->db->where("lubricator_change.status", $status);
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

    function lubricatorchanges_search_count($search,$status){
       
        $this->db->select('lubricator_change.lubricator_changeId,lubricator_change.lubricator_price, lubricator_change.status');
        $this->db->from('lubricator_change');
        if($search != null){
            $this->db->where("lubricator_change.lubricator_changeId",$search);
        }
        if($status != null){
            $this->db->where("lubricator_change.status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    } 

    function getUpdate($lubricator_changeId){
        // $this->db->select('lubricator_change.lubricator_changeId,lubricator_change.lubricator_price');
        $this->db->where('lubricator_changeId',$lubricator_changeId);
        $result = $this->db->get("lubricator_change")->row();
        return $result;
    }

    function delete($lubricator_changeId){
        return $this->db->delete('lubricator_change', array('lubricator_changeId' => $lubricator_changeId));
    }

    function getLubricatorChangePrice(){
        $this->db->select('lubricator_price');
        $result = $this->db->get("lubricator_change");
        return $result->row();
    }

}