<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class lubricatorTypes extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    function ChecklubricatorTypes($lubricator_typeName){
        $this->db->select("lubricator_typeName");
        $this->db->from("lubricator_type");
        $this->db->where('lubricator_typeName', $lubricator_typeName);
        $result = $this->db->count_all_results();
        if($result > 0){
            return false;
        }
        return true;
    }



    function insert_lubricatorType($data){
		$result = $this->db->insert('lubricator_type', $data);
        return $result;
    }
    


}
