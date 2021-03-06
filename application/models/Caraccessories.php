<?php if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class Caraccessories extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCarAccessoriesFromCarAccessoriesByUserId($userId)
    {
        return $this->db->where('userId', $userId)->get("car_accessories")->row();
    }
    public function allData_count()
    {
        $query = $this->db->get('car_accessories');
        return $query->num_rows();
    }

    public function allData($limit, $start, $order, $dir)
    {
        $this->db->select('car_accessoriesId, car_accessoriesName,CONCAT(firstname,lastname)as name, phone, status, userId, deliver_day');
        $this->db->from('car_accessories');

        $this->db->limit($limit, $start)->order_by($order, $dir);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function update($data)
    {
        $this->db->where('car_accessoriesId', $data['car_accessoriesId']);
        $result = $this->db->update('car_accessories', $data);
        // dd();
        return $result;
    }

    public function getSparepictireById($car_accessoriesId)
    {
        $query = $this->db->where("car_accessoriesId", $car_accessoriesId)->get("car_accessories");
        return $query->row();
    }

    public function getSpareById($spare_pictire_id)
    {
        $this->db->where('spare_pictire_id', $spare_pictire_id);
        $result = $this->db->get("spares_picture");
        return $result->row();
    }

    public function getUpdate($car_accessoriesId)
    {
        $this->db->select('car_accessoriesId, car_accessoriesName, phone, titlename, firstname, lastname, hno, alley, road, village');
        $this->db->where('car_accessoriesId', $car_accessoriesId);
        $result = $this->db->get("car_accessories")->row();
        return $result;
    }

    public function getDeliverDay($userId)
    {
        $this->db->select('deliver_day');
        $this->db->where('userId', $userId);
        $result = $this->db->get("car_accessories")->row();
        return $result;
    }

    public function data_check_update($car_accessoriesId, $car_accessoriesName)
    {
        $this->db->from("car_accessories");
        $this->db->where('car_accessoriesName', $car_accessoriesName);
        $this->db->where_not_in('car_accessoriesId', $car_accessoriesId);
        $result = $this->db->get();
        return $result->row();
    }

    public function delete($spare_pictire_id)
    {
        return $this->db->delete('spares_picture', array('spare_pictire_id' => $spare_pictire_id));
    }

    public function sparesUndercarriage_search($limit, $start, $search, $col, $dir, $status)
    {
        $this->db->select('car_accessoriesId, car_accessoriesName,CONCAT(firstname,lastname)as name, phone, status, userId, deliver_day');
        $this->db->from('car_accessories');

        $this->db->like('car_accessoriesName', $search);
        $this->db->like('status', $status);

        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    public function sparesUndercarriage_search_count($search, $status)
    {
        $this->db->select('car_accessoriesId, car_accessoriesName,CONCAT(firstname,lastname)as name, phone, status , userId');
        $this->db->from('car_accessories');

        $this->db->like('car_accessoriesName', $search);
        $this->db->like('status', $status);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getshowuser($car_accessoriesId)
    {
        $this->db->select('car_accessories.car_accessoriesId, user_profile.activeFlag, user_profile.create_at, user_profile.districtId, user_profile.firstname, user_profile.hno, user_profile.lastname,
        user_profile.phone1, user_profile.phone2, user_profile.postCodes, user_profile.provinceId, user_profile.road, user_profile.status,
        user_profile.subdistrictId, user_profile.titleName, user_profile.userId, user_profile.user_profile, user_profile.village');
        $this->db->from('car_accessories');
        $this->db->join("user_profile", "user_profile.userId = car_accessories.userId");
        $this->db->where("car_accessories.car_accessoriesId", $car_accessoriesId);
        $this->db->where("user_profile.status", 1);
        $query = $this->db->get();
        return $query->row();
    }

}