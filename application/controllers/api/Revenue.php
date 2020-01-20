<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Revenue extends BD_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('revenues');
    }

    public function search_post()
    {
        $columns = array(
            0 => 'order.orderId',
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->revenues->allData_count();

        $totalFiltered = $totalData;

        if (empty($this->post('status'))) {
            $posts = $this->revenues->allData($limit, $start, $order, $dir);
        } else {
            //     $search = $this->post('brandName');
            //     $status = $this->post('status');

            // $posts =  $this->brand->brand_search($limit,$start,$search,$order,$dir,$status);

            // $totalFiltered = $this->brand->brand_search_count($search,$status);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['price'] = $post->price;
                $nestedData['real_product_price'] = $post->real_product_price;
                $nestedData['profit_product_price'] = $post->product_price - $post->real_product_price;
                $nestedData['charge_price'] = $post->charge_price;
                $nestedData['delivery_price'] = $post->delivery_price;
                // $date = date_create($post->create_at);
                // $nestedData['create_at'] = date_format($date, "d/m/Y H:i");
                $nestedData['garage_service_price'] = $post->garage_service_price;
                $nestedData['profit_service_price'] = $post->carjaidee_service_price - $post->garage_service_price;
                $nestedData['profit'] = $post->charge_price + ($post->min_product_price - $post->real_product_price) + ($post->carjaidee_service_price - $post->garage_service_price);
                // $nestedData['data'] = getProductDetail($post->productId, $post->group);

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