<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Advertisements extends CI_Model{
    
    function checkadvertisements($advertisement_name){
        $this->db->select("advertisement_id");
        $this->db->from("advertisement");
        $this->db->where("advertisement_name", $advertisement_name);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }

    function insert($data){
		return $this->db->insert('advertisement', $data);
    }

    function alladvertisement_count()
    {   
        $query = $this
                ->db
                ->get('advertisement');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function alladvertisement($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('advertisement');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }

    function alladvertisement_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('advertisement_name',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('advertisement');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function alladvertisement_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('advertisement_name',$search)
                ->where('status',$status)
                ->get('advertisement');
    
        return $query->num_rows();
    }

    function getadvertisementById($advertisement_id){
        // $this->db->select("news_id, news_picture, news_title, news_category, end_date");
        return $this->db->where('advertisement_id',$advertisement_id)->get("advertisement")->row();
    }

    function getadvertisementByIdForstatusOne(){
        $this->db->select("advertisement_id");
        $this->db->where('status', 1);
        $result = $this->db->get('advertisement')->row();
        return $result;
    }

    function getadvertisementByIdForstatusTwo($advertisement_id){
        $this->db->select("advertisement_id");
        $this->db->where('advertisement_id', $advertisement_id);
        $result = $this->db->get('advertisement')->row();
        return $result;
    }

    function delete($advertisement_id){
        return $this->db->delete('advertisement', array('advertisement_id' => $advertisement_id));
    }

    function getadvertisementFromId($advertisement_id){
        // $this->db->select("news_id, news_picture, news_title, news_category, end_date, news_content");
        $this->db->where('advertisement_id',$advertisement_id);
        $result = $this->db->get('advertisement')->row();
        return $result;
    }

    function advertisement_picture(){
        $this->db->select("advertisement_picture");
        $this->db->where('status', 1);
        $result = $this->db->get('advertisement')->row();
        return $result;
    }

    function wherenot($advertisement_id, $advertisement_name){
        $this->db->select("advertisement_id");
        $this->db->from("advertisement");
        $this->db->where('advertisement_name', $advertisement_name);
        $this->db->where_not_in('advertisement_id', $advertisement_id);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('advertisement_id',$data['advertisement_id']);
        $result = $this->db->update('advertisement', $data);
        return $result;
    }

    function updateStatus($advertisement_id,$data){
        $this->db->where('advertisement_id',$advertisement_id);
        $result = $this->db->update('advertisement', $data);
        return $result; 
    }

///
 
}