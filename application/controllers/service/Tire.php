<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tire extends BD_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model("tireproduct");
        $this->load->model("triebrands");
        $this->load->model("triemodels");
        $this->load->model("triesizes");
        $this->load->model("rims");
        $this->load->model("brand");
        $this->load->model("model");
        $this->load->model('modelofcars');
        $this->load->model('tirematch');
        $this->load->model('prices');
    }

    public function search_post()
    {
        $column = "tire_dataId";
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

        $totalData = $this->tireproduct->allTire_count();
        $totalFiltered = $totalData;

        $tire_sizeId = $this->post('tire_sizeId');
        $tire_size = [];

        if (!empty($this->post('brandId')) && !empty($this->post('modelofcarId'))) {
            $modelofcarId = $this->post('modelofcarId');
            $tire_sizeData = $this->tirematch->getTireSizeByModelOfCarId($modelofcarId);
            $tire_sizeId = [];
            foreach ($tire_sizeData as $i => $v) {
                $tire_sizeId[] = $v->tire_sizeId;
            }

            if (count($tire_sizeId) > 0) {
                $posts = $this->tireproduct->tireDataByTireSize_search($limit, $start, $order, $dir, $tire_sizeId);
                $totalFiltered = $this->tireproduct->tireDataByTireSize_search_count($tire_sizeId);
            } else {
                $posts = [];
                $totalFiltered = 0;
            }
        } else {
            $tire_brandId = $this->post('tire_brandId');
            $tire_modelId = $this->post('tire_modelId');
            $rimId = $this->post('rimId');

            if (!empty($tire_sizeId)) {
                $tire_size[] = $tire_sizeId;
            } else {
                $brandId = $this->post('brandId');
                $modelName = $this->post('model_name');
                $year = $this->post('year');
                $modelId = $this->post('modelId');
                $tire_sizeData = $this->tirematch->getTireSize($brandId, $modelName, $year, $modelId);
                foreach ($tire_sizeData as $i => $v) {
                    $tire_size[] = $v->tire_sizeId;
                }
            }

            $posts = $this->tireproduct->tireDataByTireSize_search($limit, $start, $order, $dir, $tire_size, $tire_brandId, $tire_modelId, $rimId);
            $totalFiltered = $this->tireproduct->tireDataByTireSize_search_count($tire_size, $tire_brandId, $tire_modelId, $rimId);

        }

        if ($totalFiltered == 0) {
            $posts = $this->tireproduct->tireDataByTireSize_search($limit, $start, $order, $dir, $tire_size, null, null, null);
            $totalFiltered = $this->tireproduct->tireDataByTireSize_search_count($tire_size, null, null, null);
        }

        $nestedData = array();
        if (!empty($posts)) {
            // $index = 0;
            $count = 0;
            foreach ($posts as $post) {
                $tire_change_data = $this->prices->getPriceFromGarageByRimId($post->rimId);
                $garage_price = 50;
                if (!empty($tire_change_data)) {
                    $garage_price += $tire_change_data->tire_price;
                }

                $carjaidee_change_data = $this->prices->getPriceCarjaidee($post->rimId, $post->tire_sizeId);
                $carjaidee_price = 0;
                if (!empty($carjaidee_change_data)) {
                    $carjaidee_price = $carjaidee_change_data->price;
                    if ($carjaidee_change_data->unit_id == 1) {
                        $carjaidee_price = $post->price * $carjaidee_change_data->price / 100;
                    }
                }

                $tire_service_data = $this->prices->getPriceService($post->rimId);
                $service_price = $tire_service_data->price;

                $nestedData[$count]['tire_dataId'] = $post->tire_dataId;
                $nestedData[$count]['rimName'] = $post->rimName;
                $nestedData[$count]['tire_size'] = $post->tire_size;
                $nestedData[$count]['tire_modelName'] = $post->tire_modelName;
                $nestedData[$count]['tire_brandName'] = $post->tire_brandName;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['price'] = $post->price + $garage_price + $carjaidee_price + $service_price;
                $nestedData[$count]['warranty_year'] = $post->warranty_year;
                $nestedData[$count]['can_change'] = $post->can_change;
                $nestedData[$count]['warranty_distance'] = $post->warranty_distance;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
                $nestedData[$count]['warranty'] = $post->warranty;
                $nestedData[$count]['tire_picture'] = $post->tire_picture;
                $nestedData[$count]['tire_brandPicture'] = $post->tire_brandPicture;
                $nestedData[$count]['tire_brandId'] = $post->tire_brandId;
                $nestedData[$count]['tire_modelId'] = $post->tire_modelId;
                $nestedData[$count]['tire_sizeId'] = $post->tire_sizeId;

                $option = [
                    'tire_brandId' => $post->tire_brandId,
                    'tire_modelId' => $post->tire_modelId,
                    'tire_sizeId' => $post->tire_sizeId,
                    'rimId' => $post->rimId,
                ];
                $nestedData[$count]['picture'] = getPictureTire($option);

                // $data[$index] = $nestedData;
                // if($count >= 3){
                //     $count = -1;
                //     $index++;
                //     $nestedData = [];
                // }

                $count++;

            }
        }

        $json_data = array(
            "draw" => intval($this->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $nestedData,
        );

        $this->set_response($json_data);

    }
    public function getAllTireBrand_get()
    {

        $result = $this->triebrands->getAllTriebrands();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getAllTireModel_get()
    {
        $tire_brandId = $this->get("tire_brandId");

        $result = $this->triemodels->getAllTireModelByTireBrandId($tire_brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getAllTireSize_get()
    {
        $rimId = $this->get("rimId");

        $result = $this->triesizes->getAllTireSizeByrimId($rimId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    public function getAllTireRims_get()
    {

        $result = $this->rims->getAllRims();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getAllBrand_get()
    {
        $result = $this->tirematch->getAllBrandforSelect();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    public function getAllmodel_get()
    {
        $brandId = $this->get('brandId');
        $result = $this->tirematch->getAllmodelforSelect($brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getAllModelofcar_get()
    {
        $modelId = $this->get('modelId');
        $result = $this->tirematch->getAllmodelofcarforSelect($modelId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getAllYear_get()
    {
        $modelId = $this->get("modelId");
        $result = $this->tirematch->getAllYear_get($modelId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}