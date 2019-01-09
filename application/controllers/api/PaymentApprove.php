<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class PaymentApprove extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('paymentapproves');
    }

    function searchPaymentApprove_post(){
        $columns = array( 
            0 => null,
            1 => 'order.orderId'
        

        );
        // $garageId = $this->session->userdata['logged_in']['garageId'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->paymentapproves->allPaymentApprove_count(); 
        $totalFiltered = $totalData; 
        if(empty($this->post('orderId')))
        {            
            $posts = $this->paymentapproves->allPaymentApprove($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('orderId');
            $posts =  $this->paymentapproves->PaymentApprove_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->paymentapproves->PaymentApprove_search($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['name'] = $post->name;
                $nestedData['money'] = $post->money;
                $nestedData['slip'] = $post->slip;
                $nestedData['status'] = $post->status;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($this->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            
        );
        $this->set_response($json_data);
    }

    function changeStatus_post(){
        $paymentId = $this->post("paymentId");
        $status = $this->post("status");
        $data = array(
            'paymentId' => $paymentId,
            'status' => $status,
            'activeFlag' => 1
        );
        $data_check_update = $this->paymentapproves->getPaymentApproveById($paymentId);

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->paymentapproves
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }



}