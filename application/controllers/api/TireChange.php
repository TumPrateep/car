<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class TireChange extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    public function create_post(){
        $tire_front = $this->post('tire_front');
        $tire_back = $this->post('tire_back');
        $rimId = $this->post('rimId');
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model('tirechanges');
        $isDuplicate = $this->tirechanges->checkDuplicate($tire_front,$tire_back,$rimId);
        if($isDuplicate){
            $data = array(
                'tire_changeId' => null,
                'tire_front' => $tire_front,
                'tire_back'  => $tire_back,
                'rimId' => $rimId,
                'create_by' => $userId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'status' => 1
            );
            $result = $this->tirechanges->insert($data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }

        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
}