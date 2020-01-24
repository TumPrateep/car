<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Bill extends BD_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('bills');
    }

    public function search_post()
    {
        $columns = array(
            1 => 'transfer_time',
            2 => 'transfer_name',
            3 => 'amount',
        );
        $caraccessoriesId = $this->session->userdata['logged_in']['id'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->bills->allBillCaraccessories_count($caraccessoriesId);
        $totalFiltered = $totalData;
        $posts = $this->bills->allBillCaraccessories($limit, $start, $order, $dir, $caraccessoriesId);

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['billId'] = $post->billId;
                $nestedData['file_path'] = $post->file_path;
                $nestedData['amount'] = $post->amount;
                $nestedData['transfer_time'] = $post->transfer_time;
                $nestedData['transfer_name'] = $post->transfer_name;
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