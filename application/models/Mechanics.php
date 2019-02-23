<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Mechanics extends CI_Model {
    function delete($mechanicId){
        return $this->db->delete('mechanic', array('mechanicId' => $mechanicId));
    }
    function getMechanicsById($mechanicId){
        return $this->db->where('mechanicId',$mechanicId)->get("mechanic")->row();
    }
    function insert($data){
        return $this->db->insert('mechanic', $data);
    }
    function allmechanics_count($garageId)
    {   
        $this->db->where("garageId", $garageId);
        $this->db->where('status', 2);
        $query = $this
                ->db
                ->get('mechanic');
    
        return $query->num_rows();  
    }
    function allmechanics($limit,$start,$col,$dir,$garageId)
    {   
        $this->db->where("garageId", $garageId);
        $this->db->where('status', 2);
        $query = $this
            ->db
            ->limit($limit,$start)
            ->order_by($col,$dir)
            ->get('mechanic');
            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }
        
    }
    function data_check_create($idCard,$garageId) {
        $this->db->select("personalid");
        $this->db->from("mechanic");
        $this->db->where('personalid',$idCard);
        $this->db->where('garageId',$garageId);
        $result = $this->db->get();
        return $result->row();
    }
    function data_check_update($garageId,$idCard){
        $this->db->select("personalid");
        $this->db->from("mechanic");
        $this->db->where('personalid', $idCard);
        $this->db->where_not_in('garageId', $garageId);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
        $this->db->where('mechanicId',$data['mechanicId']);
        $result = $this->db->update('mechanic', $data);
        return $result;
    }
    function mechanics_search($limit,$start,$col,$dir,$firstname,$skill,$garageId)
    {
        $this->db->where("garageId", $garageId);
        $this->db->where('status', 2);
        $this->db->like('firstName',$firstname);
        if($skill != null){
            $this->db->where("skill", $skill);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('mechanic');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
        
    }
    function mechanics_search_count($firstname,$skill,$garageId){
        $this->db->where('status', 2);
        $this->db->where("garageId", $garageId);
        $this->db->like('firstName',$firstname);
        if($skill != null){
            $this->db->where("skill", $skill);
        }
        $query = $this->db->get('mechanic');
        return $query->num_rows();
    }

    function getOwnerGarage($garageId){
        $this->db->select("firstName, garageId, lastName, personalid, phone, picture, skill, exp, mechanicId, titleName");
        $this->db->where("garageId", $garageId);
        $this->db->where("status", 1);
        return $this->db->get("mechanic")->row();
    }
    
}