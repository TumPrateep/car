<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Promote extends BD_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->auth();
        $this->load->model("promotes");
    }

    public function createpromote_post()
    {
        // $promoteId = $this->post('promoteId');
        // $time = $this->post('time');
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
        $success = false;

        $file = $_FILES["image_url"]["name"];
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $filename = null;
        $file_path = null;

        if (!empty($file)) {
            $config['upload_path'] = 'public/image/promote/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $filename = uniqid() . '.' . $ext;
            $config['file_name'] = $filename;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image_url')) {
                $success = true;
                $file_path = $config['upload_path'] . $filename;
            } else {
                $output["message"] = REST_Controller::MSG_ERROR;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }

        if ($success) {
            $data_check = null;
            $data = array(
                // "promoteId" => $promoteId,
                "image_url" => $filename,
                "create_at" => date('Y-m-d H:i:s', time()),
                "create_by" => $userId,
                "update_at" => null,
                "update_by" => null,
                "status" => 1,
                
            );
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->promotes,
                "image_path" => $file_path,
            ];

            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

        }
    }

    public function searchorder_post()
    {
        $column = "promoteId";

        $sort = "asc";
        if ($this->post('column') == 3) {
            $column = "status";
        } else if ($this->post('column') == 2) {
            $sort = "desc";
        } else {
            $sort = "asc";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;
        $totalData = $this->promotes->allPromotes_count();
        $totalFiltered = $totalData;
        $posts = $this->promotes->allPromotes($limit, $start, $order, $dir);
        $data = array();
        if (!empty($posts)) {
            $index = 0;
            $count = 0;
            foreach ($posts as $post) {
                $nestedData['promoteId'] = $post->promoteId;
                $nestedData['image_url'] = $post->image_url;
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

    function deletePromote_get(){
        $promoteId = $this->get('promoteId');
        $image_part = 'public/image/promote/';

        $data_check = $this->promotes->getPromoteById($promoteId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $promoteId,
            "model" => $this->promotes,
            "image_path" => $image_part.$data_check->image_url
        ];  
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $promoteId = $this->post("promoteId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->promotes->getPromoteById($promoteId);

        $data = array(
            'promoteId' => $promoteId,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->promotes
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }
        
}