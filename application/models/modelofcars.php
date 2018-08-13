<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class modelofcars extends CI_Model{
    function checkduplicate($modelofcarName,$modelId,$brandId){
        $this->db->from('modelofcar');
        $this->db->where('modelofcarName',$modelofcarName);
        $this->db->where('modelId',$modelId);
        $this->db->where('brandId',$brandId);
        $result = $this->db->count_all_results();
        if($result > 0 ){
            return false;
        }
            return true;
    }
    function insert($data){
        return $this->db->insert('modelofcar',$data);
    }
    function checkduplicateforupdate($modelofcarName,$modelId,$brandId,$modelofcarId){
        $this->db->from('modelofcar');
        $this->db->where('modelofcarName',$modelofcarName);
        $this->db->where('modelId',$modelId);
        $this->db->where('brandId',$brandId);
        $this->db->where_not_in('modelofcarId',$modelofcarId);
        $result = $this->db->count_all_results();
        if($result > 0 ){
            return false;
        }
            return true;
    }

    function update($data,$modelofcarId){
        $this->db->where('modelofcarId',$modelofcarId);
        $result = $this->db->update('modelofcar',$data);
        return $result;
    }
    function Check($modelofcarId){
        $this->db->from('modelofcar');
        $this->db->where('modelofcarId',$modelofcarId);
        $result = $this->db->count_all_results();
       
        if($result > 0){
            return true;
        }else{
            return false;
        }
    }
    function delete($modelofcarId){
        return $this->db->delete('modelofcar',array('modelofcarId' => $modelofcarId));
    }
    function Checkpermistion($userId,$modelofcarId){
        $this->db->from('modelofcar');
        $this->db->where('modelofcarId',$modelofcarId);
        $this->db->where('create_by',$userId);
        $this->db->where('status',2);
        $this->db->where('activeFlag',2);
        $result = $this->db->count_all_results();
        if($result > 0 ){
            return true;
        }
            return false;
    }
    function getAllmodelofcar($modelofcarId){
        $this->db->select('modelofcarName');
        return $this->db->where('modelofcarId',$modelofcarId)->get("modelofcar")->row();
        
    }
    function all_modelofcar_count($brandId,$modelId){
        $this->db->where("brandId", $brandId);
        $this->db->where("modelId", $modelId);
        $query = $this
                ->db
                ->get('modelofcar');
    
        return $query->num_rows();  
    }
    function allmodelofcars($limit,$start,$col,$dir,$brandId,$modelId){
        $this->db->where("brandId", $brandId);
        $this->db->where("modelId", $modelId);
        $query = $this->db->limit($limit,$start)
            ->order_by($col,$dir)
            ->get('modelofcar');
            
            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }
    }
    function modelofcar_search($limit,$start,$search,$col,$dir,$status,$brandId,$modelId){
        $this->db->where("brandId", $brandId);
        $this->db->where("modelId", $modelId);
        $this->db->like('modelofcarName',$search);
        if($status != null){
            $this->db->where("status",$status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('modelofcar');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function modelofcar_search_count($search,$modelofcarId,$status,$brandId,$modelId){
        $this->db->where("brandId", $brandId);
        $this->db->where("modelId", $modelId);
        $query = $this
                ->db
                ->like('modelofcarName',$search)
                ->where('status',$status)
                ->get('modelofcar');
    
        return $query->num_rows();
    }

    function updateStatus($modelofcarId,$data){
        $this->db->where('modelofcarId',$modelofcarId);
        $result = $this->db->update('modelofcar', $data);
        return $result; 
    }

    function getCarOfModel($modelofcarId){
        $this->db->select("modelofcarId, modelofcarName, machineCode, bodyCode");
        return $this->db->where('modelofcarId',$modelofcarId)->get("modelofcar")->row();
    }
    
    function getmodelofcar($modelId){
        $this->db->select("modelofcarId,modelofcarName");
        $this->db->where("modelId", $modelId);
        $this->db->order_by('modelofcarName', 'ASC');
        $query = $this->db->get("modelofcar");
        return $query->result();
    }
}