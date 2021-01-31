<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Partsmapproducts extends CI_Model{

    function allParts_count(){  
        $this->db->select("modelofcar.modelofcarId");
        $this->db->from('modelofcar');
        $this->db->join('parts_product_car', 'modelofcar.modelofcarId = parts_product_car.modelofcarId', 'left');
        $this->db->join('parts_table', 'parts_product_car.parts_table_id = parts_table.parts_table_id', 'left');
        $this->db->join("model", "model.modelId = modelofcar.modelId");
        $this->db->join('brand','brand.brandId = model.brandId');
        $query = $this->db->get();
        return $query->num_rows();                                                                                                                                                                                
    }

    function allParts($limit,$start,$col,$dir){
        $this->db->select("parts_product_car.part_car_id, modelofcar.modelofcarId, brand.brandName, model.modelName, model.yearStart, model.yearEnd, modelofcar.modelofcarName, modelofcar.machineSize, parts_table.parts_table_id, parts_table.parts_table_name, parts_product_car.status")->select("IFNULL(`detail`, '') AS `detail`", false);
        $this->db->from('modelofcar');
        $this->db->join('parts_product_car', 'modelofcar.modelofcarId = parts_product_car.modelofcarId', 'left');
        $this->db->join('parts_table', 'parts_product_car.parts_table_id = parts_table.parts_table_id', 'left');
        $this->db->join("model", "model.modelId = modelofcar.modelId");
        $this->db->join('brand','brand.brandId = model.brandId');
        $query = $this->db->limit($limit,$start)->order_by($col,$dir)->order_by('yearStart','asc')->get();
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
    }

    function allPartsSearch($limit,$start,$brandId,$col,$dir,$modelId){
        $this->db->select("parts_product_car.part_car_id, modelofcar.modelofcarId, brand.brandName, model.modelName, model.yearStart, model.yearEnd, modelofcar.modelofcarName, modelofcar.machineSize, parts_table.parts_table_id, parts_table.parts_table_name, parts_product_car.status")->select("IFNULL(`detail`, '') AS `detail`", false);
        $this->db->from('modelofcar');
        $this->db->join('parts_product_car', 'modelofcar.modelofcarId = parts_product_car.modelofcarId', 'left');
        $this->db->join('parts_table', 'parts_product_car.parts_table_id = parts_table.parts_table_id', 'left');
        $this->db->join("model", "model.modelId = modelofcar.modelId");
        $this->db->join('brand','brand.brandId = model.brandId');

        if(!empty($modelId)){
            $this->db->where("model.modelId", $modelId);
        }

        $query = $this->db->where("brand.brandId", $brandId)
                ->limit($limit,$start)
                ->order_by($col,$dir)->order_by('yearStart','asc')
                ->get();

        if($query->num_rows()>0){
            return $query->result();  
        }else{
            return null;
        }
    }

    function allPartsSearch_count($brandId,$modelId){

        $this->db->select("parts_product_car.part_car_id, modelofcar.modelofcarId, brand.brandName, model.modelName, model.yearStart, model.yearEnd, modelofcar.modelofcarName, modelofcar.machineSize, parts_table.parts_table_id, parts_table.parts_table_name, parts_product_car.status")->select("IFNULL(`detail`, '') AS `detail`", false);
        $this->db->from('modelofcar');
        $this->db->join('parts_product_car', 'modelofcar.modelofcarId = parts_product_car.modelofcarId', 'left');
        $this->db->join('parts_table', 'parts_product_car.parts_table_id = parts_table.parts_table_id', 'left');
        $this->db->join("model", "model.modelId = modelofcar.modelId");
        $this->db->join('brand','brand.brandId = model.brandId');

        if(!empty($brandId)){
            $this->db->where("brand.brandId", $brandId);
        }

        if(!empty($modelId)){
            $this->db->where("model.modelId", $modelId);
        }

        $query = $this->db->get();
        return $query->num_rows();

    }

    function getByModelofcarId($modelofcarId){
        $this->db->where('modelofcarId', $modelofcarId);
        return $this->db->get('parts_product_car')->row();
    }

    function getPartsById($part_car_id){
        $this->db->select("part_car_id");
        $this->db->where('part_car_id', $part_car_id);
        $result = $this->db->get("parts_product_car");
        return $result->row();
    }

    function insert($modelofcarId, $parts_table_id){
        $data = $this->getByModelofcarId($modelofcarId);
        $result = false;
        if(!empty($data)){
            $this->db->where('modelofcarId', $modelofcarId);
            $result = $this->db->update('parts_product_car', [
                'modelofcarId' => $modelofcarId,
                'parts_table_id' => $parts_table_id  
            ]);
        }else{
            $result = $this->db->insert('parts_product_car', [
                'modelofcarId' => $modelofcarId,
                'parts_table_id' => $parts_table_id
            ]);
        }

        return $result;
    }

    function update($data){
        $this->db->where('part_car_id', $data['part_car_id']);
        $result = $this->db->update('parts_product_car', $data);
        return $result;
    }
}