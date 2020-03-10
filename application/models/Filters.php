<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Filters extends CI_Model{
    
    function checkFilters($filter_brandId, $filterName){
        // $this->db->select(''); 
        $this->db->from('filter');
        $this->db->where('filter_brandId',$filter_brandId);
        $this->db->where('filter_name',$filterName);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('filter', $data);
    }

    function allfilter_count($filter_brandId)
    {   
        // $this->db->select('');
        $this->db->where("filter_brandId", $filter_brandId);
        $this->db->from('filter');
        $query = $this->db->get();
        return $query->num_rows();                                                                                                                                                                                      
    }
    
    function allfilter($limit,$start,$col,$dir,$filter_brandId)
    {  
        // $this->db->select('');
        $this->db->from('filter');
        $this->db->where("filter_brandId", $filter_brandId);
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

    function filter_search($limit,$start,$search,$col,$dir,$status,$filter_brandId)
    {
        // $this->db->select('');
        $this->db->from('filter');
        $this->db->where("filter_brandId", $filter_brandId);
        $this->db->like('filter_name',$search);
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

    function filter_search_count($search,$status,$filter_brandId)
    {
        // $this->db->select('');
        $this->db->from('filter');
        $this->db->where("filter_brandId", $filter_brandId);
        $this->db->like('filter_name',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
               
        $query = $this->db->get();
    
        return $query->num_rows();
    } 

    function getfilterbyId($filter_id){
        $this->db->from('filter');
        $this->db->where('filter_id',$filter_id);
        $result = $this->db->get()->row();
        return $result;
    }

    function update($data){
        $this->db->where('filter_id',$data["filter_id"]);
        return $this->db->update('filter', $data);
    }

    function delete($filter_id){
        return $this->db->delete('filter', array('filter_id' => $filter_id));
    }

    function checkbeforeupdate($filter_id, $filter_brandId, $filterName){   

        $this->db->from('filter');
        $this->db->where('filter_brandId',$filter_brandId);
        $this->db->where('filter_name',$filterName);
        $this->db->where_not_in('filter_id',$filter_id);
        $result = $this->db->get();
        return $result->row();
    }

    function updateStatus($gearId,$data){
        $this->db->where('gearId',$gearId);
        $result = $this->db->update('lubricator_gear', $data);
        return $result; 
    }

    ///
    
    function checkStatusforUpdate($lubricatorId,$userId,$status){
        $this->db->from("lubricator");
        $this->db->where('lubricatorId',$lubricatorId);
        $this->db->where('status',$status);
        $this->db->where('activeFlag',2);
        $this->db->where('create_by',$userId);
        $result = $this->db->count_all_results();
        if($result){
            return true;
        }
        return false;
    }
}