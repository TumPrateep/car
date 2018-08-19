<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Caraccessories extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }

    function getCarAccessoriesFromCarAccessoriesByUserId($userId){
        return $this->db->where('userId',$userId)->get("car_accessories")->row();
    }

}