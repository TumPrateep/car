<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Commentusers extends CI_Model{
    // insert
    function insert($data){
        return $this->db->insert('rating',$data);
    }

    function getorderById($orderId){
        $this->db->select("*");
        $this->db->where("orderId",$orderId);
        $result = $this->db->get('reserve');// reserve คือตารางการจอง
        return $result->row();
    }

    function data_check_create($orderId){
        $this->db->from("rating");
        $this->db->where("orderId",$orderId);
        $result = $this->db->get();
        return $result->row();
    }

    function getDataReviewForRating($garageId){
        $this->db->select("rating.ratingId, rating.commentgarage, rating.commentuser, rating.scorerating, rating.create_at, rating.status, rating.orderId, user_profile.titleName, user_profile.firstname, user_profile.lastname");
        $this->db->from('rating');
        $this->db->join('users','rating.userId  = users.id');
        $this->db->join('user_profile','users.id  = user_profile.userId');
        $this->db->where('garageId',$garageId);
        $result = $this->db->get();
        return $result->result();
    }

    function update($data){
        $this->db->where('ratingId',$data['ratingId']);
        $result = $this->db->update('rating', $data);
        return $result;
    }

    function getupdatecommentById($ratingId){
        // $this->db->select("*");
        $this->db->where("ratingId",$ratingId);
        $result = $this->db->get('rating');// reserve คือตารางการจอง
        return $result->row();
    }

    function data_check_update($ratingId,$commentgarage){
        $this->db->from("rating");
        $this->db->where("commentgarage",$commentgarage);
        $this->db->where_not_in('ratingId',$ratingId);
        $result = $this->db->get();
        return $result->row();
    }

    function allScoreAll_count($garageId){  
        $this->db->select('garageId');
        $this->db->from('rating');
        $this->db->where('garageId',$garageId);
        $query = $this->db->get();
        return $query->num_rows();                            
    }

    function allScoreOne_count($garageId){  
        $this->db->select('garageId');
        $this->db->from('rating');
        $this->db->where('garageId',$garageId);
        $this->db->where('scorerating',1);
        $query = $this->db->get();
        return $query->num_rows();                            
    }

    function allScoreTwo_count($garageId){  
        $this->db->select('garageId');
        $this->db->from('rating');
        $this->db->where('garageId',$garageId);
        $this->db->where('scorerating',2);
        $query = $this->db->get();
        return $query->num_rows();                            
    }

    function allScoreThree_count($garageId){  
        $this->db->select('garageId');
        $this->db->from('rating');
        $this->db->where('garageId',$garageId);
        $this->db->where('scorerating',3);
        $query = $this->db->get();
        return $query->num_rows();                            
    }

    function allScoreFour_count($garageId){  
        $this->db->select('garageId');
        $this->db->from('rating');
        $this->db->where('garageId',$garageId);
        $this->db->where('scorerating',4);
        $query = $this->db->get();
        return $query->num_rows();                            
    }

    function allScorefive_count($garageId){  
        $this->db->select('garageId');
        $this->db->from('rating');
        $this->db->where('garageId',$garageId);
        $this->db->where('scorerating',5);
        $query = $this->db->get();
        return $query->num_rows();                            
    }
}