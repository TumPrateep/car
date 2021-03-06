<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Newss extends CI_Model{
    
    function checkNewss($news_title, $news_category){
        $this->db->select("news_id");
        $this->db->from("news");
        $this->db->where("news_title", $news_title);
        $this->db->where("news_category", $news_category);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }

    function insert($data){
		return $this->db->insert('news', $data);
    }

    function allnews_count()
    {   
        $query = $this
                ->db
                ->get('news');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }

    function allnews($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('news');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }

    function allnews_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('news_title',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('news');       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function allnews_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('news_title',$search)
                ->where('status',$status)
                ->get('news');
    
        return $query->num_rows();
    }

    function getnewsById($news_id){
        $this->db->select("news_id, news_picture, news_title, news_category, end_date");
        return $this->db->where('news_id',$news_id)->get("news")->row();
    }

    function delete($news_id){
        return $this->db->delete('news', array('news_id' => $news_id));
    }

    function getnewsFromId($news_id){
        $this->db->select("news_id, news_picture, news_title, news_category, end_date, news_content");
        $this->db->where('news_id',$news_id);
        $result = $this->db->get('news')->row();
        return $result;
    }

    function wherenot($news_id, $news_title, $news_category){
        $this->db->select("news_id");
        $this->db->from("news");
        $this->db->where('news_title', $news_title);
        $this->db->where('news_category', $news_category);
        $this->db->where_not_in('news_id', $news_id);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('news_id',$data['news_id']);
        $result = $this->db->update('news', $data);
        return $result;
    }

    function updateStatus($news_id,$data){
        $this->db->where('news_id',$news_id);
        $result = $this->db->update('news', $data);
        return $result; 
    }

///
 
}