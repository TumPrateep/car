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
        $this->load->model('bill_caraccessories_payment');
        $this->load->model('bill_garage_payment');
    }

    public function search_garage_post()
    {
        $columns = array(
            1 => 'transfer_time',
            2 => 'transfer_name',
            3 => 'amount',
        );
        $garageId = $this->post('garageId');
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

    public function search_caraccessories_post()
    {
        $columns = array(
            1 => 'transfer_time',
            2 => 'transfer_name',
            3 => 'amount',
        );
        $caraccessoriesId = $this->post('caraccessoriesId');
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

    public function search_caraccessories_order_post()
    {
        $start_date = $this->post('start_date');
        $end_date = $this->post('end_date');
        $userId = $this->post('userId');
        if (empty($end_date)) {
            $end_date = date("Y-m-d");
        }
        $data = $this->bills->getAllCaraccessoriesOrder($userId, $start_date, $end_date);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function search_garage_order_post()
    {
        $start_date = $this->post('start_date');
        $end_date = $this->post('end_date');
        $garageId = $this->post('garageId');
        if (empty($end_date)) {
            $end_date = date("Y-m-d");
        }
        $data = $this->bills->getAllGarageOrder($garageId, $start_date, $end_date);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function get_caraccessories_bill_by_id_get()
    {
        $billId = $this->get('billId');
        $data['bill'] = $this->bills->getCaraccessoriesBill($billId);
        $data['order'] = $this->bills->getCaraccessoriesBillById($billId);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function get_garage_bill_by_id_get()
    {
        $billId = $this->get('billId');
        $data['bill'] = $this->bills->getGarageBill($billId);
        $data['order'] = $this->bills->getGarageBillById($billId);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function create_bill_caraccessories_payment_post()
    {
        $caraccessoriesId = $this->post('userId');
        $order = $this->post('order');
        $quantity = $this->post('quantity');
        $amount = $this->post('amount');
        $total = $this->post('total');
        $transfer_time = $this->post('transfer_time_submit');
        $time = $this->post('time_submit');
        $transfer_price = $this->post('transfer_price');
        $transfer_name = $this->post('transfer_name');

        $config['upload_path'] = 'public/image/caraccessories_bill/';
        $img = $this->post("file_path");
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid() . '.png';
        $file = $config['upload_path'] . '/' . $imageName;
        $success = file_put_contents($file, $data);
        if (!$success) {
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

        $userId = $this->session->userdata['logged_in']['id'];

        $input['data'] = array(
            'caraccessoriesId' => $caraccessoriesId,
            'amount' => $transfer_price,
            'transfer_price' => $transfer_price,
            'transfer_name' => $transfer_name,
            'transfer_time' => $transfer_time . ' ' . $time,
            'create_at' => date('Y-m-d H:i:s', time()),
            'create_by' => $userId,
            "file_path" => $imageName,
        );

        $input['order'] = $order;
        $input['quantity'] = $quantity;
        $input['amount'] = $amount;

        $option = [
            "data_check" => null,
            "data" => $input,
            "model" => $this->bill_caraccessories_payment,
            "image_path" => $file,
        ];
        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

    }

    public function create_bill_garage_payment_post()
    {
        $garageId = $this->post('garageId');
        $order = $this->post('order');
        $quantity = $this->post('quantity');
        $amount = $this->post('amount');
        $delivery_price = $this->post('delivery_price');
        $total = $this->post('total');
        $transfer_time = $this->post('transfer_time_submit');
        $time = $this->post('time_submit');
        $transfer_price = $this->post('transfer_price');
        $transfer_name = $this->post('transfer_name');

        $config['upload_path'] = 'public/image/garage_bill/';
        $img = $this->post("file_path");
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid() . '.png';
        $file = $config['upload_path'] . '/' . $imageName;
        $success = file_put_contents($file, $data);
        if (!$success) {
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

        $userId = $this->session->userdata['logged_in']['id'];

        $input['data'] = array(
            'garageId' => $garageId,
            'amount' => $transfer_price,
            'transfer_price' => $transfer_price,
            'transfer_name' => $transfer_name,
            'transfer_time' => $transfer_time . ' ' . $time,
            'create_at' => date('Y-m-d H:i:s', time()),
            'create_by' => $userId,
            "file_path" => $imageName,
        );

        $input['order'] = $order;
        $input['quantity'] = $quantity;
        $input['amount'] = $amount;
        $input['delivery_price'] = $delivery_price;

        $option = [
            "data_check" => null,
            "data" => $input,
            "model" => $this->bill_garage_payment,
            "image_path" => $file,
        ];
        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

    }
}