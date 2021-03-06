<?php

if (!defined('BASEPATH')) {
    exit('No direct script allowed');
}

class User extends CI_Model
{

    public function allUser_count()
    {
        $query = $this->db->get('users');
        return $query->num_rows();

    }

    public function allUser($limit, $start, $col, $dir)
    {

        $query = $this
            ->db
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('users');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }

    public function user_search($limit, $start, $search, $userType, $status, $col, $dir)
    {
        $this->db->group_start();
        $this->db->like('username', $search)
            ->or_like('phone', $search);
        $this->db->group_end();

        if ($userType != null) {
            $this->db->where('category', $userType);
        }

        if ($status != null) {
            $this->db->where('status', $status);
        }

        $query = $this->db->limit($limit, $start)
            ->order_by($col, $dir)
            ->get('users');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    public function user_search_count($search, $userType, $status)
    {
        $this->db->group_start();
        $this->db->like('username', $search)
            ->or_like('phone', $search);
        $this->db->group_end();

        if ($userType != null) {
            $this->db->where('category', $userType);
        }

        if ($status != null) {
            $this->db->where('status', $status);
        }
        $query = $this->db->get('users');

        return $query->num_rows();
    }

    public function insert_user($data)
    {
        // return $this->db->insert('users', $data);
        $this->db->trans_begin();
        $this->db->insert('users', $data['users']);
        $userId = $this->db->insert_id();
        $data['profile']['userId'] = $userId;
        $this->db->insert('user_profile', $data['profile']);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function insert_user_car_profile($data)
    {
        // return $this->db->insert('users', $data);
        $this->db->trans_begin();
        $this->db->insert('users', $data['users']);
        $userId = $this->db->insert_id();
        $data['profile']['userId'] = $userId;
        $this->db->insert('user_profile', $data['profile']);
        $data['car_profile']['userId'] = $userId;
        $this->db->insert('car_profile', $data['car_profile']);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function data_check_create($username, $phone)
    {
        $this->db->select("username");
        $this->db->from("users");
        $this->db->where("username", $username);
        $this->db->or_where("phone", $phone);
        $result = $this->db->get();
        return $result->row();
    }

    public function check_User($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('users')->row();
        return $result;
    }

    public function wherenot($id, $users)
    {
        $this->db->select("users");
        $this->db->from("users");
        $this->db->where('id', $id);
        $this->db->where('users', $users);
        $this->db->where_not_in('id', $id);

        $result = $this->db->count_all_results();

        if ($result > 0) {
            return false;
        }
        return true;
    }

    public function getUser($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('users')->row();
        return $result;
    }

    public function getuserById($id)
    {
        $this->db->select("id,username,email,phone");
        return $this->db->where('id', $id)->get("users")->row();
    }

    public function delete($id)
    {
        $this->db->where_not_in("username", "admin");
        return $this->db->delete('users', array('id' => $id));
    }

    public function insertUserprofile($data)
    {
        return $this->db->insert('user_profile', $data);
    }

    public function checkUserid($userId)
    {
        $this->db->select("userId");
        $this->db->from("user_profile");
        $this->db->where('userId', $userId);

        $result = $this->db->count_all_results();

        if ($result > 0) {
            return true;
        }
        return false;
    }

    public function insert_role4($data)
    {
        return $this->db->insert('car_profile', $data);
    }

    public function insert_role3($data)
    {
        return $this->db->insert('garage', $data);
    }

    public function insert_role2($data)
    {
        return $this->db->insert('car_accessories', $data);
    }

    public function updateStatus($id, $data)
    {
        $this->db->where('id', $id);
        $result = $this->db->update('users', $data);
        return $result;
    }

    public function wherenotUser($id, $username)
    {
        $this->db->select("username");
        $this->db->from("users");
        $this->db->where('username', $username);
        $this->db->where_not_in('id', $id);
        $result = $this->db->count_all_results();

        if ($result > 0) {
            return false;
        }
        return true;
    }
    public function updateUser($data)
    {
        $this->db->where('id', $data['id']);
        $result = $this->db->update('users', $data);
        return $result;
    }

    public function getuserprofile($use_profile)
    {
        $this->db->select("firstname,lastname,phone1,phone2,provinceId,districtId,subdistrictId,address,titleName");
        return $this->db->where('user_profile', $user_profile)->get("user_profile")->row();
    }

    public function getuserprofileById($userId)
    {
        $this->db->select("firstname,lastname,phone1,phone2,provinceId,districtId,subdistrictId,address,titleName");
        return $this->db->where('userId', $userId)->get("user_profile")->row();
    }

    public function checkCar_profile($userId)
    {
        $this->db->select("userId");
        $this->db->from("car_profile");
        $this->db->where('userId', $userId);

        $result = $this->db->count_all_results();

        if ($result > 0) {
            return true;
        }
        return false;
    }

    public function getdataCar_profileById($userId)
    {
        $this->db->select("mileage,pictureFront,pictureBack,circlePlate,province_plate,character_plate,number_plate,color");
        return $this->db->where('userId', $userId)->get("car_profile")->row();
    }

    public function insert($data)
    {
        $this->db->trans_begin();
        $this->db->insert('users', $data['users']);
        $userId = $this->db->insert_id();
        // $result = $this->db->where('username',$data['users']['username'])->get("users")->row();
        // $userId = $result->id;
        $data['profile']['userId'] = $userId;
        $this->db->insert('user_profile', $data['profile']);

        if (!empty($data['accessories'])) {
            $data['accessories']['userId'] = $userId;
            $data['accessories']['create_by'] = $userId;
            $this->db->insert('car_accessories', $data['accessories']);
        }
        if (!empty($data['garage'])) {
            $data['garage']['userId'] = $userId;
            $data['garage']['create_by'] = $userId;
            $this->db->insert('garage', $data['garage']);
            // $result = $this->db->where('garageName',$data['garage']['garageName'])->get("garage")->row();
            $garageId = $this->db->insert_id();
            $data['mechanic']['garageId'] = $garageId;
            $data['mechanic']['create_by'] = $userId;
            $this->db->insert('mechanic', $data['mechanic']);

            $nowDate = date('Y-m-d H:i:s', time());
            $this->db->query("INSERT INTO lubricator_change_garage(`garageId`, `lubricator_price`, `status`, `activeFlag`, `create_by`, `create_at`)
                    SELECT $garageId,`lubricator_price`, `status`, `activeFlag`, $userId, '$nowDate' FROM lubricator_change_garage where garageId = 5");

            $this->db->query("INSERT INTO `spares_change_garage`(`spares_price`, `status`, `spares_undercarriageId`, `create_by`, `create_at`, `activeFlag`, `brandId`, `garageId`)
                    SELECT `spares_price`, `status`, `spares_undercarriageId`, $userId, '$nowDate', `activeFlag`, `brandId`, $garageId FROM `spares_change_garage` WHERE garageId = 5");

            $this->db->query("INSERT INTO `tire_change_garage`(`tire_price`, `status`, `activeFlag`, `create_by`, `create_at`, `garageId`, `rimId`)
                    SELECT `tire_price`, `status`, `activeFlag`, $userId, '$nowDate', $garageId, `rimId` FROM `tire_change_garage` WHERE garageId = 5");

        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function getUserByEmail($email)
    {
        $result = $this->db->where("email", $email)->get("users");
        return ($result == null) ? null : $result->row();
    }

    public function data_check_garage_create($businessRegistration)
    {
        $this->db->select("businessRegistration");
        $this->db->from("garage");
        $this->db->where("businessRegistration", $businessRegistration);
        $result = $this->db->get();
        return $result->row();
    }

}