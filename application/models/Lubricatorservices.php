<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorservices extends CI_Model{

    function data_check_create($machine_id){
        $this->db->from("lubricator_service");
        $this->db->where('machine_id',$machine_id);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($lubricator_serviceId, $machineId){
        $this->db->select("lubricator_service.price");
        $this->db->from("lubricator_service");
        // $this->db->join('rim','tire_service.rimId = rim.rimId');
        $this->db->where('lubricator_service.machine_id', $machineId);
        $this->db->where_not_in('lubricator_service.lubricator_serviceId',$lubricator_serviceId);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('lubricator_service',$data);
    }

    function delete($lubricator_serviceId){
        return $this->db->delete('lubricator_service', array('lubricator_serviceId' => $lubricator_serviceId));
    }
    // function getallTire($tire_changeId){
    //     $this->db->select("tire_price,rimId");
    //     $this->db->where('tire_changeId',$tire_changeId);
    //     $this->db->where('status','1');
    //     $result = $this->db->get('tire_change')->row();
    //     return $result;
    // }
    function allLubricatorService($limit,$start,$col,$dir){
        $this->db->select('lubricator_service.price, lubricator_service.status, lubricator_service.lubricator_serviceId, machine.machine_type');
        $this->db->from('lubricator_service');
        $this->db->join('machine','lubricator_service.machine_id = machine.machineId');
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }

    function update($data){
        $this->db->where('lubricator_serviceId',$data['lubricator_serviceId']);
        $result = $this->db->update('lubricator_service', $data);
        return $result;
    }
 
    function alllubricatorService_count(){  
        $this->db->select('lubricator_service.price, lubricator_service.status, lubricator_service.lubricator_serviceId');
        $this->db->from('lubricator_service');
        $query = $this->db->get();
        return $query->num_rows();                                                                                                                                                                                     
    }
    
    function lubricatorservice_search($limit,$start,$search,$col,$dir,$status=null){
        
        $this->db->select('lubricator_service.price, lubricator_service.status, lubricator_service.lubricator_serviceId');
        $this->db->from('lubricator_service', $search);
        
        if($status != null){
            $this->db->where("lubricator_service.status", $status);
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

    function lubricatorchanges_search_count($search,$status=null){
        $this->db->select('lubricator_service.price, lubricator_service.status, lubricator_service.lubricator_serviceId');
        $this->db->from('lubricator_service', $search);
    
        if($status != null){
            $this->db->where("lubricator_service.status", $status);
        }
        $query = $this->db->get();
    
        return $query->num_rows();
    } 
    

    function getLubricatorServiceById($lubricator_serviceId){
        // $this->db->select("tire_serviceId");
        $this->db->where('lubricator_serviceId',$lubricator_serviceId);
        $result = $this->db->get("lubricator_service");
        return $result->row();
    }
}