<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Tirepictures extends CI_Model
{

    public function allData_count()
    {
        $this->db->select("tire_product_picture.productId,tire_brand.tire_brandId,tire_brand.tire_brandName,tire_model.tire_modelName,tire_product_picture.status,tire_product_picture.picture"); //,tire_series.tire_series
        $this->db->from('tire_product_picture');
        $this->db->join('tire_brand', 'tire_product_picture.tire_brandId  = tire_brand.tire_brandId');
        $this->db->join('tire_model', 'tire_product_picture.tire_modelId  = tire_model.tire_modelId');
        // $this->db->join('rim', 'tire_product.rimId  = rim.rimId');
        // $this->db->join('tire_size', 'tire_product.tire_sizeId  = tire_size.tire_sizeId');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function allData($limit, $start, $order, $dir)
    {
        $this->db->select("tire_product_picture.productId,tire_brand.tire_brandId,tire_brand.tire_brandName,tire_model.tire_modelName,tire_product_picture.status,tire_product_picture.picture"); //,tire_series.tire_series
        $this->db->from('tire_product_picture');
        $this->db->join('tire_brand', 'tire_product_picture.tire_brandId  = tire_brand.tire_brandId');
        $this->db->join('tire_model', 'tire_product_picture.tire_modelId  = tire_model.tire_modelId');
        // $this->db->join('rim', 'tire_product.rimId  = rim.rimId');
        // $this->db->join('tire_size', 'tire_product.tire_sizeId  = tire_size.tire_sizeId');

        $this->db->limit($limit, $start)->order_by($order, $dir);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function data_check_create($tire_modelId)
    {
        $this->db->select('productId');
        // $this->db->where('tire_brandId', $tire_brandId);
        $this->db->where('tire_modelId', $tire_modelId);
        // $this->db->where('rimId', $rimId);
        // $this->db->where('tire_sizeId', $tire_sizeId);
        $query = $query = $this->db->get('tire_product_picture');
        return $query->row();
    }

    public function insert($data)
    {
        return $this->db->insert('tire_product_picture', $data);
    }

    public function update($data)
    {
        $this->db->where('productId', $data['productId']);
        $result = $this->db->update('tire_product_picture', $data);
        return $result;
    }

    public function getProductDataById($productId)
    {
        $query = $this->db->where("productId", $productId)->get("tire_product_picture");
        return $query->row();
    }

    public function getUpdate($productId)
    {
        $this->db->select('productId,tire_brandId,tire_modelId,status,picture');
        $this->db->where('productId', $productId);
        $result = $this->db->get("tire_product_picture")->row();
        return $result;
    }

    // function getTireById($productId){
    //     $this->db->select("*");
    //     $this->db->where('productId',$productId);
    //     $result = $this->db->get("tire_product");
    //     return $result->row();
    // }

    public function data_check_update($productId, $tire_modelId)
    {
        $this->db->from("tire_product_picture");
        $this->db->where('tire_modelId', $tire_modelId);
        // $this->db->where('tire_sizeId', $tire_sizeId);
        $this->db->where_not_in('productId', $productId);
        $result = $this->db->get();
        return $result->row();
    }

    public function delete($productId)
    {
        return $this->db->delete('tire_product_picture', array('productId' => $productId));
    }

}