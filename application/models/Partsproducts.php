<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Partsproducts extends CI_Model{

    function data_check_create($partsName){
        $this->db->from("parts_product");
        $this->db->where("partsName",$partsName);
        $result = $this->db->get();
        return $result->row();
    }

    function data_check_update($partsName,$partId){
        $this->db->from("parts_product");
        $this->db->where("partsName",$partsName);
        $this->db->where_not_in('partId',$partId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('partId',$data['partId']);
        $result = $this->db->update('parts_product', $data);
        return $result;
    }

    function getPartsById($partId){
        $this->db->select("partId");
        $this->db->where('partId',$partId);
        $result = $this->db->get("parts_product");
        return $result->row();
    }

    function insert($data){
        return $this->db->insert('parts_product',$data);
    }

    function delete($partId){
        return $this->db->delete('parts_product', array('partId' => $partId));
    }

    function allParts_count(){  
        $this->db->from('parts_product');
        $query = $this->db->get();
        return $query->num_rows();                                                                                                                                                                                
    }

    function allParts($limit,$start,$col,$dir){
        $this->db->from('parts_product');
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
    }

    function getUpdate($partId){
        $this->db->where('partId',$partId);
        $result = $this->db->get("parts_product")->row();
        return $result;
    }

}