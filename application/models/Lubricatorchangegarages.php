<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Lubricatorchangegarages extends CI_Model{
    // insert
    function insert($data){
        return $this->db->insert('lubricator_change_garage',$data);
    }
    function data_check_create($garageId, $machine_id){
        $this->db->from("lubricator_change_garage");
        $this->db->where("garageId", $garageId);
        $this->db->where("machine_id", $machine_id);
        $result = $this->db->get();
        return $result->row();
    }

    // update
    function getUpdate($lubricator_change_garageId){
        $this->db->select('lubricator_change_garageId,lubricator_price,machine_id');
        $this->db->where('lubricator_change_garageId',$lubricator_change_garageId);
        $result = $this->db->get("lubricator_change_garage")->row();
        return $result;
    }
    function data_check_update($lubricator_change_garageId,$garageId,$machine_id){
        $this->db->from("lubricator_change_garage");
        $this->db->where("garageId",$garageId);
        $this->db->where("machine_id",$machine_id);
        $this->db->where_not_in('lubricator_change_garageId',$lubricator_change_garageId);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
        $this->db->where('lubricator_change_garageId',$data['lubricator_change_garageId']);
        $result = $this->db->update('lubricator_change_garage', $data);
        return $result;
    }

    // delete
    function delete($lubricator_change_garageId){
        return $this->db->delete('lubricator_change_garage', array('lubricator_change_garageId' => $lubricator_change_garageId));
        }
    function getLubricatorChangeById($lubricator_change_garageId){
        $this->db->select("lubricator_change_garageId");
        $this->db->where('lubricator_change_garageId',$lubricator_change_garageId);
        $result = $this->db->get("lubricator_change_garage");
        return $result->row();
    }

    // search เข้ามาครั้งเเรก ใช้ดึงข้อมูลมาเเสดง คู่กันกับ allLubricatorschanges_count + funtion search ข้อมูล
    function allLubricatorchanges($limit,$start,$col,$dir,$garageId){
        $this->db->select('lubricator_change_garage.lubricator_change_garageId, lubricator_change_garage.lubricator_price, lubricator_change_garage.status, lubricator_change_garage.garageId, machine.machine_type');
        $this->db->from('lubricator_change_garage');
        $this->db->join('machine', 'lubricator_change_garage.machine_id = machine.machineId');
        $this->db->where("lubricator_change_garage.garageId",$garageId);

        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }
    function allLubricatorschanges_count($garageId){  
        $this->db->select('lubricator_change_garageId');
        $this->db->from('lubricator_change_garage');
        $this->db->where("garageId",$garageId);
        $query = $this->db->get();
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    // lubricatorchanges_search ,lubricatorchanges_search_count ใช้ในการ search ข้อมูล
    function lubricatorchanges_search($limit,$start,$search,$col,$dir,$status,$garageId){
        
        $this->db->select('lubricator_change_garage.lubricator_change_garageId, lubricator_change_garage.lubricator_price, lubricator_change_garage.status, lubricator_change_garage.garageId, machine.machine_type');
        $this->db->from('lubricator_change_garage');
        $this->db->join('machine', 'lubricator_change_garage.machine_id = machine.machineId');

        $this->db->where("lubricator_change_garage.garageId",$garageId);
        if($search != null){
            $this->db->where("lubricator_change_garage.lubricator_price",$search);
        }
        if($status != null){
            $this->db->where("lubricator_change_garage.status", $status);
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
    function lubricatorchanges_search_count($search,$status,$garageId){
       
        $this->db->select('lubricator_change_garageId, lubricator_price, status');
        $this->db->from('lubricator_change_garage');
        $this->db->where("garageId",$garageId);
        if($search != null){
            $this->db->where("lubricator_price",$search);
        }
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    } 


}