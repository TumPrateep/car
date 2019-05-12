<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Rating extends CI_Model{

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
        $this->db->where('ratingId',$d4ata['ratingId']);
        $result = $this->db->update('rating', $data);
        return $result;
    }

}