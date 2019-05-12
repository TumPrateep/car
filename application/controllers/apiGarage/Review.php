<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Review extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();  
        // $this->load->model('rating');
        $this->load->model('commentusers');

    }

    function getdatarating_post(){
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $data["review"] = $this->commentusers->getDataReviewForRating($garageId);

        // $date=date_create($data["review"]->create_at);
        // $data["review"]->create_at = date_format($date,"Y/m/d");

        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    function createCommentgarage_post(){
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $ratingId = $this->post("replyrating");        
        // $data_check = $this->commentusers->data_check_create($orderId);
        // $order = $this->commentusers->getorderById($orderId);//รูปแบบที่ไม่ใช้กรอก  แต่ดึงมาแล้วบันทึก
        $commentgarage = $this->post("commentgarage");
        // $rating = $this->post('selected_rating');

        $data = array(
            'ratingId' => $ratingId,
            'commentuser'  => $commentgarage,
            // 'scorerating' => $rating,
            'update_by' => $garageId,
            // 'userId' => $userId,
            // 'orderId' => $orderId,
            // 'garageId' => $order->garageId,//ข้อมูลมาเป็นก้อน แล้วมาชี้เอาเฉพาะตัว
            'update_at' => date('Y-m-d H:i:s',time()),
            'status' => 2
        );
        $option = [
            // "data_check" => $data_check,
            "data" => $data,
            "model" => $this->rating,
            "image_path" => null
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