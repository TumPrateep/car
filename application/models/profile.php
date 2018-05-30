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
                $this->saveRoleGarage($roleData);
            }else if($role == 2){
                $this->saveRoleCarAccessories($roleData);
            }else if($role == 4){
                $this->saveRoleUser($roleData);
            }

            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
                return false;
            }else{
                $this->db->trans_commit();
                return true;
            }
    }

    function saveRoleUser($data){
        return $this->db->insert('car_profile', $data);
    }

    function saveRoleGarage($data){
        return $this->db->insert('garage', $data);
    }

    function saveRoleCarAccessories($data){
        return $this->db->insert('car_accessories', $data);
    }

    function saveProfile($userId, $data){
        return $this->db->insert('user_profile', $data);
    }

    function getProfileByUserId($userId){
        $this->db->where("userId", $userId);
        $this->db->where("status", 1);        
        return $this->db->get('user_profile');
    }

    function updateProfileById($profileId){
        $this->db->set('status', 2);
        $this->db->where('user_profile', $profileId);
        $this->db->update('user_profile');
    }

    function editRole($role, $userId){
        $status = 2;
        if($role == 4){
            $status = 1;
        }
        $this->db->set('category', $role);
        $this->db->set('status', $status);
        $this->db->where('id', $userId);
        $this->db->update('users');
    }

}