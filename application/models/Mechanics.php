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
    function allmechanics_count()
    {   
        $query = $this
                ->db
                ->get('mechanic');
    
        return $query->num_rows();  
    }
    function allmechanics($limit,$start,$col,$dir)
    {   
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
    function data_check_create($personalid,$garageId) {
        // $this->db->select("firstName");
        $this->db->from("mechanic");
        $this->db->where('personalid',$personalid);
        $this->db->where('garageId',$garageId);
        $result = $this->db->get();
        return $result->row();
    }
    function data_check_update($mechanicId,$firstName){
        $this->db->select("firstName");
        $this->db->from("mechanic");
        $this->db->where('firstName', $firstName);
        $this->db->where_not_in('mechanicId', $mechanicId);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
        $this->db->where('mechanicId',$data['mechanicId']);
        $result = $this->db->update('mechanic', $data);
        return $result;
    }
    function mechanics_search($limit,$start,$col,$dir,$firstname,$skill)
    {
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
    function mechanics_search_count($firstname,$skill){
        $this->db->like('firstName',$firstname);
        if($skill != null){
            $this->db->where("skill", $skill);
        }
        $query = $this->db->get('mechanic');
        return $query->num_rows();
    }
    
}