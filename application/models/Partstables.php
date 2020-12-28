<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Partstables extends CI_Model{

    function data_check_create($parts_table_name){
        $this->db->from("parts_table");
        $this->db->where("parts_table_name",$parts_table_name);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($parts_table_name,$parts_table_id){
        $this->db->from("parts_table");
        $this->db->where("parts_table_name",$parts_table_name);
        $this->db->where_not_in('parts_table_id',$parts_table_id);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('parts_table_id',$data['parts_table_id']);
        $result = $this->db->update('parts_table', $data);
        return $result;
    }

    function getPartsById($parts_table_id){
        $this->db->select("parts_table_id");
        $this->db->where('parts_table_id',$parts_table_id);
        $result = $this->db->get("parts_table");
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('parts_table',$data);
    }

    function delete($parts_table_id){
        return $this->db->delete('parts_table', array('parts_table_id' => $parts_table_id));
    }

    function allParts_count(){  
        $this->db->from('parts_table');
        $query = $this->db->get();
        return $query->num_rows();                                                                                                                                                                                
    }

    function allParts($limit,$start,$col,$dir){
        $this->db->from('parts_table');
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
    }

    function getUpdate($parts_table_id){
        $this->db->where('parts_table_id',$parts_table_id);
        $result = $this->db->get("parts_table")->row();
        return $result;
    }

}