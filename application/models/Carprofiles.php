<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Carprofiles extends CI_Model {

	function __construct() {
        parent::__construct(); 
        
    }
    function insert($data){
		return $this->db->insert('car_profile', $data);
    }

    function allprofile_count($userId)
    {   
        $this->db->where("userId", $userId);
        $query = $this
                ->db
                ->get('car_profile');
    
        return $query->num_rows();  
    }

    function allprofile($limit,$start,$col,$dir,$userId)
    {   
        $this->db->join("provinceforcar","provinceforcar.provinceforcarId = car_profile.province_plate");
        $this->db->where("userId", $userId);
        $query = $this->db
            ->limit($limit,$start)
            ->order_by($col,$dir)
            ->get('car_profile');
            
            // ->where('car_profile.status', 1);

            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }
        
    }

    function carprofile_search_count($search, $userId){
        // $this->db->select("concat(character_plate,' ',number_plate) as plate, car_profile.*, provinceforcar.*");
        $this->db->from("car_profile");
        $this->db->join("provinceforcar","provinceforcar.provinceforcarId = car_profile.province_plate");
        $this->db->where("car_profile.userId", $userId);
        $this->db->like("concat(character_plate,' ',number_plate)", $search);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function profileSearch($limit,$start,$order,$dir,$search,$userId){
        // $this->db->select("concat(character_plate,' ',number_plate) as plate, car_profile.*, provinceforcar.*");
        $this->db->from("car_profile");
        $this->db->join("provinceforcar","provinceforcar.provinceforcarId = car_profile.province_plate");
        $this->db->where("car_profile.userId", $userId);
        $this->db->like("concat(character_plate,' ',number_plate)", $search);
        $query = $this->db->limit($limit,$start)
            ->order_by($order,$dir)
            ->get();
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
    }

    function getCarProfileByUserId($userId,$car_profileId){
        $this->db->select('car_profile.car_profileId, concat(car_profile.character_plate, " ", car_profile.number_plate, " ", provinceforcar.provinceforcarName) as plate');
        $this->db->from('car_profile');
        $this->db->join('provinceforcar', 'car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->where("userId", $userId);
        $this->db->where("car_profileId", $car_profileId);
        $query = $this->db->get();
        return $query->result();
    }

    function getCarDeleteById($car_profileId){
        return $this->db->where('car_profileId',$car_profileId)->get("car_profile")->row();
    }

    function getCarProfileByUserIdAndCarprofileId($userId,$car_profileId){
        $this->db->select('car_profile.car_profileId,car_profile.number_plate,car_profile.character_plate,car_profile.province_plate,car_profile.mileage,car_profile.color,car_profile.pictureFront,car_profile.brandId,car_profile.modelId,car_profile.modelofcarId,brand.brandName,model.modelName,model.yearStart,model.modelId as modelnumber,model.yearEnd,model.detail,modelofcar.machineSize,modelofcar.modelofcarName');
        $this->db->from('car_profile');
        $this->db->join('brand', 'car_profile.brandId = brand.brandId');
        $this->db->join('model', 'car_profile.modelId = model.modelId');
        $this->db->join('modelofcar', 'car_profile.modelofcarId = modelofcar.modelofcarId');
        $this->db->where("userId", $userId);
        $this->db->where("car_profileId", $car_profileId);
        $query = $this->db->get();
        return $query->row();
    }
    
    function data_check_create($character_plate, $number_plate, $province_plate, $userId){
        $this->db->select("car_profileId");
        $this->db->from("car_profile");
        $this->db->where('character_plate', $character_plate);
        $this->db->where('number_plate',$number_plate);
        $this->db->where('province_plate',$province_plate);
        $this->db->where('userId', $userId);
        $result = $this->db->get();
        return $result->row();

    }

    function getAllCarProfile(){
        $this->db->select('car_profile.car_profileId, car_profile.character_plate, car_profile.number_plate, car_profile.province_plate, car_profile.pictureFront, provinceforcar.provinceforcarName');
        $this->db->from("car_profile");
        $this->db->join("provinceforcar","provinceforcar.provinceforcarId = car_profile.province_plate");
        $this->db->where('car_profile.status', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function data_check_update($character_plate, $number_plate, $province_plate, $userId, $car_profileId){
        $this->db->select("car_profileId");
        $this->db->from("car_profile");
        $this->db->where('character_plate',$character_plate);
        $this->db->where('number_plate',$number_plate);
        $this->db->where('province_plate',$province_plate);
        $this->db->where('userId', $userId);
        $this->db->where_not_in('car_profileId', $car_profileId);
        $result = $this->db->get();
        return $result->row();
    }

    function update($data){
        $this->db->where('car_profileId',$data['car_profileId']);
        $result = $this->db->update('car_profile', $data);
        return $result;
    }

    function carprofile_search($limit,$start,$col,$dir,$character_plate, $number_plate, $province_plate)
    {
        $this->db->like('character_plate',$character_plate);
        $this->db->like('number_plate',$number_plate);
        $this->db->like('province_plate',$province_plate);
        // if($skill != null){
        //     $this->db->where("skill", $skill);
        // }
        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('car_profile');
        
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
        
    }

    function getBrandCar(){
        $this->db->select('brandId,brandName');
        $this->db->from('brand');
        $this->db->where('status',1);
        $this->db->order_by("brandName", "asc");
        $result = $this->db->get();
        return $result->result();

    }

    function getModelCar($brandId){
        $this->db->select('modelId, modelName, yearStart, yearEnd');
        $this->db->from('model');
        $this->db->where('brandId',$brandId);
        $this->db->where('status',1);
        $this->db->order_by("modelName", "asc");
        $result = $this->db->get();
        return $result->result();

    }

    function getModelofCar($modelId){
        $this->db->select("modelofcarId, modelofcarName, machineCode, machineSize");
        $this->db->from('modelofcar');
        $this->db->where('modelId',$modelId);
        $this->db->where('status',1);
        $this->db->order_by("modelofcarName", "asc");
        $result = $this->db->get();
        return $result->result();

    }

    function getAllCarProfileByUserId($userId){
        $this->db->select('car_profile.car_profileId,car_profile.number_plate,car_profile.character_plate,car_profile.province_plate,car_profile.mileage,car_profile.color,car_profile.pictureFront,car_profile.brandId,car_profile.modelId,car_profile.modelofcarId,brand.brandName,model.modelName as detail, provinceforcar.provinceforcarName');
        $this->db->from('car_profile');
        $this->db->join('brand', 'car_profile.brandId = brand.brandId');
        $this->db->join('model', 'car_profile.modelId = model.modelId');
        $this->db->join('modelofcar', 'car_profile.modelofcarId = modelofcar.modelofcarId');
        $this->db->join('provinceforcar', 'car_profile.province_plate = provinceforcar.provinceforcarId');
        $this->db->where("userId", $userId);
        $query = $this->db->get();
        return $query->result();
    }
}