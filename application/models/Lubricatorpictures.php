<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Lubricatorpictures extends CI_Model
{

    public function allData_count()
    {
        // $this->db->select("tire_product_picture.productId,tire_brand.tire_brandId,tire_brand.tire_brandName,tire_model.tire_modelName,tire_product_picture.status,tire_product_picture.picture"); //,tire_series.tire_series
        $this->db->from('lubricator_product_picture');
        // $this->db->join('tire_brand', 'tire_product_picture.tire_brandId  = tire_brand.tire_brandId');
        // $this->db->join('tire_model', 'tire_product_picture.tire_modelId  = tire_model.tire_modelId');
        // $this->db->join('rim', 'tire_product.rimId  = rim.rimId');
        // $this->db->join('tire_size', 'tire_product.tire_sizeId  = tire_size.tire_sizeId');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function allData($limit, $start, $order, $dir)
    {
        $this->db->select('lubricator_product_picture.productId, lubricator_product_picture.status, lubricator_product_picture.picture, lubricator_brand.lubricator_brandName, lubricator.lubricatorName,lubricator_capacity.capacity, lubricator_number.lubricator_number,lubricator_api.api, machine.machine_type');
        $this->db->from('lubricator_product_picture');
        $this->db->join('lubricator', 'lubricator_product_picture.lubricator_id  = lubricator.lubricatorId');
        $this->db->join('lubricator_brand', 'lubricator.lubricator_brandId  = lubricator_brand.lubricator_brandId');
        $this->db->join('lubricator_number', 'lubricator.lubricator_numberId  = lubricator_number.lubricator_numberId');
        $this->db->join('lubricator_api', 'lubricator.api_id  = lubricator_api.apiId', 'left');
        $this->db->join('lubricator_capacity', 'lubricator.capacity_id  = lubricator_capacity.capacity_id', 'left');
        $this->db->join('machine', 'lubricator.machine_id  = machine.machineId');


        $this->db->limit($limit, $start)->order_by($order, $dir);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function data_check_create($lubricatorId)
    {
        $this->db->select('productId');
        // $this->db->where('tire_brandId', $tire_brandId);
        $this->db->where('lubricator_id', $lubricatorId);
        // $this->db->where('rimId', $rimId);
        // $this->db->where('tire_sizeId', $tire_sizeId);
        $query = $query = $this->db->get('lubricator_product_picture');
        return $query->row();
    }

    public function insert($data)
    {
        return $this->db->insert('lubricator_product_picture', $data);
    }

    public function update($data)
    {
        $this->db->where('productId', $data['productId']);
        $result = $this->db->update('lubricator_product_picture', $data);
        return $result;
    }

    public function getProductDataById($productId)
    {
        $query = $this->db->where("productId", $productId)->get("lubricator_product_picture");
        return $query->row();
    }

    public function getUpdate($productId)
    {
        // $this->db->select('productId,tire_brandId,tire_modelId,status,picture');
        $this->db->from('lubricator_product_picture');
        $this->db->join('lubricator', 'lubricator_product_picture.lubricator_id  = lubricator.lubricatorId');
        $this->db->where('lubricator_product_picture.productId', $productId);
        $result = $this->db->get()->row();
        return $result;
    }

    // // function getTireById($productId){
    // //     $this->db->select("*");
    // //     $this->db->where('productId',$productId);
    // //     $result = $this->db->get("tire_product");
    // //     return $result->row();
    // // }

    public function data_check_update($productId, $lubricator_id)
    {
        $this->db->from("lubricator_product_picture");
        $this->db->where('lubricator_id', $lubricator_id);
        $this->db->where_not_in('productId', $productId);
        $result = $this->db->get();
        return $result->row();
    }

    public function delete($productId)
    {
        return $this->db->delete('lubricator_product_picture', array('productId' => $productId));
    }

}