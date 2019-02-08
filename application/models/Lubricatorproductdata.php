<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorproductdata extends CI_Model{

    function allData_count(){
        $query = $this->db->get('lubricator_product');
        return $query->num_rows();  
    }

    function allData($limit,$start,$order,$dir){
        $this->db->select("lubricator_product.productId, lubricator_brand.lubricator_brandName, lubricator.lubricatorName, lubricator_product.picture, lubricator_number.lubricator_number, lubricator_number.lubricator_gear, lubricator_product.status, lubricator.capacity, lubricatortypeformachine.lubricatortypeFormachine");
        $this->db->from('lubricator_product');
        $this->db->join('lubricator','lubricator_product.lubricatorId  = lubricator.lubricatorId');
        $this->db->join('lubricator_brand','lubricator.lubricator_brandId  = lubricator_brand.lubricator_brandId');
        $this->db->join('lubricator_number','lubricator.lubricator_numberId  = lubricator_number.lubricator_numberId');
        $this->db->join("lubricatortypeformachine", "lubricatortypeformachine.lubricatortypeFormachineId = lubricator.lubricatortypeFormachineId");

        $this->db->limit($limit,$start)->order_by($order,$dir);
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }

    function data_check_create($lubricatorId){
        $this->db->select('productId');
        $this->db->from("lubricator_product");
        // $this->join("lubricator", "lubricator_product.lubricatorId = lubricator.lubricatorId");
        $this->db->where('lubricatorId', $lubricatorId);
        // $this->db->where('lubricatorId', $lubricatorId);
        // $this->db->where('lubricator_typeId', $lubricator_typeId);
        $query = $query = $this->db->get();
        return $query->row();
    }

    function data_check_update($productId, $lubricatorId){
        $this->db->select('productId');
        $this->db->from("lubricator_product");
        $this->db->where('lubricatorId', $lubricatorId);
        $this->db->where_not_in('productId', $productId);
        $query = $query = $this->db->get();
        return $query->row();
    }

    function insert($data){
        return $this->db->insert('lubricator_product',$data);
    }

    function update($data){
        $this->db->where('productId',$data['productId']);
        $result = $this->db->update('lubricator_product', $data);
        return $result;
    }

    function getUpdate($productId){
        $this->db->select('lubricator_product.productId, lubricator_number.lubricator_gear, lubricator.lubricatorId, lubricator_product.picture, lubricator.lubricator_brandId, lubricator.lubricatorId');
        $this->db->join('lubricator', 'lubricator.lubricatorId = lubricator_product.lubricatorId');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId = lubricator_number.lubricator_numberId');
        $this->db->where('lubricator_product.productId',$productId);
        $result = $this->db->get("lubricator_product")->row();
        return $result;
    }

    function delete($productId){
        return $this->db->delete('lubricator_product', array('productId' => $productId));
    }

    function getProductDataById($productId){
        $query = $this->db->where("productId", $productId)->get("lubricator_product");
        return $query->row();
    }

    function getAllLubricator($lubricator_brandId, $lubricator_gear){
        $this->db->select("lubricator.lubricatorId,lubricator.lubricatorName,lubricator.capacity, lubricator_number.lubricator_number, lubricatortypeformachine.lubricatortypeFormachine");
        $this->db->from("lubricator");
        $this->db->join("lubricator_number", "lubricator_number.lubricator_numberId = lubricator.lubricator_numberId");
        $this->db->join("lubricatortypeformachine", "lubricatortypeformachine.lubricatortypeFormachineId = lubricator.lubricatortypeFormachineId");
        $this->db->where("lubricator.lubricator_brandId", $lubricator_brandId);
        $this->db->where("lubricator_number.lubricator_gear", $lubricator_gear);
        $this->db->where('lubricator.status','1');
        // $this->db->where("lubricator_number.lubricator_gear", $lubricator_gear);
        $this->db->order_by("lubricator.lubricatorName","ASC");
        $query = $this->db->get();
        return $query->result();
    }
}