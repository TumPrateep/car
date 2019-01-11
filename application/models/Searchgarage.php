<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Searchgarage extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }

    // function alllubricatordata_count($userId){
    //     $this->db->where("lubricator_data.create_by", $userId);
    //     $query = $this->db->get('lubricator_data');
     
    //      return $query->num_rows();
    // }

    function allgarage_count(){   
        $query = $this
                ->db
                ->get('garage');
    
        return $query->num_rows();  
    }

    function allgarage($limit,$start,$col,$dir){   
        $query = $this
            ->db
            ->limit($limit,$start)
            ->order_by($col,$dir)
            ->get('garage');
            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }
        
    }

}