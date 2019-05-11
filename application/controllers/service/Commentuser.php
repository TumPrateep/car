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
        $orderId = $this->post("orderId");        
        $data_check = $this->commentusers->data_check_create($orderId);
        $order = $this->commentusers->getorderById($orderId);//รูปแบบที่ไม่ใช้กรอก  แต่ดึงมาแล้วบันทึก
        $commentuser = $this->post("commentUser");
		$rating = $this->post('selected_rating');

        $data = array(
            'ratingId' => null,
            'commentuser'  => $commentuser,
            'scorerating' => $rating,
            'create_by' => $userId,
            'userId' => $userId,
            'orderId' => $orderId,
            'garageId' => $order->garageId,//ข้อมูลมาเป็นก้อน แล้วมาชี้เอาเฉพาะตัว
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
