<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Spares extends CI_Model{

    function allSpares_count($sparesId)
    {   
        $this->db->where("sparesId", $sparesId);
        $query = $this->db->get('sparesbrand');
    
        return $query->num_rows();  

    }
    
    function allSpares($limit,$start,$col,$dir,$sparesId)
    {   
        $this->db->where("sparesId", $sparesId);
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('sparesId');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function spare_search($limit,$start,$search,$col,$dir,$sparesId)
    {
        $this->db->where("sparesId", $sparesId);
        $query = $this
                ->db
                ->like('sparesName',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('spares');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function spare_search_count($search, $sparesId)
    {
        $this->db->where("sparesId", $sparesId);
        $query = $this
                ->db
                ->like('sparesName',$search)
                ->get('sparesName');
    
        return $query->num_rows();
    }


    function insertSpares($data){
        $result = $this->db->insert('spares', $data);
        return $result;
    }

    function getBrandforTF($sparesName){
        $this->db->select("sparesName");
        $this->db->from("spares");
        $this->db->where('sparesName', $sparesName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function wherenotspares($sparesId,$sparesName){
        $this->db->select("sparesName");
        $this->db->from("spares");
        $this->db->where('sparesName', $sparesName);
        $this->db->where_not_in('sparesdId', $sparesdId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function updateSpares($data){
        $this->db->where('sparesId',$data['sparesdId']);
        $result = $this->db->update('spares', $data);
        return $result;
    }

    function getSparebyId($sparesId){
        $this->db->where('sparesId',$sparesId);
        $result = $this->db->get('spares')->row();
        return $result;
    }

    function delete($sparesId){
        return $this->db->delete('spares', array('sparesId' => $sparesId));
    }

    function checkSpares($sparesName) {
        $this->db->select("*");
        $this->db->from("spares");
        $this->db->where('sparesName',$sparesName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }else{
            return false;
        }

    }
    
    function getSpares($sparesName){
        return $this->db->where('sparesName',$sparesName)->get("spares")->row();
    }


    function checkSpare($sparesName) {
        $this->db->select("*");
        $this->db->from("spares");
        $this->db->where('sparesName',$sparesName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }else{
            return false;
        }

    }

    function getSparebyId($sparesId){
        $this->db->select("sparesId");
        $this->db->from("spares");
        $this->db->where('sparesId', $$sparesId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function getSpare($sparesId){
        $this->db->where('sparesId',$sparesId);
        $result = $this->db->get('spares')->row();
        return $result;
    }
   

}