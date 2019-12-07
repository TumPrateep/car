<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Orderdetail extends BD_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->auth();
        $this->load->model("orderdetails");
        $this->load->model("orders");
    }

    public function searchorder_post()
    {

        $columns = array(
            0 => null,
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $totalData = $this->orderdetails->allReceiveOrders_count($garageId);
        $totalFiltered = $totalData;
        $posts = $this->orderdetails->allReceiveOrders($limit, $start, $order, $dir, $garageId);

        $data = array();
        if (!empty($posts)) {
            $index = 0;
            $count = 0;
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['orderDetailId'] = $post->orderDetailId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['group'] = $post->group;
                $nestedData['status'] = $post->status;
                $nestedData['productId'] = $post->productId;
                $nestedData['cost'] = $this->orders->getGarageCharge($post->productId, $post->group);
                $nestedData['data'] = getProductDetail($post->productId, $post->group);

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

    public function searchreturnorder_post()
    {

        $columns = array(
            0 => null,
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $totalData = $this->orderdetails->allreturnorders_count($garageId);
        $totalFiltered = $totalData;
        $posts = $this->orderdetails->allreturnorders($limit, $start, $order, $dir, $garageId);

        $data = array();
        if (!empty($posts)) {
            $index = 0;
            $count = 0;
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['orderDetailId'] = $post->orderDetailId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['group'] = $post->group;
                $nestedData['status'] = $post->status;
                $nestedData['productId'] = $post->productId;
                $nestedData['cost'] = $this->orders->getGarageCharge($post->productId, $post->group);
                $nestedData['data'] = getProductDetail($post->productId, $post->group);

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

    public function searceffort_post()
    {

        $columns = array(
            0 => null,
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $totalData = $this->orderdetails->alleffort_count($garageId);
        $totalFiltered = $totalData;
        $posts = $this->orderdetails->alleffort($limit, $start, $order, $dir, $garageId);

        $data = array();
        if (!empty($posts)) {
            $index = 0;
            $count = 0;
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['orderDetailId'] = $post->orderDetailId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['group'] = $post->group;
                $nestedData['status'] = $post->status;
                $nestedData['productId'] = $post->productId;
                $nestedData['cost'] = $this->orders->getGarageCharge($post->productId, $post->group);
                $nestedData['data'] = getProductDetail($post->productId, $post->group);

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

    public function getuserdata_post()
    {
        // $garageId = $this->session->userdata['logged_in']['garageId'];
        $orderId = $this->post('orderId');
        $data_check = $this->orderdetails->getorderdata($orderId);
        $option = [
            "data_check" => $data_check,
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function changeStatus_get()
    {
        $orderDetailId = $this->get("orderDetailId");
        $status = $this->get("status");
        $data = array(
            'orderDetailId' => $orderDetailId,
            'status' => $status,

        );
        // $data_check_create = $this->orderdetails->getorderDetailById($orderDetailId);

        $option = [
            "data_check" => null,
            "data" => $data,
            "model" => $this->orderdetails,
            "image_path" => null,
        ];
        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

}