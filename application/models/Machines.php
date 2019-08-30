<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Machines extends CI_Model{
 
    function insert($data){
        $result = $this->db->insert('machine', $data);
        return $result;
    }
    function getMachinesById($machineId){
        $this->db->where('machineId',$machineId);
        $result = $this->db->get('machine');
        return $result->row();
    }
    function getUpdate($machineId){
        $this->db->select("machineId,machine_type");
        $this->db->where('machineId',$machineId);
        $result = $this->db->get('machine');
        return $result->row();
    }
    function data_check_create($machine_type){
        $this->db->select('machine_type');
        $this->db->from('machine');
        $this->db->where('machine_type',$machine_type);
        $result = $this->db->get();
        
        return $result->row();
    }
    function data_check_update($machineId, $machine_type){
        $this->db->select('machine_type');
        $this->db->from('machine');
        $this->db->where('machine_type',$machine_type);
        $this->db->where_not_in('machineId',$machineId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('machineId',$data["machineId"]);
        return $this->db->update('machine', $data);
    }

    function allMachines_count()
    {   
        $query = $this
                ->db
                ->get('machine');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function getAllMachine(){   
        $this->db->select('machineId,machine_type');
        $this->db->where('status','1');
        return $this->db->get('machine')->result();
    }
    
    function allMachines($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('machine');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function machines_search($limit,$start,$search,$dir,$col,$status)
    {
        $this->db->like('machine_type',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('machine'); 

        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function machines_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('machine_type',$search)
                ->where('status',$status)
                ->get('machine');
    
        return $query->num_rows();
    }  
    function delete($machineId){
        return $this->db->delete('machine', array('machineId' => $machineId));
    } 


}
