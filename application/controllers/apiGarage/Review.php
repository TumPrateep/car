<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Review extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();  
        $this->load->model('commentusers');

    }

    function getdatarating_post(){
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $data["review"] = $this->commentusers->getDataReviewForRating($garageId);

        // $date=date_create($data["review"]->create_at);
        // $data["review"]->create_at = date_format($date,"Y/m/d");

        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function editupdate_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $ratingId = $this->post("updaterating");
        $commentgarage = $this->post("editcommentgarage");

        $data_check_update = $this->commentusers->getupdatecommentById($ratingId);
        $data_check = $this->commentusers->data_check_update($ratingId,$commentgarage);
        $data = array(
            'ratingId' => $ratingId,
            'commentgarage' => $commentgarage,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time()),
            'status' => 2 
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->commentusers,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $ratingId = $this->post("replyrating");
        $commentgarage = $this->post("commentgarage");

        $data_check_update = $this->commentusers->getupdatecommentById($ratingId);
        $data_check = $this->commentusers->data_check_update($ratingId,$commentgarage);
        $data = array(
            'ratingId' => $ratingId,
            'commentgarage' => $commentgarage,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time()),
            'status' => 2 
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->commentusers,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }
    
    function searchScoreRating_get(){
        
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $score['all'] = $this->commentusers->allScoreAll_count($garageId);
        $score['one'] = $this->commentusers->allScoreOne_count($garageId);
        $score['two'] = $this->commentusers->allScoreTwo_count($garageId);
        $score['three'] = $this->commentusers->allScoreThree_count($garageId);
        $score['four'] = $this->commentusers->allScoreFour_count($garageId);
        $score['five'] = $this->commentusers->allScorefive_count($garageId);
       
        $this->set_response($score, REST_Controller::HTTP_OK);
    }

    function searchScoreRatingbyMonth_get(){
        
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $ratmonth = date("m");
        $ratyear = date("Y");
        $score['all'] = $this->commentusers->allScoreAllbymonth_count($garageId,$ratmonth,$ratyear);
        $score['one'] = $this->commentusers->allScoreOnebymonth_count($garageId,$ratmonth,$ratyear);
        $score['two'] = $this->commentusers->allScoreTwobymonth_count($garageId,$ratmonth,$ratyear);
        $score['three'] = $this->commentusers->allScoreThreebymonth_count($garageId,$ratmonth,$ratyear);
        $score['four'] = $this->commentusers->allScoreFourbymonth_count($garageId,$ratmonth,$ratyear);
        $score['five'] = $this->commentusers->allScorefivebymonth_count($garageId,$ratmonth,$ratyear);
        $score['month'] = date("m/Y");

        $this->set_response($score, REST_Controller::HTTP_OK);
    }

}