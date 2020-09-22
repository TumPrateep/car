<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Lubricatorpicture extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatorpictures");
        $this->load->model("lubricatorbrands");
        $this->load->model("lubricators");
    }

    public function create_post()
    {
        $lubricatorId = $this->post("lubricatorId");

        $userId = $this->session->userdata['logged_in']['id'];

        $config['upload_path'] = 'public/image/lubricatorproduct/';
        $img = $this->post("picture");
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid() . '.png';
        $file = $config['upload_path'] . '/' . $imageName;
        $success = file_put_contents($file, $data);

        if (!$success) {
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {
            $data_check = $this->lubricatorpictures->data_check_create($lubricatorId);
            $data = array(
                "lubricator_id" => $lubricatorId,
                "picture" => $imageName,
                "status" => 1,
                "create_at" => date('Y-m-d H:i:s', time()),
                "create_by" => $userId,
            );

            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->lubricatorpictures,
                "image_path" => $file,
            ];

            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

        }

    }

    public function getAllLubricatorBrand_get()
    {
        $result = $this->lubricatorbrands->getAllLubricatorBrand();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getAllLubricator_get()
    {
        $lubricator_brandId = $this->get("lubricator_brandId");
        $machine_id = $this->get("machine_id");

        $result = $this->lubricators->getAllLubricatorByBrandAndMachine($lubricator_brandId, $machine_id);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function search_post()
    {
        $columns = array(
            0 => null,
            1 => null,
            2 => 'lubricator_brand.lubricator_brandName',
            3 => 'lubricator.lubricatorName',
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->lubricatorpictures->allData_count();

        $totalFiltered = $totalData;

        // if (empty($this->post('status'))) {
            $posts = $this->lubricatorpictures->allData($limit, $start, $order, $dir);
        // } else {
            //     $search = $this->post('brandName');
            //     $status = $this->post('status');

            //     $posts =  $this->brand->brand_search($limit,$start,$search,$order,$dir,$status);

            //     $totalFiltered = $this->brand->brand_search_count($search,$status);
        // }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['productId'] = $post->productId;
                $nestedData['lubricator_brandName'] = $post->lubricator_brandName;
                $nestedData['lubricatorName'] = $post->lubricatorName;
                $nestedData['capacity'] = $post->capacity;
                $nestedData['lubricator_number'] = $post->lubricator_number;
                $nestedData['capacity'] = $post->capacity;
                $nestedData['api'] = $post->api;
                $nestedData['machine_type'] = $post->machine_type;
                $nestedData['status'] = $post->status;
                $nestedData['picture'] = $post->picture;
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

    public function delete_get()
    {
        $productId = $this->get('productId');
        $data_check = $this->lubricatorpictures->getProductDataById($productId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $productId,
            "model" => $this->lubricatorpictures,
            "image_path" => "public/image/lubricatorproduct/" . $data_check->picture,
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    public function getUpdate_post()
    {
        $productId = $this->post('productId');
        $data_check = $this->lubricatorpictures->getUpdate($productId);

        $option = [
            "data_check" => $data_check,
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post()
    {
        $productId = $this->post('productId');
        $lubricatorId = $this->post("lubricatorId");

        $config['upload_path'] = 'public/image/lubricatorproduct/';
        $img = $this->post("picture");
        $file = null;
        $success = true;
        $imageName = null;
        $userId = $this->session->userdata['logged_in']['id'];
        if (!empty($img)) {
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            $imageName = uniqid() . '.png';
            $file = $config['upload_path'] . '/' . $imageName;
            $success = file_put_contents($file, $data);
        }
        if (!$success) {
            unlink($file);
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {
            $data_check_update = $this->lubricatorpictures->getProductDataById($productId);
            $data_check = $this->lubricatorpictures->data_check_update($productId, $lubricatorId);

            $data = array(
                'productId' => $productId,
                "lubricator_id" => $lubricatorId,
                'picture' => $imageName,
                'update_by' => $userId,
                'update_at' => date('Y-m-d H:i:s', time()),
            );
            $oldImage = null;
            if ($data_check_update != null) {
                $oldImage = $config['upload_path'] . $data_check_update->picture;
            }

            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->lubricatorpictures,
                "image_path" => $file,
                "old_image_path" => $oldImage,
            ];

            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }
    }

    public function changeStatus_post()
    {
        $productId = $this->post("productId");
        $status = $this->post("status");
        if ($status == 1) {
            $status = 2;
        } else {
            $status = 1;
        }

        $data_check_update = $this->lubricatorpictures->getProductDataById($productId);
        $data = array(
            'productId' => $productId,
            'status' => $status,
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->lubricatorpictures,
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}