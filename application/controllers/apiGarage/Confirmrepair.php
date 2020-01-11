<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Confirmrepair extends BD_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('confirmrepairs');
    }

    public function searchAccessstatus_post()
    {
        $columns = array(
            0 => null,
            1 => 'order.orderId',
        );
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $status = $this->post('status');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->confirmrepairs->allaccessstatuss_count($garageId, $status);
        $totalFiltered = $totalData;
        // if (empty($this->post('date,reservename,status'))) {
        $posts = $this->confirmrepairs->allaccessstatuss($limit, $start, $order, $dir, $garageId, $status);
        
        // } else {
        //     $search = $this->post('date,reservename,status');
        //     $posts = $this->confirmrepairs->accessstatuss_search($limit, $start, $search, $order, $dir, $status, $garageId);
        //     $totalFiltered = $this->confirmrepairs->accessstatuss_search($search, $status, $garageId);
        // }
        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['name'] = $post->name;
                $nestedData['reserveId'] = $post->reserveId;
                // $nestedData['garageId'] = $post->garageId;
                $nestedData['orderId'] = $post->orderId;
                $nestedData['reserveDate'] = $post->reserveDate;

                $date = date_create($post->reservetime);
                $post->reservetime = date_format($date, "H:i");
                $nestedData['reservetime'] = $post->reservetime;
                $nestedData['userId'] = $post->userId;
                $nestedData['status'] = $post->status;
                $nestedData['statusSuccess'] = $post->statusSuccess;
                $nestedData['car_profileId'] = $post->car_profileId;
                // $nestedData['mileage'] = $post->mileage;

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

    // function changeStatus_get(){

    //     $status = $this->get("status");
    //     $orderId = $this->get("orderId");
    //     $data = array(

    //         'orderId' => $orderId,
    //         'statusSuccess' => $status
    //     );
    //     $data_check_update = $this->accessstatuss->getOrderById($orderId);

    //     $option = [
    //         "data_check_update" => $data_check_update,
    //         "data" => $data,
    //         "model" => $this->accessstatuss
    //     ];
    //     $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    // }

    public function update_post()
    {
        // $userId = $this->session->userdata['logged_in']['id'];
        $orderId = $this->post('orderId');
        // $car_profileId = $this->post('car_profileId');
        $mileage_carprofile = $this->post('mileage_carprofile');
        $garageId = $this->session->userdata['logged_in']['garageId'];

        $data_check_update = $this->confirmrepairs->getOrderById($orderId);
        $data_check = null;

        $data['order'] = array(
            'orderId' => $orderId,
            'mileage_carprofile' => $mileage_carprofile,
            'statusSuccess' => 2,
            'status' => 6,
        );

        $data['car_profile'] = array(
            'car_profileId' => $data_check_update->car_profileId,
            'mileage' => $mileage_carprofile,
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->confirmrepairs,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

}