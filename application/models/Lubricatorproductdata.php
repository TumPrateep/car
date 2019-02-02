<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Lubricatorproductdata extends CI_Model{

    function allData_count(){
        $query = $this->db->get('lubricator_product');
        return $query->num_rows();  
    }

    function allData($limit,$start,$order,$dir){
        $this->db->select("lubricator_brand.lubricator_brandName,lubricator.lubricatorName,lubricator_type.lubricator_typeName");
        $this->db->from('lubricator_product');
        $this->db->join('lubricator_brand','lubricator_product.lubricator_brandId  = lubricator_brand.lubricator_brandId');
        $this->db->join('lubricator','lubricator_product.lubricatorId  = lubricator.lubricatorId');
        $this->db->join('lubricator_type','lubricator_product.lubricator_typeId  = lubricator_type.lubricator_typeId');
     


        $this->db->select('');

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

    function data_check_create($tire_brandId,$tire_modelId,$rimId,$tire_sizeId){
        $this->db->select('productId');
        $this->db->where('lubricator_brandId', $lubricator_brandId);
        $this->db->where('lubricatorId', $lubricatorId);
        $this->db->where('lubricator_typeId', $lubricator_typeId);
        $query = $query = $this->db->get('lubricator_product');
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

    function getProductDataById($productId){
        $query = $this->db->where("productId", $productId)->get("lubricator_product");
        return $query->row();
    }

    function getAllLubricator($lubricator_brandId){
        $this->db->select("lubricator.lubricatorId,lubricator.lubricatorName,lubricator.capacity, lubricator_number.lubricator_number");
        $this->db->from("lubricator");
        $this->db->join("lubricator_number", "lubricator_number.lubricator_numberId = lubricator.lubricator_numberId");
        $this->db->where("lubricator.lubricator_brandId", $lubricator_brandId);
        $this->db->where('lubricator.status','1');
        // $this->db->where("lubricator_number.lubricator_gear", $lubricator_gear);
        $this->db->order_by("lubricator.lubricatorName","ASC");
        $query = $this->db->get();
        return $query->result();
    }
}