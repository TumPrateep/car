<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorcapacitys extends CI_Model{
 
    function insert($data){
        $result = $this->db->insert('lubricator_capacity', $data);
        return $result;
    }

    function getLubricatorcapacityById($capacity_id){
        $this->db->where('capacity_id',$capacity_id);
        $result = $this->db->get('lubricator_capacity');
        return $result->row();
    }

    function getUpdate($capacity_id){
        $this->db->select("capacity_id,capacity");
        $this->db->where('capacity_id',$capacity_id);
        $result = $this->db->get('lubricator_capacity');
        return $result->row();
    }

    function data_check_create($machineId,$capacity){
        $this->db->select('capacity');
        $this->db->from('lubricator_capacity');
        $this->db->where('capacity',$capacity);
        $this->db->where('machineId',$machineId);
        $result = $this->db->get();
        
        return $result->row();
    }

    function data_check_update($machineId,$capacity_id,$capacity){
        $this->db->select('capacity');
        $this->db->from('lubricator_capacity');
        $this->db->where('capacity',$capacity);
        $this->db->where('machineId',$machineId);
        $this->db->where_not_in('capacity_id',$capacity_id);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('capacity_id',$data["capacity_id"]);
        return $this->db->update('lubricator_capacity', $data);
    }

    function allCarpacity_count($machineId)
    {   
        $this->db->where('machineId', $machineId);
        $query = $this
                ->db
                ->get('lubricator_capacity');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allCarpacity($limit,$start,$col,$dir,$machineId)
    {  
        $this->db->where("machineId",$machineId);
        $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_capacity');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }

    function Carpacity_search($limit,$start,$search,$dir,$col,$status,$machineId)
    {
        $this->db->like('capacity',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $this->db->where('machineId', $machineId);
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_capacity'); 

        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function Carpacity_search_count($search,$status,$machineId)
    {
        $this->db->where('machineId', $machineId);
        $query = $this
                ->db
                ->like('capacity',$search)
                ->where('status',$status)
                ->get('lubricator_capacity');
    
        return $query->num_rows();
    }  

    function delete($capacity_id){
        return $this->db->delete('lubricator_capacity', array('capacity_id' => $capacity_id));
    } 

    function getAllcapacity($machineId){   
        $this->db->select('lubricator_capacity.capacity_id,lubricator_capacity.capacity,machine.machineId');
        $this->db->from('lubricator_capacity');
        $this->db->join('machine','machine.machineId = lubricator_capacity.machineId');
        $this->db->where('lubricator_capacity.status','1');
        $this->db->where('machine.machineId',$machineId);
        $result = $this->db->get();
        return $result->result();
    }

}
