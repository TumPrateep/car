<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Lubricator extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model("lubricatorproduct");
        $this->load->model("lubricatorbrands");
        $this->load->model("lubricators");
        $this->load->model("Lubricatortypeformachines");
        $this->load->model("brand");
        $this->load->model("model");
        $this->load->model("modelofcars");
        $this->load->model("lubricatornumbers");
        $this->load->model("prices");
        

        
    }

    public function search_post(){
        $column = "lubricator_dataId";
        $sort = "asc";
        // if ($this->post('column') == 3) {
        //     $column = "status";
        // } else if ($this->post('column') == 2) {
        //     $sort = "desc";
        // } else {
        //     $sort = "asc";
        // }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;

        $totalData = $this->lubricatorproduct->allLubricatordata_count();
        $totalFiltered = $totalData;

        // $tire_sizeId = $this->post('tire_sizeId');
        // $tire_size = [];

        // if (!empty($this->post('brandId')) && !empty($this->post('modelofcarId'))) {
        //     $modelofcarId = $this->post('modelofcarId');
        //     $tire_sizeData = $this->tirematch->getTireSizeByModelOfCarId($modelofcarId);
        //     $tire_sizeId = [];
        //     foreach ($tire_sizeData as $i => $v) {
        //         $tire_sizeId[] = $v->tire_sizeId;
        //     }

        //     if (count($tire_sizeId) > 0) {
        //         $posts = $this->tireproduct->tireDataByTireSize_search($limit, $start, $order, $dir, $tire_sizeId);
        //         $totalFiltered = $this->tireproduct->tireDataByTireSize_search_count($tire_sizeId);
        //     } else {
        //         $posts = [];
        //         $totalFiltered = 0;
        //     }
        // } else {
            $lubricator_brand = $this->post('lubricator_brand');
            $lubricator_number = $this->post('lubricator_number');
        //     $rimId = $this->post('rimId');

        //     if (!empty($tire_sizeId)) {
        //         $tire_size[] = $tire_sizeId;
        //     } else {
        //         $brandId = $this->post('brandId');
        //         $modelName = $this->post('model_name');
        //         $year = $this->post('year');
        //         $modelId = $this->post('modelId');
        //         $tire_sizeData = $this->tirematch->getTireSize($brandId, $modelName, $year, $modelId);
        //         foreach ($tire_sizeData as $i => $v) {
        //             $tire_size[] = $v->tire_sizeId;
        //         }
        //     }

            $posts = $this->lubricatorproduct->lubricatorDataByNumber_search($limit, $start, $order, $dir, $lubricator_brand, $lubricator_number);
            $totalFiltered = $this->lubricatorproduct->lubricatorDataByNumber_search_count($lubricator_brand, $lubricator_number);

        // }

        // if ($totalFiltered == 0) {
        //     $posts = $this->tireproduct->tireDataByTireSize_search($limit, $start, $order, $dir, $tire_size, null, null, null);
        //     $totalFiltered = $this->tireproduct->tireDataByTireSize_search_count($tire_size, null, null, null);
        // }

        $nestedData = array();
        if (!empty($posts)) {
            // $index = 0;
            $count = 0;
            foreach ($posts as $post) {
                $lubricator_change_data = $this->prices->getPriceFromGarageByMachineId($post->machine_id);
                $garage_price = 50;
                if (!empty($lubricator_change_data)) {
                    $garage_price = $lubricator_change_data->lubricator_price;
                }

                $carjaidee_change_data = $this->prices->getLubricatorPriceCarjaidee($post->machine_id);
                $carjaidee_price = 0;
                if (!empty($carjaidee_change_data)) {
                    $carjaidee_price = $carjaidee_change_data->price;
                    if ($carjaidee_change_data->unit_id == 1) {
                        $carjaidee_price = $post->price * $carjaidee_change_data->price / 100;
                    }
                }

                $lubricator_service_data = $this->prices->getLubricatorPriceService($post->machine_id);
                $service_price = $lubricator_service_data->price;

                $nestedData[$count]['lubricator_dataId'] = $post->lubricator_dataId;
                $nestedData[$count]['lubricatorId'] = $post->lubricatorId;
                $nestedData[$count]['machine_id'] = $post->machine_id;
                $nestedData[$count]['lubricator_numberId'] = $post->lubricator_numberId;
                $nestedData[$count]['lubricator_brandName'] = $post->lubricator_brandName;
                $nestedData[$count]['price'] = $post->price + $garage_price + $carjaidee_price + $service_price;
                $nestedData[$count]['price2'] = [$post->price,$garage_price,$carjaidee_price,$service_price];
                $nestedData[$count]['machine_type'] = $post->machine_type;
                $nestedData[$count]['lubricator_brandPicture'] = $post->lubricator_brandPicture;
                $nestedData[$count]['lubricator_typeName'] = $post->lubricator_typeName;
                $nestedData[$count]['capacity'] = $post->capacity;
                $nestedData[$count]['lubricator_number'] = $post->lubricator_number;
                $nestedData[$count]['lubricator'] = $post->lubricator;

                $option = [
                    'lubricatorId' => $post->lubricatorId
                ];
                $nestedData[$count]['picture'] = getPictureLubricator($option);
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

    function getAllLubricatorBrand_get(){
        $result = $this->lubricatorbrands->getAllLubricatorBrand();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllLubricator_get(){
        $lubricator_brandId = $this->get("lubricator_brandId");
        $lubricator_gear = $this->get("lubricator_gear");
        $result = $this->lubricators->getAllLubricator($lubricator_brandId, $lubricator_gear);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAlllubricatortypeFormachine_get(){
        $result = $this->Lubricatortypeformachines->getAlllubricatortypeFormachine();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllBrand_get(){
        $result = $this->brand->getAllBrandforSelect();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllModel_get(){
        $brandId = $this->get("brandId");
        $result = $this->model->getAllmodel($brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllModelofcar_get(){
        $modelId = $this->get("modelId");
        $result = $this->modelofcars->getAllmodelofcars($modelId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    function getAllYear_get(){
        $detail = $this->get("detail");
        $result = $this->model->getAllYear($detail);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    function getAlldetail_get(){
        $modelName = $this->get("modelName");
        $result = $this->model->getAlldetail($modelName);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getLubricatorNumber_get(){
        $lubricator_gear = $this->get('lubricator_gear');
        $result = $this->lubricatornumbers->getAllNumberFromGear($lubricator_gear);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getLubricatorBrand_get(){
        $lubricator_number = $this->get('lubricator_number');
        $result = $this->lubricatornumbers->getAllBrandFromNumber($lubricator_number);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}
