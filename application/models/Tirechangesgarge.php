<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Tirechangesgarge extends CI_Model{

    function data_check_create($rimId,$garageId){
        $this->db->from("tire_change_garage");
        $this->db->where('rimId',$rimId);
        $this->db->where('garageId',$garageId);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('tire_change_garage',$data);
    }

    function data_check_update($tire_change_garageId,$rimId,$garageId){
        $this->db->select("tire_change_garageId");
        $this->db->from("tire_change_garage");
        $this->db->where('rimId',$rimId);
        $this->db->where('garageId',$garageId);
        $this->db->where_not_in('tire_change_garageId',$tire_change_garageId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('tire_change_garageId',$data['tire_change_garageId']);
        $result = $this->db->update('tire_change_garage', $data);
        return $result;
    }

    function checkData($tire_change_garageId){
        $this->db->select("tire_front,tire_back,rimId");
        return $this->db->where('tire_change_garageId',$tire_change_garageId)->get("tire_change_garage")->row(); 
    }

    function delete($tire_change_garageId){
        return $this->db->delete('tire_change_garage', array('tire_change_garageId' => $tire_change_garageId));
    }

    function getallTire($tire_change_garageId){
        $this->db->select("tire_front,tire_back,rimId");
        $this->db->where('tire_change_garageId',$tire_change_garageId);
        $this->db->where('status','1');
        $result = $this->db->get('tire_change_garage')->row();
        return $result;
    }

    function allTirechanges($limit,$start,$col,$dir,$garageId){
        $this->db->select('tire_change_garage.tire_front, tire_change_garage.tire_back, rim.rimName, tire_change_garage.status, tire_change_garage.tire_change_garageId, tire_change_garage.status,tire_change_garage.garageId');
        $this->db->from('tire_change_garage');
        $this->db->join('rim', 'tire_change_garage.rimId = rim.rimId');
        $this->db->where('tire_change_garage.garageId',$garageId);

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
        $this->db->select('tire_change_garage.tire_front, tire_change_garage.tire_back, rim.rimName, tire_change_garage.tire_change_garageId, tire_change_garage.status ');
        $this->db->from('tire_change_garage');
        $this->db->join('rim', 'tire_change_garage.rimId = rim.rimId');

        $query = $this->db->get();
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function tirechanges_search($limit,$start,$search,$col,$dir,$status,$garageId){
        
        $this->db->select('tire_change_garage.tire_front, tire_change_garage.tire_back, rim.rimName, tire_change_garage.tire_change_garageId, tire_change_garage.status');
        $this->db->from('tire_change_garage');
        $this->db->join('rim', 'tire_change_garage.rimId = rim.rimId');
        $this->db->where('tire_change_garage.garageId',$garageId);
        $this->db->like('rim.rimName',$search);
        if($status != null){
            $this->db->where("tire_change_garage.status", $status);
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

    function tirechanges_search_count($search,$status,$garageId){
       
        $this->db->select('tire_change_garage.tire_front, tire_change_garage.tire_back, rim.rimName, tire_change_garage.status, tire_change_garage.tire_change_garageId ');
        $this->db->from('tire_change_garage');
        $this->db->join('rim', 'tire_change_garage.rimId = rim.rimId');
        $this->db->where('tire_change_garage.garageId',$garageId);
        $this->db->like('rim.rimName',$search);
        if($status != null){
            $this->db->where("tire_change_garage.status", $status);
        }
        $query = $this->db->get();
    
        return $query->num_rows();
    } 
    
    function updateStatus($tire_change_garageId, $data){
        $this->db->where('tire_change_garageId',$tire_change_garageId);
        $result = $this->db->update('tire_change_garage', $data);
        
        return $result; 
    }

    function getUpdate($tire_change_garageId){
        $this->db->select("tire_change_garageId,tire_front,tire_back,rimId");
        $this->db->where('tire_change_garageId',$tire_change_garageId);
        $result = $this->db->get("tire_change_garage")->row();
        return $result;
    }

    function getTireChangeById($tire_changeId){
        $this->db->select("tire_change_garageId");
        $this->db->where('tire_change_garageId',$tire_change_garageId);
        $result = $this->db->get("tire_change_garage");
        return $result->row();
    }

    function getTireChangePrice(){
        $this->db->select("rimId,tire_front,tire_back");
        $result = $this->db->get("tire_change_garage");
        return $result->result();
    }
}