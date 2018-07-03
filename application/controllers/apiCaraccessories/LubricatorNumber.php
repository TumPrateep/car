<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LubricatorNumber extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    public function createLubricatorNumber_Post(){
        $lubricator_number = $this->post('lubricator_number');
        $lubricator_typeId = $this->post('lubricator_typeId');
        $lubricator_gear   = $this->post('lubricator_gear');
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model("LubricatorNumbers");
        $isCheck = $this->LubricatorNumbers->checkLubricatorNumber($lubricatorNumber, $lubricatorGear, $lubricatorNumberId);
       if($isCheck){
            $data = array(
                'lubricator_numberId' =>null,
                'lubricator_number' => $lubricator_number, 
                'lubricator_typeId' => $lubricator_typeId,
                'lubricator_gear' => $lubricator_gear, 
                'status' => 2,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                'activeFlag' => 2
            );
            $result = $this->LubricatorNumbers->insertLubricatorNumber($data);
                $output["status"] = $result;
                if($result){
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }
                else{
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