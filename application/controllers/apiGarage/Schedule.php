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
                'name' => "test test"
            ];
            $i++;
        }
        $option = [
            "data_check" => $data
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }


    // function changeStatus_get(){
    //     $orderDetailId = $this->get("orderDetailId");
    //     $status = $this->get("status");
    //     $data = array(
    //         'orderDetailId' => $orderDetailId,
    //         'status' => $status
          
    //     );
    //     $data_check_update = $this->orderdetails->getorderDetailById($orderDetailId);

    //     $option = [
    //         "data_check_update" => $data_check_update,
    //         "data" => $data,
    //         "model" => $this->orderdetails
    //     ];
    //     $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    // }

}


