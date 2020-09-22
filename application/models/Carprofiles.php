<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Carprofiles extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }
    public function insert($data)
    {
        return $this->db->insert('car_profile', $data);
    }

    public function allprofile_count($userId)
    {
        $this->db->where("userId", $userId);
        $query = $this
            ->db
            ->get('car_profile');

        return $query->num_rows();
    }

    public function allprofile($limit, $start, $col, $dir, $userId)
    {
        $this->db->join("brand", "brand.brandId = car_profile.brandId", 'left');
        $this->db->join("provinceforcar", "provinceforcar.provinceforcarId = car_profile.province_plate");
        $this->db->where("userId", $userId);
        $query = $this->db
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('car_profile');

        // ->where('car_profile.status', 1);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function carprofile_search_count($search, $userId)
    {
        // $this->db->select("concat(character_plate,' ',number_plate) as plate, car_profile.*, provinceforcar.*");
        $this->db->from("car_profile");
        $this->db->join("provinceforcar", "provinceforcar.provinceforcarId = car_profile.province_plate");
        $this->db->where("car_profile.userId", $userId);
        $this->db->like("concat(character_plate,' ',number_plate)", $search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function profileSearch($limit, $start, $order, $dir, $search, $userId)
    {
        // $this->db->select("concat(character_plate,' ',number_plate) as plate, car_profile.*, provinceforcar.*");
        $this->db->from("car_profile");
        $this->db->join("provinceforcar", "provinceforcar.provinceforcarId = car_profile.province_plate");
        $this->db->where("car_profile.userId", $userId);
        $this->db->like("concat(character_plate,' ',number_plate)", $search);
        $query = $this->db->limit($limit, $start)
            ->order_by($order, $dir)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function getCarProfileByUserId($userId, $car_profileId)
    {
        $this->db->select('car_profile.car_profileId, concat(car_profile.character_plate, " ", car_profile.number_plate, " ", provinceforcar.provinceforcarName) as plate');
        $this->db->from('car_profile');
        $this->db->join('provinceforcar', 'car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->where("userId", $userId);
        $this->db->where("car_profileId", $car_profileId);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCarDeleteById($car_profileId)
    {
        return $this->db->where('car_profileId', $car_profileId)->get("car_profile")->row();
    }

    public function getCarProfileByUserIdAndCarprofileId($userId, $car_profileId)
    {
        $this->db->select('car_profile.car_profileId,car_profile.number_plate,car_profile.character_plate,car_profile.province_plate,car_profile.mileage,car_profile.color,car_profile.pictureFront,car_profile.pictureBack,car_profile.circlePlate,car_profile.brandId,car_profile.modelId,car_profile.modelofcarId,car_profile.year,brand.brandName,model.modelName as detail,model.yearStart,model.yearEnd, model.modelName, brand.brandPicture,provinceforcar.provinceforcarName');
        $this->db->from('car_profile');
        $this->db->join('brand', 'car_profile.brandId = brand.brandId', 'left');
        $this->db->join('model', 'car_profile.modelId = model.modelId', 'left');
        $this->db->join('provinceforcar', 'car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->where("car_profile.userId", $userId);
        $this->db->where("car_profile.car_profileId", $car_profileId);
        $query = $this->db->get();
        return $query->row();
    }

    public function data_check_create($character_plate, $number_plate, $province_plate, $userId)
    {
        $this->db->select("car_profileId");
        $this->db->from("car_profile");
        $this->db->where('character_plate', $character_plate);
        $this->db->where('number_plate', $number_plate);
        $this->db->where('province_plate', $province_plate);
        $this->db->where('userId', $userId);
        $result = $this->db->get();
        return $result->row();

    }

    public function getAllCarProfile()
    {
        $this->db->select('car_profile.car_profileId, car_profile.character_plate, car_profile.number_plate, car_profile.province_plate, car_profile.pictureFront, provinceforcar.provinceforcarName');
        $this->db->from("car_profile");
        $this->db->join("provinceforcar", "provinceforcar.provinceforcarId = car_profile.province_plate");
        $this->db->where('car_profile.status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function data_check_update($character_plate, $number_plate, $province_plate, $userId, $car_profileId)
    {
        $this->db->select("car_profileId");
        $this->db->from("car_profile");
        $this->db->where('character_plate', $character_plate);
        $this->db->where('number_plate', $number_plate);
        $this->db->where('province_plate', $province_plate);
        $this->db->where('userId', $userId);
        $this->db->where_not_in('car_profileId', $car_profileId);
        $result = $this->db->get();
        return $result->row();
    }

    public function update($data)
    {
        $this->db->where('car_profileId', $data['car_profileId']);
        $result = $this->db->update('car_profile', $data);
        return $result;
    }

    public function carprofile_search($limit, $start, $col, $dir, $character_plate, $number_plate, $province_plate)
    {
        $this->db->like('character_plate', $character_plate);
        $this->db->like('number_plate', $number_plate);
        $this->db->like('province_plate', $province_plate);
        // if($skill != null){
        //     $this->db->where("skill", $skill);
        // }
        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('car_profile');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function getBrandCar()
    {
        $this->db->select('brandId,brandName');
        $this->db->from('brand');
        $this->db->where('status', 1);
        $this->db->order_by("brandName", "asc");
        $result = $this->db->get();
        return $result->result();

    }

    public function getModelCar($brandId)
    {
        $this->db->select('modelId, modelName, yearStart, yearEnd');
        $this->db->from('model');
        $this->db->where('brandId', $brandId);
        $this->db->where('status', 1);
        $this->db->order_by("modelName", "asc");
        $result = $this->db->get();
        return $result->result();

    }

    public function getModelofCar($modelId)
    {
        $this->db->select("modelofcarId, modelofcarName, machineCode, machineSize");
        $this->db->from('modelofcar');
        $this->db->where('modelId', $modelId);
        $this->db->where('status', 1);
        $this->db->order_by("modelofcarName", "asc");
        $result = $this->db->get();
        return $result->result();

    }

    public function getAllCarProfileByUserId($userId)
    {
        $this->db->select('car_profile.car_profileId,car_profile.number_plate,car_profile.character_plate,car_profile.province_plate,car_profile.mileage,car_profile.color,car_profile.pictureFront,car_profile.brandId,car_profile.modelId,car_profile.modelofcarId,brand.brandName,model.modelName as detail, provinceforcar.provinceforcarName');
        $this->db->from('car_profile');
        $this->db->join('brand', 'car_profile.brandId = brand.brandId', 'left');
        $this->db->join('model', 'car_profile.modelId = model.modelId', 'left');
        $this->db->join('modelofcar', 'car_profile.modelofcarId = modelofcar.modelofcarId', 'left');
        $this->db->join('provinceforcar', 'car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->where("userId", $userId);
        $query = $this->db->get();
        return $query->result();
    }

    public function delete($car_profileId)
    {
        return $this->db->delete('car_profile', array('car_profileId' => $car_profileId));
    }

    public function getTireSize($brandId, $modelName, $year)
    {
        $this->db->from('tire_matching');
        $this->db->join('model', 'tire_matching.modelId = model.modelId');

        if (!empty($brandId)) {
            $this->db->where('model.brandId', $brandId);
        }

        if (!empty($modelName)) {
            $this->db->where('model.modelName', $modelName);
        }


        if (!empty($year)) {
            $this->db->group_start();
            $this->db->group_start();
            $this->db->where('model.yearStart <=', $year)
                ->where('model.yearEnd >=', $year);
            $this->db->group_end();
            $this->db->or_where('model.yearStart', $year);
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getTiresizeOrder($car_profileId)
    {
        $this->db->from('order');
        $this->db->join('orderdetail', 'order.orderId = orderdetail.orderId');
        $this->db->where('order.car_profileId', $car_profileId);
        $this->db->where('orderdetail.group', 'tire');
        $this->db->order_by('order.orderId', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function getTireDataById($tire_dataId)
    {
        $this->db->select('tire_data.tire_dataId as productId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId, tire_data.tire_picture as picture, tire_model.tire_modelId,tire_size.tire_sizeId, tire_data.price, tire_data.car_accessoriesId');
        $this->db->join('tire_brand', 'tire_brand.tire_brandId = tire_data.tire_brandId');
        $this->db->join('tire_model', 'tire_model.tire_modelId = tire_data.tire_modelId');
        $this->db->join('tire_size', 'tire_size.tire_sizeId = tire_data.tire_sizeId');
        $this->db->join('rim', 'rim.rimId = tire_data.rimId');
        $this->db->where('tire_data.tire_dataId', $tire_dataId);
        $result = $this->db->get('tire_data');
        return $result->row();
    }

    public function getTireDataForCarprofile($car_profileId)
    {
        $car_profile = $this->getCarDeleteById($car_profileId);
        if(!empty($car_profile)){
            $orderData = $this->getTiresizeOrder($car_profileId);
            $result = null;
            if(!empty($orderData)){
                $result = $this->getTireDataById($orderData->productId);
                if(!empty($result)){
                    $option = [
                        'tire_brandId' => $result->tire_brandId,
                        'tire_modelId' => $result->tire_modelId,
                        'tire_sizeId' => $result->tire_sizeId,
                        'rimId' => $result->rimId,
                    ];
    
                    $result->picture = getPictureTire($option);
                }
            }
            return $result;
        }else{
            return null;
        }
    }

    public function getCarProfileByCarprofileId($car_profileId)
    {
        $this->db->select('car_profile.car_profileId,car_profile.number_plate,car_profile.character_plate,car_profile.province_plate,car_profile.mileage,car_profile.color,car_profile.pictureFront,car_profile.pictureBack,car_profile.circlePlate,car_profile.brandId,car_profile.modelId,car_profile.modelofcarId,car_profile.year,brand.brandName,model.modelName as detail,model.yearStart,model.yearEnd, model.modelName, brand.brandPicture,provinceforcar.provinceforcarName');
        $this->db->from('car_profile');
        $this->db->join('brand', 'car_profile.brandId = brand.brandId');
        $this->db->join('model', 'car_profile.modelId = model.modelId');
        $this->db->join('provinceforcar', 'car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->where("car_profile.car_profileId", $car_profileId);
        $query = $this->db->get();
        return $query->row();
    }

    function getTireMatchingByCarprofile($car_profileId){
        $car_profile = $this->getCarProfileByCarprofileId($car_profileId);
        if(!empty($car_profile)){
            $tire_sizeData = $this->getTireSize($car_profile->brandId, $car_profile->modelName, $car_profile->year);
            $tire_sizeId = [];
            foreach ($tire_sizeData as $i => $v) {
                $tire_sizeId[] = $v->tire_sizeId;
            }
            return $tire_sizeId;
        }else{
            return [];
        }
    }

    public function getAllTireSizeByTireSizeId($arrTireSizeId)
    {
        $this->db->select('tire_sizeId,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size');
        $this->db->join('rim', 'tire_size.rimId = rim.rimId');
        if (!empty($arrTireSizeId)) {
            $this->db->where_in('tire_size.tire_sizeId', $arrTireSizeId);
        } else {
            $this->db->where('tire_size.tire_sizeId is null', null, false);
        }
        $this->db->order_by('tire_size', 'asc');
        $query = $this->db->get("tire_size");
        return $query->result();
    }

    public function getTireMatching($car_profileId)
    {
        $match_array = $this->getTireMatchingByCarprofile($car_profileId);
        if(!empty($match_array)){
            return $this->getAllTireSizeByTireSizeId($match_array);
        }else{
            return [];
        }
    }

    public function getTireDataForMatching($limit, $start, $order, $dir, $tire_sizeId, $tire_brandId=null)
    {
        $this->db->select('tire_data.tire_dataId,tire_brand.tire_brandName,tire_model.tire_modelName,rim.rimName,concat(tire_size.tire_size,"/",tire_size.tire_series,"R",rim.rimName) as tire_size,tire_data.status,tire_data.warranty_year,tire_data.warranty_distance,tire_data.can_change,tire_data.activeFlag,tire_data.create_by, tire_data.warranty, tire_data.tire_picture, tire_brand.tire_brandPicture, tire_brand.tire_brandId,rim.rimId,
        tire_brand.tire_brandId,tire_model.tire_modelId,tire_size.tire_sizeId,rim.rimId,tire_data.price');
        $this->db->from('tire_data');
        $this->db->where('`tire_data`.`tire_dataId` IN (SELECT (SELECT `tire_dataId` FROM `tire_data` `rd` WHERE `tire_sizeId` = `re`.`tire_sizeId` AND `tire_brandId` = `re`.`tire_brandId` AND `tire_modelId` = `re`.`tire_modelId`ORDER BY `price` DESC LIMIT 1) as `tire_dataId` FROM `tire_data` `re` GROUP BY `rimId`)', null, false);
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

        $query = $this->db
            ->limit($limit, $start)
            ->order_by($order, $dir)
            ->get();

        return $query->result();
    }
}