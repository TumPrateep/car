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
        $this->db->select('machine.machine_type,lubricator.lubricatorId,lubricator.lubricatorName,lubricator_capacity.capacity,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_number,lubricator_api.api,lubricator_capacity.capacity,lubricator.lubricator_picture'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->join('machine', 'lubricator.machine_id = machine.machineId', 'left');
        $this->db->join('lubricator_api', 'lubricator.api_id = lubricator_api.apiId', 'left');
        $this->db->join('lubricator_capacity', 'lubricator.capacity_id = lubricator_capacity.capacity_id', 'left');
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
        $this->db->select('machine.machine_type,lubricator.lubricatorId,lubricator.lubricatorName,lubricator_capacity.capacity,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_number,lubricator_api.api,lubricator_capacity.capacity,lubricator.lubricator_picture'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->join('machine', 'lubricator.machine_id = machine.machineId', 'left');
        $this->db->join('lubricator_api', 'lubricator.api_id = lubricator_api.apiId', 'left');
        $this->db->join('lubricator_capacity', 'lubricator.capacity_id = lubricator_capacity.capacity_id', 'left');
        $this->db->where("lubricator_brandId", $lubricator_brandId);
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

    function checkLubricator($lubricatorName, $lubricator_brandId, $lubricator_gear, $machine_id,$lubricator_numberId, $capacity){
        $this->db->select('lubricator.lubricatorId,lubricator.lubricatorName,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_numberId'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where('lubricator.lubricatorName',$lubricatorName);
        $this->db->where('lubricator.lubricator_brandId',$lubricator_brandId);
        $this->db->where('lubricator_number.lubricator_gear',$lubricator_gear);
        $this->db->where('lubricator_number.lubricator_numberId',$lubricator_numberId);
        $this->db->where('lubricator.machine_id', $machine_id);
        $this->db->where('lubricator.capacity', $capacity);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('lubricator', $data);

    }
    function checkbeforeupdate($lubricatorName,$lubricatorId,$lubricator_brandId,$lubricator_gear, $machine_id,$lubricator_numberId,$capacity){   
        $this->db->select('lubricator.lubricatorId,lubricator.lubricatorName,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_numberId'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where('lubricator.lubricatorName',$lubricatorName);
        $this->db->where('lubricator.lubricator_brandId',$lubricator_brandId);
        $this->db->where('lubricator_number.lubricator_gear',$lubricator_gear);
        $this->db->where('lubricator_number.lubricator_numberId',$lubricator_numberId);
        $this->db->where('lubricator.machine_id', $machine_id);
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

    // function getlubricatorbyId($lubricatorId){
    //     $this->db->from('lubricator');
    //     $this->db->where('lubricatorId',$lubricatorId);
    //     $result = $this->db->get()->row();
    //     return $result;
    // }
    function getlubricatorbyId($lubricatorId){
        $this->db->select('lubricator.lubricatorId,lubricator.lubricatorName,lubricator.lubricator_brandId,lubricator.status,lubricator.activeFlag,lubricator.create_by,lubricator_number.lubricator_gear,lubricator_number.lubricator_numberId,lubricator.api,lubricator.capacity,lubricator.machine_id'); 
        $this->db->from('lubricator');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where('lubricatorId',$lubricatorId);
        $result = $this->db->get()->row();
        return $result;
    }

    function getAllLubricator($lubricator_brandId, $lubricator_gear){
        $this->db->select("lubricator.lubricatorId,lubricator.lubricatorName,lubricator_capacity.capacity, lubricator_number.lubricator_number,lubricator_api.api");
        $this->db->from("lubricator");
        $this->db->join("lubricator_number", "lubricator_number.lubricator_numberId = lubricator.lubricator_numberId");
        $this->db->join('lubricator_api', 'lubricator.api_id = lubricator_api.apiId', 'left');
        $this->db->join('lubricator_capacity', 'lubricator.capacity_id = lubricator_capacity.capacity_id', 'left');

        $this->db->where("lubricator.lubricator_brandId", $lubricator_brandId);
        $this->db->where('lubricator.status','1');
        $this->db->where("lubricator_number.lubricator_gear", $lubricator_gear);

        $this->db->order_by("lubricator.lubricatorName","ASC");
        $query = $this->db->get();
        return $query->result();
    }

    function getAllLubricatorByType($lubricator_brandId, $lubricator_gear, $lubricator_type=null){
        $this->db->select("lubricator.lubricatorId,lubricator.lubricatorName,lubricator_capacity.capacity, lubricator_number.lubricator_number,lubricator_api.api,lubricator_type.lubricator_typeName,lubricator_type.lubricator_typeSize");
        $this->db->from("lubricator");
        $this->db->join("lubricator_number", "lubricator_number.lubricator_numberId = lubricator.lubricator_numberId");
        $this->db->join('lubricator_api', 'lubricator.api_id = lubricator_api.apiId', 'left');
        $this->db->join('lubricator_capacity', 'lubricator.capacity_id = lubricator_capacity.capacity_id', 'left');
        $this->db->join("lubricator_type", "lubricator_number.lubricator_typeId = lubricator_type.lubricator_typeId", "left");

        $this->db->where("lubricator.lubricator_brandId", $lubricator_brandId);
        $this->db->where('lubricator.status','1');
        $this->db->where("lubricator_number.lubricator_gear", $lubricator_gear);

        if(!empty($lubricator_type)){
            $this->db->where('lubricator_type.lubricator_typeId', $lubricator_type);
        }else{
            $this->db->where('lubricator_type.lubricator_typeId IS NULL', null, false);
        }

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

    function getAllLubricatorBy($lubricator_brandId, $lubricator_gear, $machine_id){
        $this->db->select("lubricator.lubricatorId,lubricator.lubricatorName,lubricator_capacity.capacity, lubricator_number.lubricator_number,lubricator_api.api");
        $this->db->from("lubricator");
        $this->db->join("lubricator_number", "lubricator_number.lubricator_numberId = lubricator.lubricator_numberId");
        $this->db->join('lubricator_api', 'lubricator.api_id = lubricator_api.apiId', 'left');
        $this->db->join('lubricator_capacity', 'lubricator.capacity_id = lubricator_capacity.capacity_id', 'left');
        $this->db->where_in("lubricator.lubricator_brandId", $lubricator_brandId);
        $this->db->where('lubricator.status','1');
        $this->db->where("lubricator_number.lubricator_gear", $lubricator_gear);

        if($lubricator_gear == 1){
            $this->db->where("lubricator.machine_id", $machine_id);
        }
        $this->db->order_by("lubricator.lubricatorName","ASC");
        $query = $this->db->get();
        return $query->result();
    }

    function getAllLubricatorByBrandAndMachine($lubricator_brandId, $machine_id){
        $this->db->select("lubricator.lubricatorId,lubricator.lubricatorName,lubricator_capacity.capacity, lubricator_number.lubricator_number,lubricator_api.api");
        $this->db->from("lubricator");
        $this->db->join("lubricator_number", "lubricator_number.lubricator_numberId = lubricator.lubricator_numberId");
        $this->db->join('lubricator_api', 'lubricator.api_id = lubricator_api.apiId', 'left');
        $this->db->join('lubricator_capacity', 'lubricator.capacity_id = lubricator_capacity.capacity_id', 'left');
        $this->db->where_in("lubricator.lubricator_brandId", $lubricator_brandId);
        $this->db->where('lubricator.status','1');
        $this->db->where("lubricator.machine_id", $machine_id);

        $this->db->order_by("lubricator.lubricatorName","ASC");
        $query = $this->db->get();
        return $query->result();
    }


}