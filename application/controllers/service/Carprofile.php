<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Carprofile extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("carprofiles");
    }

    function getCarProfile_get(){
        $userId = $this->session->userdata['logged_in']['id'];
        $data = $this->carprofiles->getUserProfileByUserId($userId);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    function createCarProfile_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $character_plate = $this->post("character_plate");
        $number_plate = $this->post("number_plate");
        $province_plate = $this->post("province_plate");
        $mileage = $this->post("mileage");
        $color = $this->post("color");

        $data_check = $this->carprofiles->data_check_create($character_plate,$number_plate ,$province_plate, $userId);

        $data =array(
            'car_profileId' => null,
            'pictureFront' => null,
            'pictureBack' => null,
            'circlePlate' => null,
            'userId' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId,
            'status' => 1,
            'character_plate' => $character_plate,
            'number_plate' => $number_plate,
            'province_plate' => $province_plate,
            'mileage' => $mileage,
            'color' => $color
        );

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->carprofiles,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

}