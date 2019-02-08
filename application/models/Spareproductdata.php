<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Spareproductdata extends CI_Model{

    function delete($productId){
        return $this->db->delete('spare_product', array('productId' => $productId));
    }

    function allData_count(){
        $query = $this->db->get('spare_product');
        return $query->num_rows();  
    }

    function allData($limit,$start,$order,$dir){

        $this->db->select("spare_product.productId,spares_undercarriage.spares_undercarriageName, spares_brand.spares_brandName, concat(brand.brandName,' ',model.modelName ) name ,model.yearStart,model.yearEnd,modelofcar.machineSize,modelofcar.modelofcarName, spare_product.status, spare_product.picture");
        $this->db->from('spare_product');
        $this->db->join('spares_undercarriage','spare_product.spares_undercarriageId  = spares_undercarriage.spares_undercarriageId');
        $this->db->join('spares_brand','spare_product.spares_brandId = spares_brand.spares_brandId');
        $this->db->join('brand','spare_product.brandId = brand.brandId');
        $this->db->join('model','spare_product.modelId = model.modelId');
        $this->db->join('modelofcar','spare_product.modelofcarId = modelofcar.modelofcarId');

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

    function data_check_create($spares_undercarriageId,$spares_brandId,$brandId,$modelId,$modelofcarId){
        $this->db->select('productId');
        $this->db->where('spares_undercarriageId', $spares_undercarriageId);
        $this->db->where('spares_brandId', $spares_brandId);
        $this->db->where('brandId', $brandId);
        $this->db->where('modelId', $modelId);
        $this->db->where('modelofcarId', $modelofcarId);
        $query = $query = $this->db->get('spare_product');
        return $query->row();
    }

    function insert($data){
        return $this->db->insert('spare_product',$data);
    }

    function update($data){
        $this->db->where('productId',$data['productId']);
        $result = $this->db->update('spare_product', $data);
        return $result;
    }

    function getProductDataById($productId){
        $query = $this->db->where("productId", $productId)->get("spare_product");
        return $query->row();
    }


    function getSpareById($productId){
        $this->db->where('productId',$productId);
        $result = $this->db->get("spare_product");
        return $result->row();
    }

    function getUpdate($productId){
        $this->db->select('productId,spares_undercarriageId,spares_brandId,brandId,modelId,modelofcarId,status,picture');
        $this->db->where('productId',$productId);
        $result = $this->db->get("spare_product")->row();
        return $result;
    }

    function data_check_update($productId,$spares_undercarriageId){
        $this->db->from("spare_product");
        $this->db->where('spares_undercarriageId',$spares_undercarriageId);
        $this->db->where_not_in('productId',$productId);
        $result = $this->db->get();
        return $result->row();
    }

}