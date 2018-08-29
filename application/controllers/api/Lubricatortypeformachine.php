<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatortypeformachine extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatortypeformachines");
    }

    function getAllLubricatortypeformachine_get(){
        $output['data'] = $this->lubricatortypeformachines->getAllLubricatortypeformachine();
        $this->set_response($output, REST_Controller::HTTP_OK);
    }


}