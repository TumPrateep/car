<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Tireproductdata extends CI_Model{

    function allData_count(){
        $this->db->select("tire_product.productId,tire_brand.tire_brandId,tire_brand.tire_brandName,tire_model.tire_modelName,concat(tire_size.tire_size,'/',tire_size.tire_series,'R',rim.rimName) as tire_size,tire_product.status,tire_product.picture");//,tire_series.tire_series
        $this->db->from('tire_product');
        $this->db->join('tire_brand','tire_product.tire_brandId  = tire_brand.tire_brandId');
        $this->db->join('tire_model','tire_product.tire_modelId  = tire_model.tire_modelId');
        $this->db->join('rim','tire_product.rimId  = rim.rimId');
        $this->db->join('tire_size','tire_product.tire_sizeId  = tire_size.tire_sizeId');
        $query = $this->db->get();
        return $query->num_rows();  
    }

    function allData($limit,$start,$order,$dir){
        $this->db->select("tire_product.productId,tire_brand.tire_brandId,tire_brand.tire_brandName,tire_model.tire_modelName,concat(tire_size.tire_size,'/',tire_size.tire_series,'R',rim.rimName) as tire_size,tire_product.status,tire_product.picture");//,tire_series.tire_series
        $this->db->from('tire_product');
        $this->db->join('tire_brand','tire_product.tire_brandId  = tire_brand.tire_brandId');
        $this->db->join('tire_model','tire_product.tire_modelId  = tire_model.tire_modelId');
        $this->db->join('rim','tire_product.rimId  = rim.rimId');
        $this->db->join('tire_size','tire_product.tire_sizeId  = tire_size.tire_sizeId');

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
        $this->db->where('tire_brandId', $tire_brandId);
        $this->db->where('tire_modelId', $tire_modelId);
        $this->db->where('rimId', $rimId);
        $this->db->where('tire_sizeId', $tire_sizeId);
        $query = $query = $this->db->get('tire_product');
        return $query->row();
    }

    function insert($data){
        return $this->db->insert('tire_product',$data);
    }

    function update($data){
        $this->db->where('productId',$data['productId']);
        $result = $this->db->update('tire_product', $data);
        return $result;
    }

    function getProductDataById($productId){
        $query = $this->db->where("productId", $productId)->get("tire_product");
        return $query->row();
    }

    function getUpdate($productId){
        $this->db->select('productId,tire_brandId,tire_modelId,rimId,tire_sizeId,status,picture');
        $this->db->where('productId',$productId);
        $result = $this->db->get("tire_product")->row();
        return $result;
    }

    // function getTireById($productId){
    //     $this->db->select("*");
    //     $this->db->where('productId',$productId);
    //     $result = $this->db->get("tire_product");
    //     return $result->row();
    // }

    function data_check_update($productId,$tire_modelId,$tire_sizeId){
        $this->db->from("tire_product");
        $this->db->where('tire_modelId',$tire_modelId);
        $this->db->where('tire_sizeId',$tire_sizeId);
        $this->db->where_not_in('productId',$productId);
        $result = $this->db->get();
        return $result->row();
    }

    function delete($productId){
        return $this->db->delete('tire_product', array('productId' => $productId));
    }



}