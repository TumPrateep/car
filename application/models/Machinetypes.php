
<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Machinetypes extends CI_Model{

    function allMachinetype_count($modelofcar_modelofcarId)
    {   
        $this->db->where("modelofcar_modelofcarId", $modelofcar_modelofcarId);
        $query = $this->db->get('machinetype');
        return $query->num_rows();                                                                                                                                                                                      
    }
    
    function allMachinetype($limit,$start,$col,$dir,$modelofcar_modelofcarId)
    {  
        $this->db->select('machinetypeId,machinetype,gear,status'); 
        $this->db->from('machinetype');
        $this->db->where("modelofcar_modelofcarId", $modelofcar_modelofcarId);
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
    function machinetype_search($limit,$start,$search,$col,$dir,$status,$modelofcar_modelofcarId)
    {
        $this->db->select('machinetypeId,machinetype,gear,status'); 
        $this->db->from('machinetype');
        $this->db->where("modelofcar_modelofcarId", $modelofcar_modelofcarId);
        $this->db->like('machinetype',$search);
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
    function machinetype_search_count($search,$status,$modelofcar_modelofcarId)
    {
        $this->db->select('machinetypeId,machinetype,gear,status'); 
        $this->db->from('machinetype');
        $this->db->where("modelofcar_modelofcarId", $modelofcar_modelofcarId);
        $this->db->like('machinetype',$search);

        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    } 
    
    function  insert($data){
        return $this->db->insert('machinetype', $data);
    }

    function update($data){
        $this->db->where('machinetypeId',$data['machinetypeId']);
        $result = $this->db->update('machinetype', $data);
        return $result;
    }
    
    function delete($machinetypeId){
        return $this->db->delete('machinetype', array('machinetypeId' => $machinetypeId));
    }

    function getmachinetypebyId($machinetypeId){
        $this->db->select("machinetypeId");
        $this->db->from("machinetype");
        $this->db->where('machinetypeId', $machinetypeId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }

    function data_check_create($machinetype,$modelofcar_modelofcarId,$gear){
        $this->db->select("machinetype");
        $this->db->from("machinetype");
        $this->db->where('machinetype', $machinetype);
        $this->db->where('modelofcar_modelofcarId', $modelofcar_modelofcarId);
        $this->db->where('gear', $gear);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($machinetype,$modelofcar_modelofcarId,$gear,$machinetypeId){
        $this->db->select("machinetype");
        $this->db->from("machinetype");
        $this->db->where('machinetype', $machinetype);
        $this->db->where('modelofcar_modelofcarId', $modelofcar_modelofcarId);
        $this->db->where('gear', $gear);
        $this->db->where_not_in('machinetypeId',$machinetypeId);
        $result = $this->db->get();
        return $result->row();
    }

    function getUpdate($machinetypeId){
        $this->db->select("machinetypeId,machinetype");
        $this->db->where('machinetypeId',$machinetypeId);
        $result = $this->db->get('machinetype');
        return $result->row();
    }

}