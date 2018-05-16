<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Spare extends CI_Model{

    function allSpare_count($brandsbrandId)
    {   
        $this->db->where("sparesbrandId", $sparesbrandId);
        $query = $this->db->get('sparesbrand');
    
        return $query->num_rows();  

    }
    
    function allSpare($limit,$start,$col,$dir,$sparesbrandId)
    {   
        $this->db->where("sparesbrandId", $sparesbrandId);
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('sparesbrand');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function spare_search($limit,$start,$search,$col,$dir,$sparesbrandId)
    {
        $this->db->where("sparesbrandId", $sparesbrandId);
        $query = $this
                ->db
                ->like('sparesbrandName',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('sparesbrand');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function spare_search_count($search, $sparesbrandId)
    {
        $this->db->where("sparesbrandId", $sparesbrandId);
        $query = $this
                ->db
                ->like('sparesbrandName',$search)
                ->get('sparesbrandName');
    
        return $query->num_rows();
    }

    function insertBrand($data){
        $result = $this->db->insert('sparesbrand', $data);
        return $result;
    }

    function getBrandforTF($sparesbrandName){
        $this->db->select("sparesbrandName");
        $this->db->from("sparesbrand");
        $this->db->where('sparesbrandName', $sparesbrandName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function wherenotBrand($sparesbrandId,$sparesbrandName){
        $this->db->select("sparesbrandName");
        $this->db->from("sparesbrand");
        $this->db->where('sparesbrandName', $sparesbrandName);
        $this->db->where_not_in('sparesbrandId', $sparesbrandId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function updateBrand($data){
        $this->db->where('sparesbrandId',$data['sparesbrandId']);
        $result = $this->db->update('sparesbrand', $data);
        return $result;
    }

    function getSpareBrandbyId($sparesbrandId){
        $this->db->where('sparesbrandId',$sparesbrandId);
        $result = $this->db->get('sparesbrand')->row();
        return $result;
    }

    function delete($sparesbrandId){
        return $this->db->delete('sparesbrand', array('sparesbrandId' => $sparesbrandId));
    }

    function checkBrand($sparesbrandName) {
        $this->db->select("*");
        $this->db->from("sparesbrand");
        $this->db->where('sparesbrandName',$sparesbrandName);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }else{
            return false;
        }

    }
    
    function getBrand($sparesbrandName){
        return $this->db->where('sparesbrandName',$sparesbrandName)->get("sparesbrand")->row();
    }


    function checkSpareBrand($sparesbrandName) {
        $this->db->select("*");
        $this->db->from("sparesbrand");
        $this->db->where('sparesbrandName',$sparesbrandName);
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