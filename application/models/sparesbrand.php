<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Sparesbrand extends CI_Model{

    function allSpares_brand_count($spares_brandId)
    {   
        $this->db->where("spares_brandId", $spares_brandId);
        $query = $this->db->get('spares_brand');
    
        return $query->num_rows();  

    }
    
    function allSpares_brand($limit,$start,$col,$dir,$spares_brandId)
    {   
        $this->db->where("spares_brandId", $spares_brandId);
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('spares_brand');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function spares_brand_search($limit,$start,$search,$col,$dir,$spares_brandId)
    {
        $this->db->where("spares_brandId", $spares_brandId);
        $query = $this
                ->db
                ->like('spares_brandName',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('spares_brand');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function spares_brand_search_count($search, $spares_brandId)
    {
        $this->db->where("spares_brandId", $spares_brandId);
        $query = $this
                ->db
                ->like('spares_brandName',$search)
                ->get('spares_brand');
    
        return $query->num_rows();
    }

    function insertBrand($data){
        $result = $this->db->insert('spares_brand', $data);
        return $result;
    }

    function getBrandforTF($spares_brandName,$spares_undercarriageId){
        $this->db->select("spares_brandName");
        $this->db->from("spares_brand");
        $this->db->where('spares_brandName', $spares_brandName);
        $this->db->where('spares_undercarriageId' , $spares_undercarriageId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function wherenotBrand($spares_brandId,$spares_brandName,$spares_undercarriageId){
        $this->db->select("spares_brandName");
        $this->db->from("spares_brand");
        $this->db->where('spares_brandName', $spares_brandName);
        $this->db->where('spares_undercarriageId', $spares_undercarriageId);
        $this->db->where_not_in('spares_brandId', $spares_brandId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }

    function updateBrand($data){
        $this->db->where('spares_brandId',$data['spares_brandId']);
        $result = $this->db->update('spares_brand', $data);
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