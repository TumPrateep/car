<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Orderselect extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("orderselects");
        $this->load->model("orders");
    }

    public function search_post()
    {
        $columns = array(
            0 => null,
            1 => null,
            2 => 'order.orderId',
            3 => 'orderdetail.quantity',
            4 => 'reserve.garageId',
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->orderselects->allData_count();

        $totalFiltered = $totalData;

        if (empty($this->post('status'))) {
            $posts = $this->orderselects->allData($limit, $start, $order, $dir);
        } else {
            //     $search = $this->post('brandName');
            //     $status = $this->post('status');

            //     $posts =  $this->brand->brand_search($limit,$start,$search,$order,$dir,$status);

            //     $totalFiltered = $this->brand->brand_search_count($search,$status);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['group'] = $post->group;
                $nestedData['productId'] = $post->productId;
                $nestedData['garageName'] = $post->garageName;
                $nestedData['status'] = $post->status;
                // $nestedData['picture'] = $post->picture;
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

    public function changeStatus_post()
    {
        $orderId = $this->post("orderId");
        $status = $this->post("status");
        if ($status == 3) {
            $status = 4;
        } else {
            $status = 3;
        }

        $data_check_update = $this->orderselects->getOrderDataById($orderId);
        $data = array(
            'orderId' => $orderId,
            'status' => $status,
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->orders,
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}