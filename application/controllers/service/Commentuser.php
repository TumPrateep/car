<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Commentuser extends BD_Controller {
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('commentusers');
    }
      
    public function createCommentuser_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        // $garageId = $this->session->userdata['logged_in']['garageId'];
        $data_check = $this->commentusers->data_check_create();
        $commentuser = $this->post("commentUser");

        $data = array(
            'ratingId' => null,
            'commentuser'  => $commentuser,
            'create_by' => $userId,
            // 'garageId' => $garageId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->commentusers,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }
}
