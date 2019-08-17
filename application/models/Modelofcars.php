<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Modelofcars extends CI_Model{
    
    function data_check_create($modelofcarName,$modelId,$brandId){
        $this->db->from('modelofcar');
        $this->db->where('modelofcarName',$modelofcarName);
        $this->db->where('modelId',$modelId);
        $this->db->where('brandId',$brandId);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('modelofcar',$data);
    }

    function data_check_update($modelofcarName,$modelId,$brandId,$modelofcarId){
        $this->db->from('modelofcar');
        $this->db->where('modelofcarName',$modelofcarName);
        $this->db->where('modelId',$modelId);
        $this->db->where('brandId',$brandId);
        $this->db->where_not_in('modelofcarId',$modelofcarId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('modelofcarId',$data['modelofcarId']);
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

    function getAllmodelofcar($brandId,$modelId){
        $this->db->select('modelofcarId,modelofcarName');
        if($brandId == null){
            $this->db->where("brandId", $brandId);
        }

        if($modelId == null){
            $this->db->where("modelId", $modelId);
        }
        return $this->db->get("modelofcar")->result();
    }
    
    function all_modelofcar_count($brandId,$modelId){
        $this->db->where('brandId',$brandId);
        $this->db->where('modelId',$modelId);
        $query = $this->db->get('modelofcar');
    
        return $query->num_rows();  
    }
    function allmodelofcars($limit,$start,$col,$dir,$brandId,$modelId){
        $this->db->where('brandId',$brandId);
        $this->db->where('modelId',$modelId);
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
    function modelofcar_search_count($search,$status,$brandId,$modelId){
        $this->db->where("brandId", $brandId);
        $this->db->where("modelId", $modelId);
        $query = $this
                ->db
                ->like('modelofcarName',$search)
                ->where('status',$status)
                ->get('modelofcar');
    
        return $query->num_rows();
    }

    function getModelofcarbyId($modelofcarId){
        return $this->db->where('modelofcarId',$modelofcarId)->get("modelofcar")->row();
    }

    function getCarOfModelById($modelofcarId){
        return $this->db->where('modelofcarId',$modelofcarId)->get("modelofcar")->row();
    }

    function getUpdate($modelofcarId){
        $this->db->select("modelofcarId, modelofcarName, machineCode, machineSize");
        return $this->db->where('modelofcarId',$modelofcarId)->get("modelofcar")->row();
    }
    
    function getmodelofcarId($modelId){
        $this->db->select("modelofcarId,modelofcarName,machineSize");
        $this->db->where("modelId", $modelId);
        $this->db->where('status','1');
        $this->db->order_by('modelofcarName', 'ASC');
        $query = $this->db->get("modelofcar");
        return $query->result();
    }

    function getAllmodelofcars($modelId){
        $this->db->select("modelofcarName,machineSize,machineCode");
        $this->db->where("modelId", $modelId);
        $this->db->where('status','1');
        $this->db->order_by('modelofcarName', 'ASC');
        $query = $this->db->get("modelofcar");
        return $query->result();
    }

    function getAllCarModelForSelect($modelId){
        $this->db->select("modelofcarId,modelofcarName,machineSize,machineCode");
        $this->db->where("modelId", $modelId);
        // $this->db->where('status','1');
        $this->db->order_by('modelofcarName', 'ASC');
        $query = $this->db->get("modelofcar");
        return $query->result();
    }

    function getAllCarModelForMultiSelect($modelId){
        $this->db->select("modelofcar.modelofcarId,modelofcar.machineSize,modelofcar.machineCode,model.yearStart,model.yearEnd,model.modelId")->select("IFNULL(`detail`, '') AS `detail`", false)->select("IFNULL(`modelofcarName`, '') AS `modelofcarName`", false);
        $this->db->join("model", "model.modelId = modelofcar.modelId");
        $this->db->where_in("modelofcar.modelId", $modelId);
        $this->db->where('modelofcar.status','1');
        $this->db->order_by('modelofcar.modelId', 'ASC');
        $this->db->order_by('modelofcar.modelofcarName', 'ASC');
        $query = $this->db->get("modelofcar");
        return $query->result();
    }

}