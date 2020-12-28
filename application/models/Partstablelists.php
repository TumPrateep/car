<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Partstablelists extends CI_Model{

    function data_check_create($kilometre){
        $this->db->from("parts_table_list");
        $this->db->where("kilometre",$kilometre);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($kilometre,$parts_table_list_id){
        $this->db->from("parts_table_list");
        $this->db->where("kilometre",$kilometre);
        $this->db->where_not_in('parts_table_list_id',$parts_table_list_id);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('parts_table_list_id',$data['parts_table_list_id']);
        $result = $this->db->update('parts_table_list', $data);
        return $result;
    }

    function getPartsById($parts_table_list_id){
        $this->db->select("parts_table_list_id");
        $this->db->where('parts_table_list_id',$parts_table_list_id);
        $result = $this->db->get("parts_table_list");
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('parts_table_list',$data);
    }

    function delete($parts_table_list_id){
        return $this->db->delete('parts_table_list', array('parts_table_list_id' => $parts_table_list_id));
    }

    function allParts_count(){  
        $this->db->from('parts_table_list');
        $query = $this->db->get();
        return $query->num_rows();                                                                                                                                                                                
    }

    function allParts($limit,$start,$col,$dir){
        $this->db->from('parts_table_list');
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
    }

    function getUpdate($parts_table_list_id){
        $this->db->where('parts_table_list_id',$parts_table_list_id);
        $result = $this->db->get("parts_table_list")->row();
        return $result;
    }

}