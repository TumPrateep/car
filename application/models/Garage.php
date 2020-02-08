<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Garage extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getGarageFromGarageByUserId($userId)
    {
        return $this->db->where('userId', $userId)->get("garage")->row();
    }

    public function listGarageSearchByGarageNameAndProvinceId($garageName, $provinceId)
    {
        // $this->db->select("garage.garageId,garage.businessRegistration,garage.garageName,garage.garageAddress,garage.latitude,garage.longtitude,garage.approve,garage.firstname,garage.lastname,province.provinceName,district.districtName,subdistrict.subdistrictName");
        $this->db->select("garage.garageId,garage.garageName,garage.latitude,garage.longtitude");
        $this->db->from("garage");
        // $this->db->join("province","province.provinceId = garage.provinceId");
        // $this->db->join("district","district.districtId = garage.districtId");
        // $this->db->join("subdistrict","subdistrict.subdistrictId = garage.subdistrictId");
        $this->db->where("garage.provinceId", $provinceId);
        if (!empty($garageName)) {
            $this->db->like("garage.garageName", $garageName);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getViewGarageByGarageId($garageId)
    {
        $this->db->select("garage.*,province.provinceName,district.districtName,subdistrict.subdistrictName");
        $this->db->from("garage");
        $this->db->join("province", "province.provinceId = garage.provinceId");
        $this->db->join("district", "district.districtId = garage.districtId");
        $this->db->join("subdistrict", "subdistrict.subdistrictId = garage.subdistrictId");
        $this->db->where("garage.garageId", $garageId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getGarageByGarageId($garageId)
    {
        $this->db->select("garage.*,province.provinceName,district.districtName,subdistrict.subdistrictName");
        $this->db->from("garage");
        $this->db->join("province", "province.provinceId = garage.provinceId");
        $this->db->join("district", "district.districtId = garage.districtId");
        $this->db->join("subdistrict", "subdistrict.subdistrictId = garage.subdistrictId");
        $this->db->where("garage.garageId", $garageId);
        $query = $this->db->get();
        return $query->row();
    }

    public function update($data)
    {
        $this->db->where('garageId', $data['garageId']);
        $result = $this->db->update('garage', $data);
        return $result;
    }

    public function checkDuplicate($garageId, $businessRegistration)
    {
        $this->db->from('garage');
        $this->db->where("businessRegistration", $businessRegistration);
        $this->db->where_not_in("garageId", $garageId);
        $result = $this->db->count_all_results();
        if ($result > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllGarageByDataType($dataType)
    {
        $this->db->select('garageId, garageName, picture, dayopenhour, openingtime, closingtime, garageService, option1, option2, option3, option4');
        $this->db->where('status', 1);
        if ($dataType["spare"] == 1) {
            $this->db->where("garageService like '1__'");
        }
        if ($dataType["tire"] == 1) {
            $this->db->where("garageService like '_1_'");
        }
        if ($dataType["lubricator"] == 1) {
            $this->db->where("garageService like '__1'");
        }
        $query = $this->db->get("garage");
        return $query->result();
    }

    public function getAllGarage()
    {
        $this->db->select('garageId, garageName, picture, dayopenhour');
        $this->db->where('status', 1);
        $query = $this->db->get("garage");
        return $query->result();
    }

    public function findGarageByUserId($userId)
    {
        $this->db->where("userId", $userId);
        return $this->db->get("garage")->row("garageId");
    }

    public function getGarageporfile($garageId)
    {
        $this->db->select('garageId, garageName, picture, dayopenhour, openingtime, closingtime, phone');
        $this->db->where("garageId", $garageId);
        $query = $this->db->get("garage");
        return $query->row();
    }

    // เข้างลางเป็นของ Garagesmanagement

    public function allData_count()
    {
        $query = $this->db->get('garage');
        return $query->num_rows();
    }

    public function allData($limit, $start, $order, $dir)
    {
        $this->db->select('garage.garageId, garage.picture, garage.garageName, mechanic.titleName, mechanic.firstName, mechanic.lastName, garage.phone, garage.status');
        $this->db->from('garage');
        $this->db->join('mechanic', 'garage.garageId = mechanic.garageId', 'left');
        $this->db->where('mechanic.status', 1);
        $this->db->or_where('mechanic.status is null', null, false);
        $this->db->limit($limit, $start)->order_by($order, $dir);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function Garagesmanagement_search($limit, $start, $search, $col, $dir, $status)
    {
        $this->db->select('garage.garageId, garage.picture, garage.garageName, mechanic.titleName, mechanic.firstName, mechanic.lastName, garage.phone, garage.status');
        $this->db->from('garage');
        $this->db->join('mechanic', 'mechanic.garageId = garage.garageId');
        $this->db->where('mechanic.status', 1);

        $this->db->like('garage.garageName', $search);
        $this->db->like('garage.status', $status);

        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function Garagesmanagement_search_count($search, $status)
    {
        $this->db->select('garage.garageId, garage.picture, garage.garageName, mechanic.titleName, mechanic.firstName, mechanic.lastName, garage.phone, garage.status');
        $this->db->from('garage');
        $this->db->join('mechanic', 'mechanic.garageId = garage.garageId');
        $this->db->where('mechanic.status', 1);

        $this->db->like('garage.garageName', $search);
        $this->db->like('garage.status', $status);

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getGaragesmanagementById($garageId)
    {
        $this->db->select('garage.garageId, garage.picture, garage.garageName, mechanic.titleName, mechanic.firstName, mechanic.lastName, garage.phone, garage.status ,
        garage.hno, garage.alley, garage.road, garage.village, garage.provinceId, garage.districtId, garage.subdistrictId, mechanic.phone AS mechanicphone, mechanic.mechanicId,
        garage.latitude, garage.longtitude, garage.businessRegistration, garage.postCode, mechanic.personalid');
        $this->db->from('garage');
        $this->db->join('mechanic', 'mechanic.garageId = garage.garageId');
        $this->db->where('garage.garageId', $garageId);

        $query = $this->db->get();
        return $query->row();
    }

    public function getUpdate($garageId)
    {
        $this->db->select('garageId, garageName, phone, hno, alley, road, village');
        $this->db->where('garageId', $garageId);
        $result = $this->db->get("garage")->row();
        return $result;
    }

    public function data_check_update($garageId, $garageName)
    {
        $this->db->from("garage");
        $this->db->where('garageName', $garageName);
        $this->db->where_not_in('garageId', $garageId);
        $result = $this->db->get();
        return $result->row();
    }

    public function getshowuser($garageId)
    {
        $this->db->select('garage.garageId, user_profile.activeFlag, user_profile.create_at, user_profile.districtId, user_profile.firstname, user_profile.hno, user_profile.lastname,
        user_profile.phone1, user_profile.phone2, user_profile.postCodes, user_profile.provinceId, user_profile.road, user_profile.status,
        user_profile.subdistrictId, user_profile.titleName, user_profile.userId, user_profile.user_profile, user_profile.village');
        $this->db->from('garage');
        $this->db->join("user_profile", "user_profile.userId = garage.userId");
        $this->db->where("garage.garageId", $garageId);
        $this->db->where("user_profile.status", 1);
        $query = $this->db->get();
        return $query->row();
    }

    public function getbygarageuser($garageId)
    {
        $this->db->from('garage');
        $this->db->where("garageId", $garageId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getOwnerById($garageId)
    {
        $this->db->from('mechanic');
        $this->db->where("garageId", $garageId);
        $this->db->where("status", 1);
        $query = $this->db->get();
        return $query->row();
    }

    public function getRatingByGarageId($garageId)
    {
        $this->db->from('rating');
        $this->db->where("garageId", $garageId);
        $query = $this->db->get();
        return $query->result();
    }

}