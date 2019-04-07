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
        $data = $this->schedules->getorderdata($orderId);
        // $data = [];
        // for ($i=0; $i < 5; $i++) { 
        //     $data[$i] = [
        //         'title' => "test",
        //         'start' => '2019-04-17T13:13:55.008',
        //         'end' => '2019-04-19T13:13:55.008',
        //         'color' => '#378006'
        //     ];
        // }
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


