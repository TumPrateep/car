<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Year extends CI_Model{

    function year_search($search){
        $this->db->where('brandId',$search['brandId']);
        $this->db->where('modelId',$search['modelId']);
        $this->db->where('year',$search['year']);
        $result = $this->db->get('year');
        
        if($result->num_rows() > 0){
            return false;
        }   
        return true;
    }

    function insert_year($data){
        $result = $this->db->insert('year', $data);
        return $result;
    }

    function getyear($brandId,$modelId,$year){

        $this->db->where('brandId',$search['brandId']);
        $this->db->where('modelId',$search['modelId']);
        $this->db->where('year',$search['year']);
        $result = $this->db->get('year')->row();

        return $result;

    }

    function delete($brandId,$modelId,$year){
        return $this->db->delete('year', array('brandId' => $brandId , 'modelId' => $modelId , 'year' => $year));
    }


    function allYear_count($year)
    {   
        $this->db->where("year", $year);
        $query = $this->db->get('year');
    
        return $query->num_rows();  

    }
   
}

?>