<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Mechanic extends CI_Model {

    function delete($mechanicId){
        return $this->db->delete('mechanic', array('mechanicId' => $mechanicId));
    }

    function getMechanicById($mechanicId){
        return $this->db->where('mechanicId',$mechanicId)->get("mechanic")->row();
    }

    function insert($data){
		return $this->db->insert('mechanic', $data);
    }

    function allmechanic_count()
    {   
        $query = $this
                ->db
                ->get('mechanic');
    
        return $query->num_rows();  
    }

    function allmechanic($limit,$start,$col,$dir)
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

    function data_check_create($firstName) {
        $this->db->select("firstName");
        $this->db->from("mechanic");
        $this->db->where('firstName',$firstName);
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

    function mechanic_search($limit,$start,$col,$dir,$firstname,$skill)
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

    function mechanic_search_count($firstname,$skill){
        $this->db->like('firstName',$firstname);
        if($skill != null){
            $this->db->where("skill", $skill);
        }
        $query = $this->db->get('mechanic');
        return $query->num_rows();
    }
    
}