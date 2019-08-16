<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Geartypes extends CI_Model{

    function allGeartype_count()
    {   
        $query = $this->db->get('geartype');
        return $query->num_rows();  
    }
    
    function allGeartype($limit,$start,$col,$dir)
    {   
       $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('geartype');
        
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }
   
    
    function geartype_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('gearname',$search);
        if($status != null){
            $this->db->where("status", $status);
        }

        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('geartype');
        
        if($query->num_rows()>0){
            return $query->result();  
        }else{
            return null;
        }
    }

    function geartype_search_count($search,$status)
    {
        $query = $this->db->like('gearname',$search)
                ->where('status', $status)
                ->get('geartype');
    
        return $query->num_rows();
    }

    function data_check_create($gearname){
        $this->db->from("geartype");
        $this->db->where("gearname",$gearname);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($gearname,$id){
        $this->db->from("geartype");
        $this->db->where("gearname",$gearname);
        $this->db->where_not_in('id',$id);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('id',$data['id']);
        $result = $this->db->update('geartype', $data);
        return $result;
    }

    function insert($data){
        return $this->db->insert('geartype',$data);
    }

    function delete($id){
        return $this->db->delete('geartype', array('id' => $id));
    }

    function getGeartypeById($id){
        return $this->db->where('id',$id)->get("geartype")->row();
    }

    function getAllGearType(){
        return $this->db->get("geartype")->result();
    }

}