<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatortypes extends CI_Model{
    
    function allLubricatorTypes_count()
    {   
        $query = $this->db->get('lubricator_type');
        return $query->num_rows();                                                                                                                                                                                    
    }
    
    function allLubricatorTypes($limit,$start,$col,$dir)
    {   
       $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_type');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
    function lubricatorTypes_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('lubricator_typeName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('lubricator_type');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }
    function lubricatorTypes_search_count($search,$status)
    {
        $query = $this->db->like('lubricator_typeName',$search)
                ->where('status',$status)
                ->get('lubricator_type');
    
        return $query->num_rows();
    } 

    function updateStatus($lubricator_typeId,$data){
        $this->db->where('lubricator_typeId',$lubricator_typeId);
        $result = $this->db->update('lubricator_type', $data);
        return $result; 
    }

    function update($data){
        $this->db->where('lubricator_typeId',$data['lubricator_typeId']);
        $result = $this->db->update('lubricator_type', $data);
        return $result;
    }

    function insert($data){
		return $this->db->insert('lubricator_type', $data);
    }

    function data_check_create($lubricator_typeName) {
        $this->db->select("*");
        $this->db->from("lubricator_type");
        $this->db->where('lubricator_typeName',$lubricator_typeName);
        $result = $this->db->get();
        return $result->row();
    }

    function delete($lubricator_typeId){
        return $this->db->delete('lubricator_type', array('lubricator_typeId' => $lubricator_typeId));
    }

    function getLubricatorTypes($lubricator_typeId){
        $this->db->select("lubricator_typeId,lubricator_typeName");
        return $this->db->where('lubricator_typeId',$lubricator_typeId)->get("lubricator_type")->row();
    }

    function checkStatusFromLubricatorTypes($lubricator_typeId,$status,$userId){
        $this->db->from('lubricator_type');
        $this->db->where('lubricator_typeId',$lubricator_typeId);
        $this->db->where('status',$status);
        $this->db->where('create_by',$userId);
        $this->db->where('activeFlag',2);
        $result = $this->db->count_all_results();
        if($result > 0 ){
            return true ;
        }
        return false;
    }

    function getLubricatorTypeById($lubricator_typeId){
        $this->db->select("*");
        $this->db->from("lubricator_type");
        $result = $this->db->where('lubricator_typeId',$lubricator_typeId)->get();
        return $result->row();
    }

    function getUpdate($lubricator_typeId){
        $this->db->select("lubricator_typeId,lubricator_typeName,lubricator_typeSize,lubricator_typePicture");
        $this->db->from("lubricator_type");
        $result = $this->db->where('lubricator_typeId',$lubricator_typeId)->get();
        return $result->row();
    }

    function getAllLubricatorTypes(){
        $this->db->select("lubricator_typeId,lubricator_typeName");
        $result = $this->db->get("lubricator_type")->result();
        return $result;
    }

    function data_check_update($lubricator_typeId,$lubricator_typeName){
        $this->db->select("lubricator_typeName");
        $this->db->from("lubricator_type");
        $this->db->where('lubricator_typeName', $lubricator_typeName);
        $this->db->where_not_in('lubricator_typeId', $lubricator_typeId);
        $result = $this->db->get();
        return $result->row();
    }

    function checklubricator($lubricator_typeName,$lubricator_typeId){
        $this->db->from("lubricator_type");
        $this->db->where('lubricator_typeId',$lubricator_typeId);
        $this->db->where('lubricator_typeName',$lubricator_typeName);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
            return true;
    }

}