<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class rims extends CI_Model{
    
    function delete($rimId){
        return $this->db->delete('rim', array('rimId' => $rimId));
    }

    function getrimbyId($rimId){
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

    function rim_search($limit,$start,$search,$col,$dir)
    {
        $query = $this
                ->db
                ->like('rimName',$search)
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

    function rim_search_count($search)
    {
        $query = $this
                ->db
                ->like('rimName',$search)
                ->get('rim');
    
        return $query->num_rows();
    }
}