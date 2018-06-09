<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Profile extends CI_Model{

    function saveProfileRoleUser($role, $userId, $profileData, $roleData){
        $this->db->trans_start();
            $this->editRole($role, $userId);
            $tempProfileData = $this->getProfileByUserId($userId);
            if($tempProfileData != null){
                $this->updateProfileById($tempProfileData->user_profile);
            }
            $this->saveProfile($userId, $profileData);
            if($role == 3){
                $this->saveRoleGarage($roleData, $userId);
            }else if($role == 2){
                $this->saveRoleCarAccessories($roleData, $userId);
            }else if($role == 4){
                $this->saveRoleUser($roleData, $userId);
            }

            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
            }else{
                $this->db->trans_commit();
                return true;
            }
    }

    function saveRoleUser($data, $userId){
        $result = $this->db->where("userId", $userId)->get("car_profile")->row();     
        if($result != null){
            $data["create_at"] = $result->create_at;
            $data["create_by"] = $result->create_by;
            $data["update_by"] = $this->session->userdata['logged_in']['id'];
            $data["update_at"] = date('Y-m-d H:i:s',time());
            $this->db->set($data);
            $this->db->where('car_profileId', $result->car_profileId);
            return $this->db->update('car_profile');
        }else{
            return $this->db->insert('car_profile', $data);
        }
        
    }

    function saveRoleGarage($data, $userId){
        $result = $this->db->where("userId", $userId)->get("garage")->row();     
        if($result != null){
            $data["create_at"] = $result->create_at;
            $data["create_by"] = $result->create_by;
            $data["update_by"] = $this->session->userdata['logged_in']['id'];
            $data["update_at"] = date('Y-m-d H:i:s',time());
            $this->db->set($data);
            $this->db->where('garageId', $result->garageId);
            return $this->db->update('garage');
        }else{
            return $this->db->insert('garage', $data);
        }
        
    }

    function saveRoleCarAccessories($data, $userId){
        $result = $this->db->where("userId", $userId)->get("car_accessories")->row();     
        if($result != null){
            $data["create_at"] = $result->create_at;
            $data["create_by"] = $result->create_by;
            $data["update_by"] = $this->session->userdata['logged_in']['id'];
            $data["update_at"] = date('Y-m-d H:i:s',time());
            $this->db->set($data);
            $this->db->where('car_accessoriesId', $result->car_accessoriesId);
            return $this->db->update('car_accessories');
        }else{
            return $this->db->insert('car_accessories', $data);
        }
        
    }

    function saveProfile($userId, $data){
        return $this->db->insert('user_profile', $data);
    }

    function getProfileByUserId($userId){
        $this->db->where("userId", $userId);
        $this->db->where("status", 1);        
        return $this->db->get('user_profile')->row();
    }

    function updateProfileById($profileId){
        $this->db->set('status', 2);
        $this->db->where('user_profile', $profileId);
        $this->db->update('user_profile');
    }

    function editRole($role, $userId){
        $status = 2;
        if($role == 4 || $role == 1){
            $status = 1;
        }
        $this->db->set('category', $role);
        $this->db->set('status', $status);
        $this->db->where('id', $userId);
        $this->db->update('users');
    }

    function findUserProfileById($userId){
        $this->db->where("userId", $userId);    
        return $this->db->get('user_profile')->row();
    }

    function findUserProfileByIdAndStatusActive($userId){
        $this->db->where("userId", $userId);
        $this->db->where("status", 1);    
        return $this->db->get('user_profile')->row();
    }

    function findViewUserProfileByIdAndStatusActive($userId){
        $this->db->where("userId", $userId);
        $this->db->where("status", 1);    
        return $this->db->get('user_profile')->row();
    }

}