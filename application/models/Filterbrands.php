<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Filterbrands extends CI_Model{
    
    function checkfiltersbrands($filter_brandName){
        $this->db->select("filter_brandName");
        $this->db->from("filter_brand");
        $this->db->where("filter_brandName", $filter_brandName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }

    function insert($data){
		return $this->db->insert('filter_brand', $data);
    }

    function allFiltersbrands_count()
    {   
        $query = $this
                ->db
                ->get('filter_brand');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function allFiltersbrands($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('filter_brand');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }

    function Filtersbrands_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('filter_brandName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('filter_brand');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function Filtersbrands_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('filter_brandName',$search)
                ->where('status',$status)
                ->get('filter_brand');
    
        return $query->num_rows();
    }

    function getfiltersbrandsById($filter_brandId){
        $this->db->select("filter_brandId, filter_brandName, filter_picture");
        return $this->db->where('filter_brandId',$filter_brandId)->get("filter_brand")->row();
    }

    function delete($filter_brandId){
        return $this->db->delete('filter_brand', array('filter_brandId' => $filter_brandId));
    }

    function getfiltersbrandsFromId($filter_brandId){
        $this->db->select("filter_brandId, filter_brandName, filter_picture");
        $this->db->where('filter_brandId',$filter_brandId);
        $result = $this->db->get('filter_brand')->row();
        return $result;
    }

    function wherenot($filter_brandId, $filter_brandName){
        $this->db->select("filter_brandName");
        $this->db->from("filter_brand");
        $this->db->where('filter_brandName', $filter_brandName);
        $this->db->where_not_in('filter_brandId', $filter_brandId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('filter_brandId',$data['filter_brandId']);
        $result = $this->db->update('filter_brand', $data);
        return $result;
    }

    function updateStatus($gear_brandId,$data){
        $this->db->where('gear_brandId',$gear_brandId);
        $result = $this->db->update('lubricator_gear_brand', $data);
        return $result; 
    }

    function checkStatusFromfilterbrand($filter_brandId, $status, $userId){
        $this->db->from('filter_brand');
        $this->db->where('filter_brandId',$filter_brandId);
        $this->db->where('status',$status);
        $this->db->where('create_by',$userId);
        $this->db->where('activeFlag',2);

        $result = $this->db->count_all_results();
        if($result > 0 ){
            return true ;
        }
        return false;
    }
///
 
}