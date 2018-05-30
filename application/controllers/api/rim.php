<?php
// ขอบยาง นะ 

defined('BASEPATH') OR exit('No direct script access allowed');

class rim extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

    }

    function deleteRim_get(){
        $rimId = $this->get('rimId');
        $this->load->model("rims");
        $rim = $this->rims->getrimbyId($rimId);
        if($rim != null){
            $isDelete = $this->rims->delete($rimId);
            if($isDelete){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_USED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
}