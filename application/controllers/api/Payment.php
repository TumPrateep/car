<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Payment extends BD_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('payments');
        $this->load->model('orderdetails');
    }

    public function searchManagepartsshopPaymentApprove_post()
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

        $car_accessoriesId = $this->post('userId');
        $totalData = $this->payments->allManagepartsshopPaymentApprove_count($car_accessoriesId);

        $totalFiltered = $totalData;
        if (empty($this->post('orderId'))) {
            $posts = $this->payments->allManagepartsshopPaymentApprove($limit, $start, $order, $dir, $car_accessoriesId);
        } else {
            $search = $this->post('orderId');
            $status = null;
            $posts = $this->payments->ManagepartsshopPaymentApprove_search($limit, $start, $search, $order, $dir, $status, $car_accessoriesId);
            $totalFiltered = $this->payments->ManagepartsshopPaymentApprove_search_count($search, $status, $car_accessoriesId);
        }
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['summary'] = $post->real_product_price;
                $nestedData['payment_status'] = $post->payment_status;
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

    public function searchGaragesmanagement_post()
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

        $garageId = $this->post('garageId');
        $totalData = $this->payments->allGaragesmanagement_count($garageId);

        $totalFiltered = $totalData;
        if (empty($this->post('orderId'))) {
            $posts = $this->payments->allGaragesmanagement($limit, $start, $order, $dir, $garageId);
        } else {
            $search = $this->post('orderId');
            $status = null;
            $posts = $this->payments->Garagesmanagement_search($limit, $start, $search, $order, $dir, $status, $garageId);
            $totalFiltered = $this->payments->Garagesmanagement_search_count($search, $status, $garageId);
        }
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['summary'] = $post->garage_service_price * $post->quantity ;
                $nestedData['payment_status'] = $post->payment_status;
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

}