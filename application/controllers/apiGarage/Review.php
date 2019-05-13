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
    

}