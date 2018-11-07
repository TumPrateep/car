<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mechaniccreates extends BD_Controller {

    function __construct()
    {
        parent::__construct();
        $this->auth();
        $this->load->model("mechanic");
    }

    function createMechaniccreates_post(){
        $firstname = $this->post("firstname");
        $lasrtname = $this->post("lastname");
        $idcard = $this->post("idcard");

        $data =array(
            'id_mechanic' => null,
            'firstname' => $firstname,
            'lastname' => $lasrtname,
            'idcard' => $idcard
        );

        $data_check = $this->mechanic->data_check_create($firstname);

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->mechanic,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

    }
}