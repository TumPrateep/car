<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Paymentapprove extends BD_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('paymentapproves');
        $this->load->model('orderdetails');
    }

    public function searchPaymentApprove_post()
    {
        $columns = array(
            0 => null,
            1 => 'order.orderId',

        );
        // $garageId = $this->session->userdata['logged_in']['garageId'];
        $userId = $this->session->userdata['logged_in']['id'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->paymentapproves->allPaymentApprove_count();

        $totalFiltered = $totalData;
        if (empty($this->post('orderId'))) {
            $posts = $this->paymentapproves->allPaymentApprove($limit, $start, $order, $dir);
        } else {
            $search = $this->post('orderId');
            $status = null;
            $posts = $this->paymentapproves->PaymentApprove_search($limit, $start, $search, $order, $dir, $status);
            $totalFiltered = $this->paymentapproves->PaymentApprove_search($search, $status);
        }
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['name'] = $post->name;
                // $nestedData['depositflag'] = $post->depositflag;
                $nestedData['summary'] = $this->orderdetails->getSummaryCostFromOrderDetail($post->orderId, $userId);
                // $nestedData['summary'] = calSummary($orderdetail->cost, $orderdetail->charge);
                // $nestedData['deposit'] = calDeposit($orderdetail->cost, $orderdetail->charge, $orderdetail->chargeGarage, $orderdetail->costCaraccessories);
                // $nestedData['costDelivery'] = $this->orderdetails->getSummarycostDelivery($post->orderId);
                $nestedData['slip'] = $post->slip;
                $nestedData['status'] = $post->status;
                $nestedData['statusActive'] = $post->statusSuccess;
                $nestedData['paymentId'] = $post->paymentId;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($this->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,

        );
        $this->set_response($json_data);
    }

    public function changeStatus_get()
    {
        $paymentId = $this->get("paymentId");
        $status = $this->get("status");
        $orderId = $this->get("orderId");
        $userId = $this->session->userdata['logged_in']['id'];

        $data = array(
            'paymentId' => $paymentId,
            'orderId' => $orderId,
            'status' => $status,
        );
        $data_check_update = $this->paymentapproves->getPaymentApproveById($paymentId);

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->paymentapproves,
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}