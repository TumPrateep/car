<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class M_main extends CI_Model{

	function get_user($q) {
		$this->db->where('username', $q);
		return $this->db->or_where('phone', $q)->get('users');
	}
	
}