<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Tirechanges extends CI_Model{

    function data_check_create($rimId){
        $this->db->from("tire_change");
        $this->db->join('rim','tire_change.rimId = rim.rimId');
        $this->db->where('tire_change.rimId',$rimId);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('tire_change',$data);
    }

    function data_check_update($tire_changeId,$rimId){
        $this->db->select("tire_change.tire_price,tire_change.rimId");
        $this->db->from("tire_change");
        $this->db->join('rim','tire_change.rimId = rim.rimId');
        $this->db->where('tire_change.rimId',$rimId);
        $this->db->where_not_in('tire_change.tire_changeId',$tire_changeId);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
        $this->db->where('tire_changeId',$data['tire_changeId']);
        $result = $this->db->update('tire_change', $data);
        return $result;
    }
    function checkData($tire_changeId){
        $this->db->select("tire_price,rimId");
        return $this->db->where('tire_changeId',$tire_changeId)->get("tire_change")->row(); 
    }
    function delete($tire_changeId){
        return $this->db->delete('tire_change', array('tire_changeId' => $tire_changeId));
    }
    function getallTire($tire_changeId){
        $this->db->select("tire_price,rimId");
        $this->db->where('tire_changeId',$tire_changeId);
        $this->db->where('status','1');
        $result = $this->db->get('tire_change')->row();
        return $result;
    }

    function allTirechanges($limit,$start,$col,$dir){
        $this->db->select('tire_change.tire_price,rim.rimName, tire_change.status, tire_change.tire_changeId, tire_change.status, rim.rimId, unit.unit');
        $this->db->from('tire_change');
        $this->db->join('rim', 'tire_change.rimId = rim.rimId');
        $this->db->join('unit','unit.unit_id = tire_change.unit_id');
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
 

    function allTirechanges_count(){  
        $this->db->select('tire_change.tire_price,rim.rimName, tire_change.status, tire_change.tire_changeId, tire_change.status ');
        $this->db->from('tire_change');
        $this->db->join('rim', 'tire_change.rimId = rim.rimId');

        $query = $this->db->get();
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function tirechanges_search($limit,$start,$search,$col,$dir,$status){
        
        $this->db->select('tire_change.tire_price,rim.rimName, tire_change.status, tire_change.tire_changeId, tire_change.status, unit.unit ');
        $this->db->from('tire_change');
        $this->db->join('rim', 'tire_change.rimId = rim.rimId');
        $this->db->join('unit','unit.unit_id = tire_change.unit_id');
        $this->db->like('rim.rimName',$search);
        if($status != null){
            $this->db->where("tire_change.status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get();
                
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function tirechanges_search_count($search,$status){
       
        $this->db->select('tire_change.tire_price,rim.rimName, tire_change.status, tire_change.tire_changeId, tire_change.status, unit.unit ');
        $this->db->from('tire_change');
        $this->db->join('rim', 'tire_change.rimId = rim.rimId');
        $this->db->join('unit','unit.unit_id = tire_change.unit_id');
        $this->db->like('rim.rimName',$search);
        if($status != null){
            $this->db->where("tire_change.status", $status);
        }
        $query = $this->db->get();
    
        return $query->num_rows();
    } 
    
    function updateStatus($tire_changeId, $data){
        $this->db->where('tire_changeId',$tire_changeId);
        $result = $this->db->update('tire_change', $data);
        
        return $result; 
    }

    function getUpdate($tire_changeId){
        $this->db->select("tire_changeId,tire_price,rimId,unit_id");
        $this->db->where('tire_changeId',$tire_changeId);
        $result = $this->db->get("tire_change")->row();
        return $result;
    }

    function getTireChangeById($tire_changeId){
        $this->db->select("tire_changeId");
        $this->db->where('tire_changeId',$tire_changeId);
        $result = $this->db->get("tire_change");
        return $result->row();
    }

    function getTireChangePrice(){
        $this->db->select("rimId,tire_price");
        $result = $this->db->get("tire_change");
        return $result->result();
    }

}