<?php 

if(!defined('BASEPATH')) exit('No direct script allowed');

class Registergarages extends CI_Model{

    function data_check_create($username,$personalid,$businessRegistration){
        $this->db->select("id");
        $this->db->from("users");
        $this->db->where("username", $username);
        $result1 = $this->db->get()->row();
        if(!empty($result1)){
            return $result1;
        }
        $this->db->select("user_profile");
        $this->db->from("user_profile");
        $this->db->where("personalid", $personalid);
        $result2 = $this->db->get()->row();
        if(!empty($result2)){
            return $result2;
        }
        $this->db->select("garageId");
        $this->db->from("garage");
        $this->db->where("businessRegistration", $businessRegistration);
        $result3 = $this->db->get()->row();
        if(!empty($result3)){
            return $result3;
        }

        return null;

    }

    function insert($data){
        $this->db->trans_begin();
        $this->db->insert('users', $data['users']);
        $userId = $this->db->insert_id();

        if( !empty($data['usersprofiles']) ){
            $data['usersprofiles']['userId'] = $userId;
            $this->db->insert('user_profile', $data['usersprofiles']);
        }

        if( !empty($data['garages']) ){
            $data['garages']['userId'] = $userId;
            $data['garages']['create_by'] = $userId;
            $this->db->insert('garage', $data['garages']);
        }

        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_commit();
            return true;
        }
    }
}