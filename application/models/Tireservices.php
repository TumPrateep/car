<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Tireservices extends CI_Model{

    function data_check_create($rimId){
        $this->db->from("tire_service");
        $this->db->where('tire_service.rimId',$rimId);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($tire_serviceId,$rimId){
        $this->db->select("tire_service.price,tire_service.rimId");
        $this->db->from("tire_service");
        $this->db->join('rim','tire_service.rimId = rim.rimId');
        $this->db->where('tire_service.rimId',$rimId);
        $this->db->where_not_in('tire_service.tire_serviceId',$tire_serviceId);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('tire_service',$data);
    }

    function delete($tire_serviceId){
        return $this->db->delete('tire_service', array('tire_serviceId' => $tire_serviceId));
    }
    // function getallTire($tire_changeId){
    //     $this->db->select("tire_price,rimId");
    //     $this->db->where('tire_changeId',$tire_changeId);
    //     $this->db->where('status','1');
    //     $result = $this->db->get('tire_change')->row();
    //     return $result;
    // }
    function allTireService($limit,$start,$col,$dir){
        $this->db->select('tire_service.price,rim.rimName, tire_service.status, tire_service.tire_serviceId, rim.rimId');
        $this->db->from('tire_service');
        $this->db->join('rim', 'tire_service.rimId = rim.rimId');
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }

    function update($data){
        $this->db->where('tire_serviceId',$data['tire_serviceId']);
        $result = $this->db->update('tire_service', $data);
        return $result;
    }
 
    function allTireService_count(){  
        $this->db->select('tire_service.price,rim.rimName, tire_service.status, tire_service.tire_serviceId, rim.rimId');
        $this->db->from('tire_service');
        $this->db->join('rim', 'tire_service.rimId = rim.rimId');

        $query = $this->db->get();
        return $query->num_rows();                                                                                                                                                                                     
    }
    
    function tireservice_search($limit,$start,$search,$col,$dir,$status=null){
        
        $this->db->select('tire_service.price,rim.rimName, tire_service.status, tire_service.tire_serviceId, rim.rimId');
        $this->db->from('tire_service');
        $this->db->join('rim', 'tire_service.rimId = rim.rimId');
        $this->db->like('rim.rimName',$search);
        if($status != null){
            $this->db->where("tire_service.status", $status);
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

    function tirechanges_search_count($search,$status=null){
        $this->db->select('tire_service.price,rim.rimName, tire_service.status, tire_service.tire_serviceId, rim.rimId');
        $this->db->from('tire_service');
        $this->db->join('rim', 'tire_service.rimId = rim.rimId');
        $this->db->like('rim.rimName',$search);
        if($status != null){
            $this->db->where("tire_service.status", $status);
        }
        $query = $this->db->get();
    
        return $query->num_rows();
    } 
    

    function getTireServiceById($tire_serviceId){
        // $this->db->select("tire_serviceId");
        $this->db->where('tire_serviceId',$tire_serviceId);
        $result = $this->db->get("tire_service");
        return $result->row();
    }

    function getTireServicePrice($rimId){
        $this->db->select("rimId,price");
        $this->db->where('rimId', $rimId);
        $result = $this->db->get("tire_service");
        return $result->row();
    }

}