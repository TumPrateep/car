<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Year extends CI_Model{
    
    function allYear_count($brandId,$modelId)
    {   
        $this->db->where("brandId", $brandId,$modelId);
        $query = $this->db->get('year');
    
        return $query->num_rows();  

    }
    
    function allYear($limit,$start,$col,$dir,$brandId,$modelId)
    {   
        $this->db->where("brandId", $brandId);
        $this->db->where("modelId", $modelId);
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('year');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }

    function year_search($limit,$start,$search,$col,$dir,$brandId,$modelId){
        $this->db->where('brandId',$search['brandId']);
        $this->db->where('modelId',$search['modelId']);
        $this->db->where('year',$search['year']);
        $result = $this->db->get('year');
        
        if($result->num_rows() > 0){
            return false;
        }   
        return true;
    }

    function year_search_count($search, $brandId, $modelId)
    {
        $this->db->where("brandId", $brandId);
        $this->db->where('modelId',$modelId);
        $query = $this
                ->db
                ->like('brandId',$search)
                ->like('modelId',$search)
                ->get('year');
    
        return $query->num_rows();
    } 

    function insert_year($data){
        $result = $this->db->insert('year', $data);
        return $result;
    }



    function get_year($modelid,$brandId){
        $this->db->select("modelId");
        $this->db->select("brandId");
        $this->db->from("year");
        $this->db->where('modelId', $modelId);
        $this->db->where('brandId', $brandId);
        $result = $this->db->count_all_results();

        if($result > 0){
            return false;
        }
        return true;
    }


    function getyear($id){
        $this->db->where('id',$id);
        $result = $this->db->get('year')->row();
        return $result;
    }

    

    function delete($id){
        return $this->db->delete('year', array('id' => $id));
    }


    // function allYear_count($year)
    // {   
    //     $this->db->where("year", $year);
    //     $query = $this->db->get('year');   
    // }
}
?>