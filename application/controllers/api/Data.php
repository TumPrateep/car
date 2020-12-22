<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('tiredatas');
    }

    function tire_search_post(){
        $columns = array(
            1 => 'tire_brandName',
            2 => 'price',
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $userId = $this->post('userId');

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
                $nestedData['userId'] = $post->car_accessoriesId;

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

    function save_tireimport_post(){
        $csvData = $this->post('csvData');
        $data = [];
        foreach ($csvData as $i => $row) {            
            $data[] = array(
                'tire_dataId' => !empty($row[1]) ? $row[1] : '',
                'price' => !empty($row[3]) ? $row[3] : '',
            );
        }

        $result = $this->tiredatas->import($data);

        if ($result) {
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $output["result"] = $result;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_NOT_UPDATE;
            $output["data"] = $data;
            $this->set_response($output, REST_Controller::HTTP_CONFLICT);
        }
    }

}