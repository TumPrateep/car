<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Garage extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }

    function getGarageFromGarageByUserId($userId){
        return $this->db->where('userId',$userId)->get("garage")->row();
    }

}