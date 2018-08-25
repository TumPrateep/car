<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Tirerims extends CI_Model{
    
    function __construct() {
        parent::__construct(); 
    }

    function getAllTireRimByName($q, $limit){
        if($q != null && $q != ""){
            $this->db->like('rimName',$q); 
        }       
        return $this->db->limit($limit, 0)->get("rim")->result();
    }
}