<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Brand extends CI_Model {

	function __construct() {
        parent::__construct(); 
        
    }

    function allBrand_count()
    {   
        $query = $this
                ->db
                ->get('brand');
    
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function allBrand($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('brand');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    
    function brand_search($limit,$start,$search,$col,$dir,$status)
    {
        $this->db->like('brandName',$search);
        if($status != null){
            $this->db->where("status", $status);
        }

        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('brand');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function brand_search_count($search,$status)
    {
        $query = $this
                ->db
                ->like('brandName',$search)
                ->where('status', $status)
                ->get('brand');
    
        return $query->num_rows();
    } 
    
    function data_check_create($brandName) {
        $this->db->select("*");
        $this->db->from("brand");
        $this->db->where('brandName',$brandName);
        $result = $this->db->get();
        return $result->row();
    }

    function insert($data){
		return $this->db->insert('brand', $data);
    }

    function delete($brandId){
        return $this->db->delete('brand', array('brandId' => $brandId));
    }

    function getBrandbyId($brandId){
        return $this->db->where('brandId',$brandId)->get("brand")->row();
    }

    function data_check_update($brandId,$brandName){
        $this->db->select("brandName");
        $this->db->from("brand");
        $this->db->where('brandName', $brandName);
        $this->db->where_not_in('brandId', $brandId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('brandId',$data['brandId']);
        $result = $this->db->update('brand', $data);
        return $result;
    }

    function checkBrandforget($brandId){
        $this->db->select("brandId");
        $this->db->from("brand");
        $result = $this->db->count_all_results();

        if($result > 0){
            return true;
        }
        return false;
    }

    function updateStatus($brandId,$data){
        $this->db->where('brandId',$brandId);
        $result = $this->db->update('brand', $data);
        return $result; 
    }

    function checkStatusFromBrand($brandId,$status,$userId){
        $this->db->from('brand');
        $this->db->where('brandId',$brandId);
        $this->db->where('status',$status);
        $this->db->where('create_by',$userId);
        $this->db->where('activeFlag',2);
        $result = $this->db->count_all_results();
        if($result > 0){
            return true;
        }
        return false;
    }

    function getAllBrand(){
        $this->db->select("brandId,brandName");
        $this->db->where('status','1');
        $this->db->order_by('brandName', 'ASC');
        $query = $this->db->get("brand");
        return $query->result();
    }

    function getAllBrandNoStatus(){
        $this->db->select("brandId,brandName");
        $this->db->order_by('brandName', 'ASC');
        $query = $this->db->get("brand");
        return $query->result();
    }

    function getAllBrandgarage(){
        $this->db->select("brandId,brandName");
        // $this->db->where('status','1');
        $this->db->order_by('brandName', 'ASC');
        $query = $this->db->get("brand");
        return $query->result();
    }

    function getAllBrandforSelect(){
        $this->db->select("brandId,brandName");
        $this->db->where('status','1');
        $query = $this->db->get("brand");
        return $query->result();
    }

    function getAllBrandofRegister(){
        $this->db->select("brandId,brandName");
        // $this->db->where('status','1');
        $this->db->order_by('brandName', 'ASC');
        $query = $this->db->get("brand");
        return $query->result();
    }
}