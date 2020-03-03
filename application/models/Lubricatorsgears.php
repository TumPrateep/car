<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorsgears extends CI_Model{
    
    function checkLubricator($lubricatorName, $gear_brandId, $lubricator_gear, $lubricator_numberId){
        // $this->db->select(''); 
        $this->db->from('lubricator_gear');
        // $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where('lubricatorName',$lubricatorName);
        $this->db->where('gear_brandId',$gear_brandId);
        $this->db->where('numberId',$lubricator_gear);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('lubricator_gear', $data);
    }

    function allLubricatorsgears_count($gear_brandId)
    {   
        $this->db->where("gear_brandId", $gear_brandId);
        $query = $this->db->get('lubricator_gear');
        return $query->num_rows();                                                                                                                                                                                      
    }
    
    function allLubricatorsgears($limit,$start,$col,$dir,$gear_brandId)
    {  
        // $this->db->select(''); 
        $this->db->from('lubricator_gear');
        // $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where("gear_brandId", $gear_brandId);
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

    function Lubricatorgears_search($limit,$start,$search,$col,$dir,$status,$gear_brandId)
    {
        // $this->db->select(''); 
        $this->db->from('lubricator_gear');
        // $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where("gear_brandId", $gear_brandId);
        $this->db->like('lubricatorName',$search);
        if($status != null){
            $this->db->where("status", $status);
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

    function Lubricatorgears_search_count($search,$status,$gear_brandId)
    {
        $this->db->where("gear_brandId", $gear_brandId);
        $this->db->like('lubricatorName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
               
        $query = $this->db->get('lubricator_gear');
    
        return $query->num_rows();
    } 

    function getlubricatorbyId($gearId){
        $this->db->from('lubricator_gear');
        // $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId' , 'left');
        $this->db->where('gearId',$gearId);
        $result = $this->db->get()->row();
        return $result;
    }

    function update($data){
        $this->db->where('gearId',$data["gearId"]);
        return $this->db->update('lubricator_gear', $data);
    }

    function delete($gearId){
        return $this->db->delete('lubricator_gear', array('gearId' => $gearId));
    }

    function checkbeforeupdate($lubricatorName, $gearId, $gear_brandId, $lubricator_gear, $lubricator_numberId){   

        $this->db->from('lubricator_gear');
        $this->db->where('lubricatorName',$lubricatorName);
        $this->db->where('gear_brandId',$gear_brandId);
        $this->db->where('numberId',$lubricator_gear);
        $this->db->where_not_in('gearId',$gearId);
        $result = $this->db->get();
        return $result->row();
    }

    function updateStatus($gearId,$data){
        $this->db->where('gearId',$gearId);
        $result = $this->db->update('lubricator_gear', $data);
        return $result; 
    }

    ///
    
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


}