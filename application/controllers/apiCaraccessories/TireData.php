<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') or exit('No direct script access allowed');
class Tiredata extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model("tiredatas");
    }
    public function delete_get()
    {
        $tire_dataId = $this->get('tire_dataId');
        $data_check = $this->tiredatas->getTireDatasbyId($tire_dataId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $tire_dataId,
            "model" => $this->tiredatas,
            "image_path" => null,
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);

    }

    public function create_post()
    {
        $rimId = $this->post('rimId');
        $tire_sizeId = $this->post('tireSizeId');
        $tire_brandId = $this->post('tireBrandId');
        $tire_modelId = $this->post('tireModelId');
        $price = $this->post('price');
        $warranty = $this->post('warranty');
        $warranty_year = $this->post('warranty_year');
        $warranty_distance = $this->post('warranty_distance');

        // $can_change = $this->post('can_change');
        $userId = $this->session->userdata['logged_in']['id'];
        $car_accessoriesId = $userId;

        // $data_check = $this->tiredatas->data_check_create($tire_brandId,$tire_modelId,$tire_sizeId,$rimId,$car_accessoriesId);
        //  บันทึกยกชุด หมุนอาเรเอา
        $data = [
            'tire_sizeId' => $tire_sizeId,
            'price' => $price,
            'warranty' => $warranty,
            'warranty_year' => $warranty_year,
            'warranty_distance' => $warranty_distance,
            'warranty' => $warranty,
        ];
//$data['model']  model แค่ชื่อ index เฉย
        $data['model'] = array(
            'tire_brandId' => $tire_brandId,
            'tire_modelId' => $tire_modelId,
            'rimId' => $rimId,
            'car_accessoriesId' => $car_accessoriesId,
            'status' => 1,
            'activeFlag' => 1,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s', time()),
        );
        $option = [
            "data_check" => null,
            "data" => $data,
            "model" => $this->tiredatas,
            "image_path" => null,
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

    }

    public function update_post()
    {
        $tire_dataId = $this->post('tire_dataId');
        $rimId = $this->post('rimId');
        $tire_sizeId = $this->post('tire_sizeId');
        $tire_brandId = $this->post('tire_brandId');
        $tire_modelId = $this->post('tire_modelId');
        $price = $this->post('price');
        $warranty = $this->post('warranty');
        $warranty_year = $this->post('warranty_year');
        $warranty_distance = $this->post('warranty_distance');
        $can_change = $this->post('can_change');
        $userId = $this->session->userdata['logged_in']['id'];
        $car_accessoriesId = $userId;
        // $config['upload_path'] = 'public/image/tirebranddata/';

        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        // $config['overwrite'] = TRUE;
        // $config['encrypt_name'] = TRUE;
        // $config['remove_spaces'] = TRUE;
        // $this->load->library('upload', $config);

        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->tiredatas->getTireDatasbyId($tire_dataId);
        $data_check = $this->tiredatas->data_check_update($tire_brandId, $tire_modelId, $tire_sizeId, $rimId, $car_accessoriesId, $tire_dataId);
        $data = array(
            'tire_dataId' => $tire_dataId,
            'tire_brandId' => $tire_brandId,
            'tire_modelId' => $tire_modelId,
            'tire_sizeId' => $tire_sizeId,
            'rimId' => $rimId,
            'car_accessoriesId' => $car_accessoriesId,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s', time()),
            'price' => $price,
            'warranty' => $warranty,
            'warranty_year' => $warranty_year,
            'warranty_distance' => $warranty_distance,
            'warranty' => $warranty,
            'can_change' => $can_change,
            // 'tire_picture' => $imageName
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tiredatas,
            "image_path" => null,
            "old_image_path" => null,
        ];
        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);

    }

    public function getTireData_get()
    {
        $tire_dataId = $this->get('tire_dataId');
        $data_check = $this->tiredatas->getUpdate($tire_dataId);
        $option = [
            "data_check" => $data_check,
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function search_post()
    {
        $columns = array(
            0 => 'tire_brandName',
            1 => 'tire_modelName',
            2 => 'tire_size',
            3 => 'price',
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $userId = $this->session->userdata['logged_in']['id'];

        $totalData = $this->tiredatas->allTire_count($userId);
        $totalFiltered = $totalData;
        if (empty($this->post('tire_brandId')) && empty($this->post('tire_modelId')) && empty($this->post('tire_size'))) {
            $posts = $this->tiredatas->allTires($limit, $start, $order, $dir, $userId);
        } else {
            // $search = $this->post('brandName');
            $tire_brandId = $this->post('tire_brandId');
            $tire_modelId = $this->post('tire_modelId');
            $tire_size = $this->post('tire_size');

            $status = null;
            $posts = $this->tiredatas->tireData_search($limit, $start, $order, $dir, $tire_brandId, $tire_modelId, $tire_size, $userId);

            $totalFiltered = $this->tiredatas->TireDatas_search_count($tire_brandId, $tire_modelId, $tire_size, $userId);
        }

        $data = array();
        if (!empty($posts)) {
            $count = 0;
            foreach ($posts as $post) {

                $nestedData['tire_dataId'] = $post->tire_dataId;
                $nestedData['rimName'] = $post->rimName;
                $nestedData['tire_size'] = $post->tire_size;
                $nestedData['tire_modelName'] = $post->tire_modelName;
                $nestedData['tire_brandName'] = $post->tire_brandName;
                $nestedData['status'] = $post->status;
                $nestedData['price'] = $post->price;
                $nestedData['warranty_year'] = $post->warranty_year;
                $nestedData['can_change'] = $post->can_change;
                $nestedData['warranty_distance'] = $post->warranty_distance;
                $nestedData['activeFlag'] = $post->activeFlag;
                $nestedData['create_by'] = $post->create_by;
                $nestedData['warranty'] = $post->warranty;
                $nestedData['tire_picture'] = $post->tire_picture;
                $nestedData['tire_brandPicture'] = $post->tire_brandPicture;

                // $option = [
                //     'tire_brandId' => $post->tire_brandId,
                //     'tire_modelId' => $post->tire_modelId,
                //     'tire_sizeId' => $post->tire_sizeId,
                //     'rimId' => $post->rimId
                // ];
                // $nestedData['picture'] = getPictureTire($option);
                $data[$count] = $nestedData;
                $count++;

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
        $tire_dataId = $this->post("tire_dataId");
        $status = $this->post("status");
        if ($status == 1) {
            $status = 2;
        } else {
            $status = 1;
        }

        $data_check_update = $this->tiredatas->getTireDatasbyId($tire_dataId);
        $data = array(
            'tire_dataId' => $tire_dataId,
            'status' => $status,
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->tiredatas,
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}