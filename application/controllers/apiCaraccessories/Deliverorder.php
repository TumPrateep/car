<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Deliverorder extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class  location
        parent::__construct();
        $this->auth();
        $this->load->model("deliverorders");
        $this->load->model("location");
    }

    public function searchorder_post()
    {
        $column = "	orderId";

        $sort = "asc";
        if ($this->post('column') == 3) {
            $column = "status";
        } else if ($this->post('column') == 2) {
            $sort = "desc";
        } else {
            $sort = "asc";
        }

        $userId = $this->session->userdata['logged_in']['id'];

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;
        $totalData = $this->deliverorders->allDeliverorders_count($userId);
        $totalFiltered = $totalData;
        $posts = $this->deliverorders->allDeliverorders($limit, $start, $order, $dir, $userId);
        $data = array();
        if (!empty($posts)) {
            $index = 0;
            $count = 0;
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['group'] = $post->group;
                $nestedData['productId'] = $post->productId;
                $nestedData['garageName'] = $post->garageName;
                $nestedData['product_price'] = $post->product_price;
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

    public function searchshoworder_post()
    {
        $column = "orderId";

        $sort = "asc";
        if ($this->post('column') == 3) {
            $column = "status";
        } else {
            $sort = "desc";
        }

        $userId = $this->session->userdata['logged_in']['id'];

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;
        $totalData = $this->deliverorders->allShoworders_count($userId);
        $totalFiltered = $totalData;
        $posts = $this->deliverorders->allShoworders($limit, $start, $order, $dir, $userId);
        $data = array();
        if (!empty($posts)) {
            $index = 0;
            $count = 0;
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['group'] = $post->group;
                $nestedData['productId'] = $post->productId;
                $nestedData['garageName'] = $post->garageName;
                $nestedData['product_price'] = $post->product_price;
                $nestedData['create_at'] = $post->create_at;
                $nestedData['statusActive'] = $post->statusSuccess;
                $nestedData['status'] = $post->status;
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

    public function searchrepatriateorder_post()
    {
        $column = "	orderId";

        $sort = "asc";
        if ($this->post('column') == 3) {
            $column = "status";
        } else if ($this->post('column') == 2) {
            $sort = "desc";
        } else {
            $sort = "asc";
        }

        $userId = $this->session->userdata['logged_in']['id'];

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;
        $totalData = $this->deliverorders->allRepatriateorder_count($userId);
        $totalFiltered = $totalData;
        $posts = $this->deliverorders->allRepatriateorder($limit, $start, $order, $dir, $userId);
        $data = array();
        if (!empty($posts)) {
            $index = 0;
            $count = 0;
            foreach ($posts as $post) {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['group'] = $post->group;
                $nestedData['productId'] = $post->productId;
                $nestedData['garageName'] = $post->garageName;
                $nestedData['costCaraccessories'] = $post->costCaraccessories;
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

    public function getexport_post()
    {
        // $garageId = $this->session->userdata['logged_in']['garageId'];
        $orderId = $this->post('orderId');
        $data_check = $this->deliverorders->getDeliverordersById($orderId);
        if ($data_check != null) {
            $data_check->provinceName = $this->location->getProvinceNameByProvinceId($data_check->provinceId);
            $data_check->districtName = $this->location->getDistrictNameByDistrictId($data_check->districtId);
            $data_check->subdistrictName = $this->location->getSubDistrictBySubDistrictId($data_check->subdistrictId);

            $data_check->carprovinceName = $this->location->getProvinceNameByProvinceId($data_check->carprovinceId);
            $data_check->cardistrictName = $this->location->getDistrictNameByDistrictId($data_check->cardistrictId);
            $data_check->carsubdistrictName = $this->location->getSubDistrictBySubDistrictId($data_check->carsubdistrictId);
        }
        $option = [
            "data_check" => $data_check,
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function getorder_get()
    {
        $lubricator_dataId = $this->get('lubricator_dataId');
        $data_check = $this->lubricatordatas->getupdate($lubricator_dataId);
        $option = [
            "data_check" => $data_check,
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function changeStatus_post()
    {
        $lubricator_dataId = $this->post("lubricator_dataId");
        $status = $this->post("status");
        if ($status == 1) {
            $status = 2;
        } else {
            $status = 1;
        }

        $data_check_update = $this->lubricatordatas->getlubricatorDatasById($lubricator_dataId);
        $data = array(
            'lubricator_dataId' => $lubricator_dataId,
            'status' => $status,
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->lubricatordatas,
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

    public function createtracking_post()
    {
        $orderId = $this->post('orderId');
        $time = $this->post('time');
        $dot = $this->post('dot');
        // $config['upload_path'] = 'public/image/deliverorder/';
        $userId = $this->session->userdata['logged_in']['id'];
        // $img = $this->post('picture_tracking');
        // $img = str_replace('data:image/png;base64,', '', $img);
        // $img = str_replace(' ', '+', $img);
        // $data = base64_decode($img);
        // $status = ('status');
        // $imageName = uniqid() . '.png';
        // $file = $config['upload_path'] . '/' . $imageName;
        // $success = file_put_contents($file, $data);

        $file = $_FILES["tracking"]["name"];
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $filename = null;
        $file_path = null;

        if (!empty($file)) {
            $config['upload_path'] = 'public/image/deliverorder/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $filename = uniqid() . '.' . $ext;
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('tracking')) {
                $success = true;
                $file_path = $config['upload_path'] . $filename;
            } else {
                $output["message"] = REST_Controller::MSG_ERROR;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }

        if ($success) {
            $data_check = $this->deliverorders->data_check_create($orderId);
            $data['numbertracking'] = array(
                "numbertrakingId" => null,
                "file_url" => $filename,
                "create_at" => date('Y-m-d H:i:s', time()),
                "create_by" => $userId,
                "update_at" => null,
                "update_by" => null,
                "status" => null,
                "orderId" => $orderId,
                "time" => $time,
            );
            $data['tire_dot'] = $dot;
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->deliverorders,
                "image_path" => $file_path,
            ];

            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

        }
    }
}