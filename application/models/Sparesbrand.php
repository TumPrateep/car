<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Sparesbrand extends CI_Model{

    function allSpares_brand_count()
    {   
        // $this->db->where("spares_undercarriageId", $spares_undercarriageId);
        $query = $this
                ->db
                ->get('spares_brand');
    
        return $query->num_rows();  

    }
    
    function allSpares_brand($limit,$start,$col,$dir)
    {   
    //    $this->db->where("spares_undercarriageId", $spares_undercarriageId);
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
   
    function spares_brand_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('spares_brandName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }
        $query = $this->db->limit($limit,$start)
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

    function spares_brand_search_count($search,$status)
    {
        // $this->db->where("spares_undercarriageId", $spares_undercarriageId);
        $query = $this
                ->db
                ->like('spares_brandName',$search)
                ->where('status',$status)
                ->get('spares_brand');
    
        return $query->num_rows();
    }

    function insert($data){
        return $this->db->insert('spares_brand',$data);
    }

    function data_check_create($spares_brandName){
        $this->db->from("spares_brand");
        $this->db->where('spares_brandName', $spares_brandName);
        // $this->db->where('spares_undercarriageId', $spares_undercarriageId);
        $result = $this->db->get();
        return $result->row();
    }


    function update($data){
        $this->db->where('spares_brandId',$data['spares_brandId']);
        $result = $this->db->update('spares_brand', $data);
        return $result;
    }

    function getSpareBrandbyId($spares_brandId){
       return $this->db->where('spares_brandId',$spares_brandId)->get('spares_brand')->row();
    
    }

    function delete($spares_brandId){
        return $this->db->delete('spares_brand', array('spares_brandId' => $spares_brandId));
    }

    function checkSpareBrand($spares_brandId,$spares_undercarriageId) {
        $this->db->select("*");
        $this->db->from("spares_brand");
        $this->db->where('spares_brandId',$spares_brandId);
        $this->db->where('spares_undercarriageId',$spares_undercarriageId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }else{
            return false;
        }

    }

    function updateStatus($spares_brandId,$data){
        $this->db->where('spares_brandId',$spares_brandId);
        $result = $this->db->update('spares_brand', $data);
        return $result; 
    }

    function checkStatusFromSpareBrand($spares_brandId,$status,$userId){
        $this->db->from("spares_brand");
        $this->db->where('spares_brandId',$spares_brandId);
        $this->db->where('status',$status);
        $this->db->where('create_by',$userId);
        $this->db->where('activeFlag',2);
        $result = $this->db->count_all_results();
        if($result > 0){
            return true;
        }
        return false;
    }

    function getAllSpareBrand(){
        // $this->db->where("spares_undercarriageId", $spares_undercarriageId);
        $this->db->where('status','1');
        $query = $this->db->get("spares_brand");
        return $query->result();
    }

    function data_check_update($spares_brandId,$spares_brandName){
        $this->db->select("spares_brandName");
        $this->db->from("spares_brand");
        $this->db->where('spares_brandName', $spares_brandName);
        // $this->db->where('spares_undercarriageId', $spares_undercarriageId);
        $this->db->where_not_in('spares_brandId', $spares_brandId);
        $result = $this->db->get();
        return $result->row();
    }
    function getUpdate($spares_brandId){
        $this->db->select("spares_brandId, spares_brandName, spares_brandPicture");
        $this->db->where('spares_brandId',$spares_brandId);
        return $this->db->get("spares_brand")->row();
    }

}