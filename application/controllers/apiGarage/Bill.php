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
        $this->load->model('bill_garage_payment');
    }

    public function search_post()
    {
        $columns = array(
            1 => 'transfer_time',
            2 => 'transfer_name',
            3 => 'amount',
        );
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->bills->allBillGarage_count($garageId);
        $totalFiltered = $totalData;
        $posts = $this->bills->allBillGarage($limit, $start, $order, $dir, $garageId);

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['billId'] = $post->billId;
                $nestedData['file_path'] = $post->file_path;
                $nestedData['amount'] = $post->amount;
                $nestedData['transfer_time'] = $post->transfer_time;
                $nestedData['transfer_name'] = $post->transfer_name;
                $nestedData['status'] = $post->status;
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
        $billId = $this->get("billId");
        $status = $this->get("status");

        $data_check_update = $this->bills->getGarageBill($billId);
        $data = array(
            'billId' => $billId,
            'status' => $status,
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->bill_garage_payment,
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }
}