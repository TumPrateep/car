<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorapis extends CI_Model{
 
    function insert($data){
        $result = $this->db->insert('lubricator_api', $data);
        return $result;
    }
    function getLubricatorapisById($apiId){
        $this->db->where('apiId',$apiId);
        $result = $this->db->get('lubricator_api');
        return $result->row();
    }
    function getUpdate($apiId){
        $this->db->select("apiId,api");
        $this->db->where('apiId',$apiId);
        $result = $this->db->get('lubricator_api');
        return $result->row();
    }
    function data_check_create($machineId,$api){
        $this->db->select('api');
        $this->db->from('lubricator_api');
        $this->db->where('api',$api);
        $this->db->where('machineId',$machineId);
        $result = $this->db->get();
        
        return $result->row();
    }
    function data_check_update($machineId, $apiId, $api){
        $this->db->select('api');
        $this->db->from('lubricator_api');
        $this->db->where('api',$api);
        $this->db->where('machineId',$machineId);
        $this->db->where_not_in('apiId',$apiId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('apiId',$data["apiId"]);
        return $this->db->update('lubricator_api', $data);
    }

    function allApi_count($machineId)
    {   
        $this->db->where('machineId', $machineId);
        $query = $this
                ->db
                ->get('lubricator_api');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allApi($limit,$start,$col,$dir,$machineId)
    {  
        $this->db->where("machineId",$machineId);
        $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_api');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function machines_search($limit,$start,$search,$dir,$col,$status,$machineId)
    {
        $this->db->like('api',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $this->db->where('machineId', $machineId);
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_api'); 

        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function machines_search_count($search,$status,$machineId)
    {
        $this->db->where('machineId', $machineId);
        $query = $this
                ->db
                ->like('api',$search)
                ->where('status',$status)
                ->get('lubricator_api');
    
        return $query->num_rows();
    }  
    function delete($apiId){
        return $this->db->delete('lubricator_api', array('apiId' => $apiId));
    } 


}
