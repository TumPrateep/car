<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Tireproduct extends CI_Model
{

    public function tireDataByTireSize_search($limit, $start, $order, $dir, $tire_sizeId, $tire_brandId = null, $tire_modelId = null, $rimId = null)
    {

        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId,
        tire_brand.tire_brandId,tire_model.tire_modelId,tire_size.tire_sizeId,rim.rimId,tire_data.price');
        $this->db->from('tire_data');
        $this->db->where('`tire_data`.`tire_dataId` IN (SELECT (SELECT `tire_dataId` FROM `tire_data` `rd` WHERE `tire_sizeId` = `re`.`tire_sizeId` AND `tire_brandId` = `re`.`tire_brandId` AND `tire_modelId` = `re`.`tire_modelId`ORDER BY `price` ASC LIMIT 1) as `tire_dataId` FROM `tire_data` `re` GROUP BY `rimId`)', null, false);
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');

        // var_dump(empty($tire_sizeId));
        // exit();
        if (!empty($tire_sizeId)) {
            $this->db->where_in('tire_data.tire_sizeId', $tire_sizeId);
        }

        if ($tire_brandId != null) {
            $this->db->where('tire_brand.tire_brandId', $tire_brandId);
        }

        if ($tire_modelId != null) {
            $this->db->where('tire_model.tire_modelId', $tire_modelId);
        }

        if ($rimId != null) {
            $this->db->where('rim.rimId', $rimId);
        }

        $query = $this->db
            ->limit($limit, $start)
            ->order_by($order, $dir)
            ->get();

        // dd($query);

        return $query->result();

    }

    public function tireDataByTireSize_search_count($tire_sizeId, $tire_brandId = null, $tire_modelId = null, $rimId = null)
    {
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId,
        tire_brand.tire_brandId,tire_model.tire_modelId,tire_size.tire_sizeId,rim.rimId,tire_data.price');
        $this->db->from('tire_data');
        $this->db->where('`tire_data`.`tire_dataId` IN (SELECT (SELECT `tire_dataId` FROM `tire_data` `rd` WHERE `tire_sizeId` = `re`.`tire_sizeId` AND `tire_brandId` = `re`.`tire_brandId` AND `tire_modelId` = `re`.`tire_modelId`ORDER BY `price` ASC LIMIT 1) as `tire_dataId` FROM `tire_data` `re` GROUP BY `rimId`)', null, false);
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');

        if (!empty($tire_sizeId)) {
            $this->db->where_in('tire_data.tire_sizeId', $tire_sizeId);
        }

        if ($tire_brandId != null) {
            $this->db->where('tire_brand.tire_brandId', $tire_brandId);
        }

        if ($tire_modelId != null) {
            $this->db->where('tire_model.tire_modelId', $tire_modelId);
        }

        if ($tire_modelId != null) {
            $this->db->where('tire_model.tire_modelId', $tire_modelId);
        }

        if ($rimId != null) {
            $this->db->where('rim.rimId', $rimId);
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function allTires()
    {
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId,
        tire_brand.tire_brandId,tire_model.tire_modelId,tire_size.tire_sizeId,rim.rimId,tire_data.price');
        $this->db->from('tire_data');
        $this->db->where('`tire_data`.`tire_dataId` IN (SELECT (SELECT `tire_dataId` FROM `tire_data` `rd` WHERE `tire_sizeId` = `re`.`tire_sizeId` AND `tire_brandId` = `re`.`tire_brandId` AND `tire_modelId` = `re`.`tire_modelId`ORDER BY `price` DESC LIMIT 1) as `tire_dataId` FROM `tire_data` `re` GROUP BY `rimId`)', null, false);
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }
    public function allTire_count()
    {
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId,
        tire_brand.tire_brandId,tire_model.tire_modelId,tire_size.tire_sizeId,rim.rimId,tire_data.price');
        $this->db->from('tire_data');
        $this->db->where('`tire_data`.`tire_dataId` IN (SELECT (SELECT `tire_dataId` FROM `tire_data` `rd` WHERE `tire_sizeId` = `re`.`tire_sizeId` AND `tire_brandId` = `re`.`tire_brandId` AND `tire_modelId` = `re`.`tire_modelId`ORDER BY `price` DESC LIMIT 1) as `tire_dataId` FROM `tire_data` `re` GROUP BY `rimId`)', null, false);
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $query = $this->db->get();

        return $query->num_rows();
    }
    public function tireData_search($limit, $start, $order, $dir, $status, $tire_brandId, $tire_modelId, $rimId, $tire_sizeId, $price, $can_change, $warranty_year, $warranty_distance, $brandId, $modelId, $modelofcarId, $yearStart, $yearEnd)
    {
        $price = explode("-", $price);

        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId,
        tire_brand.tire_brandId,tire_model.tire_modelId,tire_size.tire_sizeId,rim.rimId,tire_data.price');
        $this->db->from('tire_data');
        $this->db->where('`tire_data`.`tire_dataId` IN (SELECT (SELECT `tire_dataId` FROM `tire_data` `rd` WHERE `tire_sizeId` = `re`.`tire_sizeId` AND `tire_brandId` = `re`.`tire_brandId` AND `tire_modelId` = `re`.`tire_modelId`ORDER BY `price` DESC LIMIT 1) as `tire_dataId` FROM `tire_data` `re` GROUP BY `rimId`)', null, false);
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $this->db->like('tire_data.tire_sizeId', $tire_sizeId);
        $this->db->like('tire_data.tire_brandId', $tire_brandId);
        $this->db->like('tire_data.tire_modelId', $tire_modelId);
        $this->db->like('tire_data.rimId', $rimId);
        $this->db->like('tire_data.tire_sizeId', $tire_sizeId);

        if ($status != null) {
            // $this->db->where("tire_data.status", $status);
        }
        $query = $this->db
            ->limit($limit, $start)
            ->order_by($order, $dir)
            ->get();

        return $query->result();

    }
    public function TireDatas_search_count($tire_brandId, $tire_modelId, $rimId, $tire_sizeId, $price, $can_change, $warranty_year, $warranty_distance, $status, $brandId, $modelId, $modelofcarId, $yearStart, $yearEnd)
    {
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId,
        tire_brand.tire_brandId,tire_model.tire_modelId,tire_size.tire_sizeId,rim.rimId,tire_data.price');
        $this->db->from('tire_data');
        $this->db->where('`tire_data`.`tire_dataId` IN (SELECT (SELECT `tire_dataId` FROM `tire_data` `rd` WHERE `tire_sizeId` = `re`.`tire_sizeId` AND `tire_brandId` = `re`.`tire_brandId` AND `tire_modelId` = `re`.`tire_modelId`ORDER BY `price` DESC LIMIT 1) as `tire_dataId` FROM `tire_data` `re` GROUP BY `rimId`)', null, false);
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $this->db->like('tire_data.tire_sizeId', $tire_sizeId);
        $this->db->like('tire_data.tire_brandId', $tire_brandId);
        $this->db->like('tire_data.tire_modelId', $tire_modelId);
        $this->db->like('tire_data.rimId', $rimId);
        $this->db->like('tire_data.tire_sizeId', $tire_sizeId);

        if ($status != null) {
            // $this->db->where("tire_data.status", $status);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getTireDataForCartById($tire_dataId)
    {
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId, rim.rimId, tire_model.tire_modelId, tire_size.tire_sizeId');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $this->db->where('tire_data.tire_dataId', $tire_dataId);
        $result = $this->db->get('tire_data');
        return $result->row();

    }

    public function getCostForOrderDetail($caraccessoryId, $productDetail)
    {
        $this->db->where('tire_sizeId', $productDetail['tire_sizeId']);
        $this->db->where('tire_brandId', $productDetail['tire_brandId']);
        $this->db->where('tire_modelId', $productDetail['tire_modelId']);
        $this->db->where('create_by', $caraccessoryId);
        $result = $this->db->get('tire_data');
        return $result->row('price');
    }

}