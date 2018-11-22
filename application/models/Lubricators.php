<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricators extends CI_Model{
    
    function allLubricators_count($lubricator_brandId)
    {   
        $this->db->where("lubricator_brandId", $lubricator_brandId);
        $query = $this->db->get('lubricator');
        return $query->num_rows();                                                                                                                                                                                      
    }
    
    function allLubricators($limit,$start,$col,$dir,$lubricator_brandId)
    {  
        $this->db->select('lubricatortypeformachine.lubricatortypeFormachine,lubricator.lubricatorId,lubricator.lubricatorName,lubricator.capacity,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_number,lubricator.api,lubricator.capacity,lubricator.lubricator_picture'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->join('lubricatortypeformachine', 'lubricator.lubricatortypeFormachineId = lubricatortypeformachine.lubricatortypeFormachineId', 'left');
        $this->db->where("lubricator_brandId", $lubricator_brandId);
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
    function Lubricator_search($limit,$start,$search,$col,$dir,$status,$lubricator_brandId)
    {
        $this->db->select('lubricatortypeformachine.lubricatortypeFormachine,lubricator.lubricatorId,lubricator.lubricatorName,lubricator.capacity,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_number,lubricator.api,lubricator.capacity,lubricator.lubricator_picture'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->join('lubricatortypeformachine', 'lubricator.lubricatortypeFormachineId = lubricatortypeformachine.lubricatortypeFormachineId', 'left');
        $this->db->where("lubricator.lubricator_brandId", $lubricator_brandId);
        $this->db->like('lubricator.lubricatorName',$search);
        if($status != null){
            $this->db->where("lubricator.status", $status);
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
    function Lubricator_search_count($search,$status,$lubricator_brandId)
    {
        $this->db->where("lubricator_brandId", $lubricator_brandId);
        $this->db->like('lubricatorName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
               
        $query = $this->db->get('lubricator');
    
        return $query->num_rows();
    } 

    function updateStatus($lubricatorId,$data){
        $this->db->where('lubricatorId',$lubricatorId);
        $result = $this->db->update('lubricator', $data);
        return $result; 
    }
    function update($data){
        $this->db->where('lubricatorId',$data["lubricatorId"]);
        return $this->db->update('lubricator', $data);
    }

    function checkLubricator($lubricatorName, $lubricator_brandId, $lubricator_gear, $lubricatortypeFormachineId,$lubricator_numberId, $capacity){
        $this->db->select('lubricator.lubricatorId,lubricator.lubricatorName,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_numberId'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where('lubricator.lubricatorName',$lubricatorName);
        $this->db->where('lubricator.lubricator_brandId',$lubricator_brandId);
        $this->db->where('lubricator_number.lubricator_gear',$lubricator_gear);
        $this->db->where('lubricator_number.lubricator_numberId',$lubricator_numberId);
        $this->db->where('lubricator.lubricatortypeFormachineId', $lubricatortypeFormachineId);
        $this->db->where('lubricator.capacity', $capacity);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('lubricator', $data);

    }
    function checkbeforeupdate($lubricatorName,$lubricatorId,$lubricator_brandId,$lubricator_gear, $lubricatortypeFormachineId,$lubricator_numberId,$capacity){   
        $this->db->select('lubricator.lubricatorId,lubricator.lubricatorName,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_numberId'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where('lubricator.lubricatorName',$lubricatorName);
        $this->db->where('lubricator.lubricator_brandId',$lubricator_brandId);
        $this->db->where('lubricator_number.lubricator_gear',$lubricator_gear);
        $this->db->where('lubricator_number.lubricator_numberId',$lubricator_numberId);
        $this->db->where('lubricator.lubricatortypeFormachineId', $lubricatortypeFormachineId);
        $this->db->where('lubricator.capacity', $capacity);
        $this->db->where_not_in('lubricatorId',$lubricatorId);
        $result = $this->db->get();
        return $result->row();
    }
    
    function checkStatusforUpdate($lubricatorId,$userId,$status){
        $this->db->from("lubricator");
        $this->db->where('lubricatorId',$lubricatorId);
        $this->db->where('status',$status);
        $this->db->where('activeFlag',2);
        $this->db->where('create_by',$userId);
        $result = $this->db->count_all_results();
        if($result){
            return true;
        }
        return false;
    }
    

    function delete($lubricatorId){
        return $this->db->delete('lubricator', array('lubricatorId' => $lubricatorId));
    }

    function getlubricatorbyId($lubricatorId){
        $this->db->select('lubricator.lubricatorId,lubricator.lubricatorName,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_numberId,lubricator.api,lubricator.capacity,lubricator.lubricatortypeFormachineId'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where('lubricatorId',$lubricatorId);
        $result = $this->db->get()->row();
        return $result;
    }

    function getAllLubricator($lubricator_brandId){
        $this->db->select("lubricator.lubricatorId,lubricator.lubricatorName,lubricator.capacity, lubricator_number.lubricator_number");
        $this->db->from("lubricator");
        $this->db->join("lubricator_number", "lubricator_number.lubricator_numberId = lubricator.lubricator_numberId");
        $this->db->where("lubricator.lubricator_brandId", $lubricator_brandId);
        $this->db->where('lubricator.status','1');
        // $this->db->where("lubricator_number.lubricator_gear", $lubricator_gear);
        $this->db->order_by("lubricator.lubricatorName","ASC");
        $query = $this->db->get();
        return $query->result();
    }

    function checkLubricatorforget($lubricatorId){
        $this->db->select("lubricatorId");
        $this->db->from("lubricator");
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }
    function data_check_create($lubricatorName, $lubricator_brandId, $lubricator_gear,$lubricator_numberId){
        $this->db->select('lubricator.lubricatorId,lubricator.lubricatorName,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_numberId'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where('lubricator.lubricatorName',$lubricatorName);
        $this->db->where('lubricator.lubricator_brandId',$lubricator_brandId);
        $this->db->where('lubricator_number.lubricator_gear',$lubricator_gear);
        $this->db->where('lubricator_number.lubricator_numberId',$lubricator_numberId);
        $result = $this->db->get();
        return $result->row();
    }
    function data_check_update($lubricatorName, $lubricator_brandId, $lubricator_gear,$lubricator_numberId,$lubricatorId){
        $this->db->select('lubricator.lubricatorId,lubricator.lubricatorName,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_numberId'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where('lubricator.lubricatorName',$lubricatorName);
        $this->db->where('lubricator.lubricator_brandId',$lubricator_brandId);
        $this->db->where('lubricator_number.lubricator_gear',$lubricator_gear);
        $this->db->where('lubricator_number.lubricator_numberId',$lubricator_numberId);
        $this->db->where_not_in('lubricatorId',$lubricatorId);
        $result = $this->db->get();
        return $result->row();
    }


}