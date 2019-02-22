<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Userprofiles extends CI_Model {
   
    function getuserById($user_profile){
        return $this->db->where('user_profile',$user_profile)->where('status', 1)->get("user_profile")->row("user_profile");
    }

    function getUserProfileByUserId($userId){
        return $this->db->where('userId',$userId)->where('status', 1)->get("user_profile")->row("user_profile");
    }

    function getuserProfileById($user_profile){
        return $this->db->where('user_profile',$user_profile)->get("user_profile")->row();
    }

    function data_check_update($user_profile,$firstname,$lastname){
        $this->db->select("user_profile");
        $this->db->from("user_profile");
        $this->db->where('user_profile', $user_profile);
        $this->db->where_not_in('user_profile', $user_profile);
        $result = $this->db->get();
        return $result->row();
    }
    function update($data){
        $this->db->where('user_profile',$data['user_profile']);
        $result = $this->db->update('user_profile', $data);
        return $result;
    }
    function alluser_count()
    {   
        $query = $this
                ->db
                ->get('user_profile');
    
        return $query->num_rows();  
    }
    function alluser($limit,$start,$col,$dir)
    {   
        $query = $this
            ->db
            ->limit($limit,$start)
            ->order_by($col,$dir)
            ->get('user_profile');
            if($query->num_rows()>0)
            {
                return $query->result(); 
            }
            else
            {
                return null;
            }  
    }
   
    

}