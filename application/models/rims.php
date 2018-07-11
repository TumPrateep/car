<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class rims extends CI_Model{
    
    function delete($rimId){
        return $this->db->delete('rim', array('rimId' => $rimId));
    }
    function getrimById($rimId){
        $this->db->select("rimId,rimName");
        return $this->db->where('rimId',$rimId)->get("rim")->row();
    }
    function insert_rim($data){
		return $this->db->insert('rim', $data);
    }
    
    
    function checkrim($rimName) {
        $this->db->select("*");
        $this->db->from("rim");
        $this->db->where('rimName',$rimName);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }
    function allrim_count()
    {   
        $query = $this
                ->db
                ->get('rim');
    
        return $query->num_rows();  
    }
    function allrim($limit,$start,$col,$dir)
    {   
        $query = $this
            ->db
            ->limit($limit,$start)
            ->order_by($col,$dir)
            ->get('rim');
            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }
        
    }
    function rim_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('rimName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('rim');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
        
    }
    function rim_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('rimName',$search)
                ->where('status',$status)
                ->get('rim');
    
        return $query->num_rows();
    }
    function wherenotrim($rimId,$rimName){
        $this->db->select("rimName");
        $this->db->from("rim");
        $this->db->where('rimName', $rimName);
        $this->db->where_not_in('rimId', $rimId);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }
    function updaterim($data){
        $this->db->where('rimId',$data['rimId']);
        $result = $this->db->update('rim', $data);
        return $result;
    }
    function updateStatus($rimId,$data){
        $this->db->where('rimId',$rimId);
        $result = $this->db->update('rim', $data);
        return $result; 
    }
    function checkStatusFromRim($rimId,$status,$userId){
        $this->db->from('rim');
        $this->db->where('rimId',$rimId);
        $this->db->where('status',$status);
        $this->db->where('create_by',$userId);
        $this->db->where('activeFlag',2);
        $result = $this->db->count_all_results();
        if($result >0){
            return true;
        }
        return false ;
    }

    function getAllRims(){
        $this->db->select("rimId,rimName");
        $query = $this->db->get("rim");
        return $query->result();
    }
}