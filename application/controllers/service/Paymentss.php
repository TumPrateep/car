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
        $bank_carjaidee = $this->payments->getฺBank($bankId);
        $orderId = $this->post("orderId");
        $date = $this->post("date");
        $time = $this->post("time");
        $bank = $this->post("bank");
        $money = $this->post("money");
        $transfer = $this->post("transfer");
        $paymentdetail = $this->payments-> getPaymentId($orderId);
        $config['upload_path'] = 'public/image/payment/';
        $img = $this->post("slip");
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);
        if (!$success){
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
        $data = array(
            'orderId' => $orderId,
            'bank_carjaidee' => $bank_carjaidee,
            'paymentId' => null,
            'created_by' =>$userId ,
            'date' => $date,
            'time' => $time,
            'created_at' => date('Y-m-d H:i:s',time()),
            'bank' => $bank,
            'transfer' => $transfer,
            'money' => $money,
            // 'slipimage' => NULL,
            'status' => 1,
            // 'activeflag' =>1
            "slip"=> $imageName
        );
      
        $option = [
            "data_check" => $paymentdetail,
            "data" => $data,
            "model" => $this->payments,
            "image_path" => $file
        ];
        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
        
    }

    function getCost_get(){
        $orderId = $this->get("orderId");
        $userId = $this->session->userdata['logged_in']['id'];
        $orderData = $this->payments-> getDepositflag($orderId);
        $depositflag = $orderData->depositflag;
        $costDelivery = $orderData->costDelivery;
        $orderdetail = $this->orderdetails->getSummaryCostFromOrderDetail($orderId, $userId);
        $output['depositflag'] = $depositflag;
        $output['totallm'] = $depositflag;
        $output['summary'] = calSummary($orderdetail->cost, $orderdetail->charge)+$costDelivery;
        $output['deposit'] = calDeposit($orderdetail->cost, $orderdetail->charge, $orderdetail->chargeGarage, $orderdetail->costCaraccessories);
        $this->set_response($output, REST_Controller::HTTP_OK);
    }  

 
}