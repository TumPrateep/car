<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Carselect extends BD_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("brand");
        $this->load->model("model");
        $this->load->model("modelofcars");
        $this->load->model("tirematch");
        $this->load->model("triesizes");
    }

    public function getCarBrand_post()
    {
        $result = $this->brand->getAllBrandofRegister();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getCarBrand_get()
    {
        $result = $this->brand->getAllBrandofRegister();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getActiveCarBrand_get()
    {
        $result = $this->brand->getAllBrandforSelect();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getActiveCarYear_get()
    {
        $modelName = $this->get("modelName");
        $result = $this->model->getAllActiveYearanddetailforcar($modelName);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getActiveCarModel_get()
    {
        $brandId = $this->get("brandId");
        $result = $this->model->getAllActiveModelforcar($brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getCarModel_get()
    {
        $brandId = $this->get("brandId");
        $result = $this->model->getAllmodelforcar($brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getCarYear_get()
    {
        $modelName = $this->get("modelName");
        $result = $this->model->getAllYearanddetailforcar($modelName);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getMaxMinYear_get()
    {
        $modelName = $this->get("modelName");
        $min = $this->model->getMinFromModel($modelName);
        $max = $this->model->getMaxFromModel($modelName);
        $car_type = $this->model->getCarTypeFromModel($modelName);
        $output["max"] = $max;
        $output["min"] = $min;
        $output["car_type"] = $car_type;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getCarDetail_get()
    {
        $modelId = $this->get("modelId");
        $result = $this->modelofcars->getAllCarModelForSelect($modelId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getMultiCarDetail_post()
    {
        $modelId = $this->post("modelId");
        $result = $this->modelofcars->getAllCarModelForMultiSelect($modelId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getModelByYear_get()
    {
        $brandId = $this->get("brandId");
        $modelName = $this->get("modelName");
        $year = $this->get("year");
        $result = $this->model->getModelByYear($brandId, $modelName, $year);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getModelOfCarByYear_get()
    {
        $brandId = $this->get("brandId");
        $modelName = $this->get("modelName");
        $year = $this->get("year");
        $result = $this->model->getModelOfCarByYear($brandId, $modelName, $year);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);

    }

    public function getModelOfCarByModelId_get()
    {
        $modelId = $this->get("modelId");
        $result = $this->modelofcars->getAllCarModelForSelect($modelId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    public function getTireSize_get()
    {
        $brandId = $this->get('brandId');
        $modelName = $this->get('modelName');
        $year = $this->get('year');
        $modelId = $this->get('modelId');

        $tire_sizeData = $this->tirematch->getTireSize($brandId, $modelName, $year, $modelId);

        $tire_sizeId = [];
        foreach ($tire_sizeData as $i => $v) {
            $tire_sizeId[] = $v->tire_sizeId;
        }

        $result = $this->triesizes->getAllTireSizeByTireSizeId($tire_sizeId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

}