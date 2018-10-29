<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Member extends CI_Model{

    function insert($data){
        $result = $this->db->insert('member', $data);
        return $result;
    }

    function update($data){
        $this->db->where('id',$data['id']);
        $result = $this->db->update('member', $data);
        return $result;
    }

    function getMemberById($id){
        $result = $this->db->where("id",$id)->get("member");
        return $result->row();
    }

    function delete($id){
        return $this->db->delete('member', array('id' => $id));
    }

    function data_check_create($firstname, $lastname){
        $this->db->where("firstname",$firstname);  // select * from member where firstname = "" and lastname = ""
        $this->db->where("lastname",$lastname);
        $result = $this->db->get("member");
        return $result->row();
    }

    function data_check_update($firstname, $lastname, $id){
        $this->db->where("firstname",$firstname);  // select * from member where firstname = "" and lastname = ""
        $this->db->where("lastname",$lastname);
        $this->db->not_where("id",$id);
        $result = $this->db->get("member");
        return $result->row();
    }

    function getUpdate($id){
        $this->db->select("asdasd,qeqweqwe,reqwewq");
        $this->db->not_where("id",$id);
        $result = $this->db->get("member");
        return $result->row();
    }

}