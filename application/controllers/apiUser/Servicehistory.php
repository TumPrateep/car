<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Servicehistory extends BD_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('servicehistorys');
    }

    public function servicehistory_post()
    {
        $columns = array(
            1 => 'order.orderId',
            2 => 'reserve.reserveDate',
        );
        // $garageId = $this->session->userdata['logged_in']['garageId'];

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->servicehistorys->getservicehistory_count();
        $totalFiltered = $totalData;

        $posts = $this->servicehistorys->getservicehistory($limit, $start, $order, $dir);
        // var_dump($posts);
        // exit();
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['reserveDate'] = $post->reserveDate;
                $nestedData['reservetime'] = $post->reservetime;
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
        $reserveId = $this->get("reserveId");
        $status = $this->get("status");
        $orderId = $this->get("orderId");
        $data = array(
            'reserveId' => $reserveId,
            'status' => $status,
            'orderId' => $orderId,
        );
        $data_check_update = $this->reserves->getReserveById($reserveId);

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->reserves,
        ];
        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}