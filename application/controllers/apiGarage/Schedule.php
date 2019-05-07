<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends BD_Controller {
    
    function __construct()
    {

        parent::__construct();
        $this->auth();
        $this->load->model("schedules");
    }

    function getEvent_get(){
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $reserve = $this->schedules->getAllEventByMonth(null, $garageId);
        $data = [];
        $i = 0;
        foreach($reserve as $row) { 
            $data[$i] = [
                'title' => "#".$row->orderId." ".$row->plate,
                'plate' => $row->plate,
                'start' => $row->reserveDate.'T'.$row->reservetime,
                'color' => '#378006', // แก้สี  
                'orderId' => $row->orderId,
                'nameuser' => $row->nameuser
            ];
            $i++;
        }
        $option = [
            "data_check" => $data
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

}


