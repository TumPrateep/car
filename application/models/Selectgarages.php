<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Selectgarages extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }

    function select_garage_search($limit,$start,$order,$dir,$rimId,$service=2){

        $this->db->from("garage");
        $this->db->join("tire_change_garage", "garage.garageId = tire_change_garage.garageId");

        $this->db->where("tire_change_garage.rimId", $rimId);

        if($service != null){
            if($service == 1){
                $this->db->where("garage.garageService like '1__'");
            }else if($service == 2){
                $this->db->where("garage.garageService like '_1_'");
            }else{
                $this->db->where("garage.garageService like '__1'");
            }
        }

        $query = $this->db->limit($limit,$start)
                ->order_by($order,$dir)
                ->get();
        
        if($query->num_rows()>0){
            return $query->result();  
        }else{
            return null;
        }
    }

    function select_garage_search_count($rimId,$service=2){
        
        $this->db->from("garage");
        $this->db->join("tire_change_garage", "garage.garageId = tire_change_garage.garageId");

        $this->db->where("tire_change_garage.rimId", $rimId);

        if($service != null){
            if($service == 1){
                $this->db->where("garageService like '1__'");
            }else if($service == 2){
                $this->db->where("garageService like '_1_'");
            }else{
                $this->db->where("garageService like '__1'");
            }
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

}