<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Tiredatas extends CI_Model
{

    public function checkstatus($tire_dataId, $userId)
    {
        $this->db->from('tire_data');
        $this->db->where('tire_dataId', $tire_dataId);
        $this->db->where('create_by', $userId);
        $this->db->where('status', 2);
        $this->db->where('activeFlag', 2);
        $result = $this->db->count_all_results();
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    public function delete($tire_dataId)
    {
        return $this->db->delete('tire_data', array('tire_dataId' => $tire_dataId));
    }
    public function data_check_create($tire_brandId, $tire_modelId, $tire_sizeId, $rimId, $car_accessoriesId)
    {
        // $this->db->select('tire_data.tire_brandId');
        $this->db->from('tire_data');
        // $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        // $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        // $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        // $this->db->join('rim','rim.rimId = tire_data.rimId');
        // $this->db->join('car_accessories','car_accessories.car_accessoriesId = tire_data.car_accessoriesId');
        $this->db->where('tire_data.tire_brandId', $tire_brandId);
        $this->db->where('tire_data.tire_modelId', $tire_modelId);
        $this->db->where('tire_data.tire_sizeId', $tire_sizeId);
        $this->db->where('tire_data.rimId', $rimId);
        $this->db->where('tire_data.car_accessoriesId', $car_accessoriesId);
        $result = $this->db->get();
        return $result->row();
    }
    public function insert($data)
    {
        $this->db->trans_begin();
        foreach ($data["tire_sizeId"] as $key => $tireSizeId) {
            // foreach ($data["modelofcarId"] as $val) {
            $tiredata = $data["model"];
            // $modelOfCarData = $this->db->where("modelofcarId",$val)->get("modelofcar")->row();
            // $spareData["modelId"] = $modelOfCarData->modelId;
            // $spareData["modelofcarId"] = $val;
            // $spareData["machineSize"] = $modelOfCarData->machineSize;
            $tiredata["tire_sizeId"] = $tireSizeId;
            $tiredata["price"] = $data["price"][$key];
            $tiredata["warranty"] = $data["warranty"][$key];
            $tiredata["warranty_year"] = $data["warranty_year"][$key];
            $tiredata["warranty_distance"] = $data["warranty_distance"][$key];

            $isTrue = $this->data_check_create($tiredata['tire_brandId'], $tiredata['tire_modelId'], $tireSizeId, $tiredata['rimId'], $tiredata['car_accessoriesId']);
            if (!$isTrue) {
                $this->db->insert('tire_data', $tiredata);
            }
            // }
        }
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function data_check_update($tire_brandId, $tire_modelId, $tire_sizeId, $rimId, $car_accessoriesId, $tire_dataId)
    {
        // $this->db->select('tire_data.tire_brandId,tire_data.tire_modelId,tire_data.rimId,tire_data.car_accessoriesId,concat(tire_size.tire_size,"/",tire_size.tire_series,tire_size.rim) as tire_size');
        $this->db->from('tire_data');
        // $this->db->join('tire_brand','tire_brand.tire_brandId = tire_data.tire_brandId');
        // $this->db->join('tire_model','tire_model.tire_modelId = tire_data.tire_modelId');
        // $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        // $this->db->join('rim','rim.rimId = tire_data.rimId');
        // $this->db->join('car_accessories','car_accessoriesId.car_accessoriesId = tire_data.car_accessoriesId');
        $this->db->where('tire_data.tire_brandId', $tire_brandId);
        $this->db->where('tire_data.tire_modelId', $tire_modelId);
        $this->db->where('tire_data.tire_sizeId', $tire_sizeId);
        $this->db->where('tire_data.rimId', $rimId);
        $this->db->where('tire_data.car_accessoriesId', $car_accessoriesId);
        $this->db->where_not_in('tire_data.tire_dataId', $tire_dataId);
        $result = $this->db->get();
        return $result->row();
    }

    public function update($data)
    {
        $this->db->where('tire_dataId', $data["tire_dataId"]);
        return $this->db->update('tire_data', $data);
    }

    public function getUpdate($tire_dataId)
    {
        // $this->db->select('tire_data.tire_brandId,tire_data.tire_modelId,tire_data.rimId,tire_data.car_accessoriesId');
        $this->db->where('tire_dataId', $tire_dataId);
        $result = $this->db->get('tire_data')->row();
        return $result;
    }
    public function allTire_count($userId)
    {
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $this->db->where('car_accessoriesId', $userId);
        $query = $this
            ->db
            ->get('tire_data');

        return $query->num_rows();
    }
    public function allTires($limit, $start, $col, $dir, $userId)
    {
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture,tire_brand.tire_brandId,tire_model.tire_modelId, tire_size.tire_sizeId, rim.rimId');
        $this->db->from('tire_data');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $this->db->where('tire_data.car_accessoriesId', $userId);
        $query = $this->db->limit($limit, $start)->order_by($col, $dir)->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }
    public function tireData_search($limit, $start, $col, $dir, $tire_brandId, $tire_modelId, $tire_size, $userId)
    {

        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture,tire_brand.tire_brandId,tire_model.tire_modelId, tire_size.tire_sizeId, rim.rimId,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size');
        $this->db->from('tire_data');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');

        if (!empty($tire_brandId)) {
            $this->db->where('tire_data.tire_brandId', $tire_brandId);
        }

        if (!empty($tire_modelId)) {
            $this->db->where('tire_data.tire_modelId', $tire_modelId);
        }

        if (!empty($tire_size)) {
            $this->db->like('concat(tire_size.tire_size, "/", `tire_size`.`tire_series`, "R", rim.rimName)', $tire_size);
        }

        $this->db->where('tire_data.car_accessoriesId', $userId);

        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    public function TireDatas_search_count($tire_brandId, $tire_modelId, $tire_size, $userId)
    {
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture,tire_brand.tire_brandId,tire_model.tire_modelId, tire_size.tire_sizeId, rim.rimId,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size');
        $this->db->from('tire_data');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');

        if (!empty($tire_brandId)) {
            $this->db->where('tire_data.tire_brandId', $tire_brandId);
        }

        if (!empty($tire_modelId)) {
            $this->db->where('tire_data.tire_modelId', $tire_modelId);
        }

        if (!empty($tire_size)) {
            $this->db->like('concat(tire_size.tire_size, "/", `tire_size`.`tire_series`, "R", rim.rimName)', $tire_size);
        }

        $this->db->where('tire_data.car_accessoriesId', $userId);

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getTireDatasbyId($tire_dataId)
    {
        return $this->db->where('tire_dataId', $tire_dataId)->get("tire_data")->row();
    }

    public function getTireDataForCartByIdArray($tire_dataIdArray)
    {
        if ($tire_dataIdArray == null) {
            return null;
        }
        $this->db->select('tire_data.rimId,tire_data.tire_sizeId,tire_data.tire_brandId,tire_data.tire_modelId,tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.price,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $this->db->where_in('tire_data.tire_dataId', $tire_dataIdArray);
        $result = $this->db->get('tire_data');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return null;
        }
    }

    public function getTireObjectForOrderByIdArray($tire_dataId, $orderId = null, $group)
    {
        $this->db->select('tire_data.tire_dataId as productId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId, orderdetail.quantity, tire_data.tire_picture as picture, tire_model.tire_modelId,tire_size.tire_sizeId, orderdetail.price_per_unit, orderdetail.product_price, orderdetail.charge_price, orderdetail.delivery_price, orderdetail.garage_service_price, car_accessories.car_accessoriesId, car_accessories.car_accessoriesName, orderdetail.group');
        $this->db->join('orderdetail', 'orderdetail.productId = tire_data.tire_dataId');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $this->db->join('car_accessories', 'car_accessories.userId = orderdetail.car_accessoriesId');
        $this->db->where('tire_data.tire_dataId', $tire_dataId);
        $this->db->where('orderdetail.group', $group);
        if ($orderId != null) {
            $this->db->where_in("orderdetail.orderId", $orderId);
        }
        $result = $this->db->get('tire_data');
        return $result->row();
    }

    public function getTireDataForOrderByIdArray($tire_dataIdArray, $orderId = null, $group)
    {
        if ($tire_dataIdArray == null) {
            return null;
        }
        $this->db->select('tire_data.tire_dataId as productId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId, orderdetail.quantity, tire_data.tire_picture as picture, tire_model.tire_modelId,tire_size.tire_sizeId, orderdetail.price_per_unit, orderdetail.product_price, orderdetail.min_product_price, orderdetail.charge_price, orderdetail.delivery_price, orderdetail.garage_service_price, car_accessories.car_accessoriesId, car_accessories.car_accessoriesName, orderdetail.group');
        $this->db->join('orderdetail', 'orderdetail.productId = tire_data.tire_dataId');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $this->db->join('car_accessories', 'car_accessories.userId = orderdetail.car_accessoriesId');
        $this->db->where_in('tire_data.tire_dataId', $tire_dataIdArray);
        $this->db->where('orderdetail.group', $group);
        if ($orderId != null) {
            $this->db->where_in("orderdetail.orderId", $orderId);
        }
        $result = $this->db->get('tire_data');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return null;
        }
    }

    public function getTireDataById($tire_dataId)
    {

        $this->db->select('tire_data.tire_dataId as productId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId, tire_data.tire_picture as picture, tire_model.tire_modelId,tire_size.tire_sizeId, tire_data.price, tire_data.car_accessoriesId');
        // $this->db->join('orderdetail','orderdetail.productId = tire_data.tire_dataId');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $this->db->where('tire_data.tire_dataId', $tire_dataId);
        // $this->db->where('orderdetail.group', $group);
        // if($orderId != null){
        //     $this->db->where_in("orderdetail.orderId", $orderId);
        // }
        $result = $this->db->get('tire_data');
        return $result->row();
    }

    public function getMinTireDataById($tire_dataId){
        $tiredata = $this->getTireDataById($tire_dataId);
        $this->db->where('tire_data.tire_modelId', $tiredata->tire_modelId);
        $this->db->where('tire_data.tire_sizeId', $tiredata->tire_sizeId);
        $this->db->order_by('tire_data.price', 'asc');
        $result = $this->db->get('tire_data');
        return $result->row();
    }

}