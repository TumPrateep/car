<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Paymentss extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('payments');
        $this->load->model('orderdetails');
    }

    function createPaymentDetail_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $data = array();
        $paymentId = $this->post("orderId");
        $date = $this->post("date");
        $time = $this->post("time");
        $bank = $this->post("bank");
        $transfer = $this->post("transfer");
        $paymentdetail = $this->payments-> getPaymentId($paymentId);
       
        $data = array(
            'order_orderId' => $paymentId,
            'paymentId' => null,
            'create_by' =>$userId ,
            'date' => $date,
            'time' => $time,
            'create_at' => date('Y-m-d H:i:s',time()),
            'bank' => $bank,
            'transfer' => $transfer,
            'slipimage' => NULL,
            'status' => 1,
            'activeflag' =>1
        );

      
        $option = [
            "data_check" => $paymentdetail,
            "data" => $data,
            "model" => $this->payments,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
        
    }

    function getCost_get(){
        $orderId = $this->get("orderId");
        $userId = $this->session->userdata['logged_in']['id'];
        $orderdetail = $this->orderdetails->getSummaryCostFromOrderDetail($orderId, $userId);
        $output['summary'] = calSummary($orderdetail->cost, $orderdetail->charge);
        $output['deposit'] = calDeposit($orderdetail->cost, $orderdetail->charge, $orderdetail->chargeGarage);
        $this->set_response($output, REST_Controller::HTTP_OK);
    } 

   
}