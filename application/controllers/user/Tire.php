<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Tire extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->load->view("lib");
    }

    public function index()
    {
        $data = [
            'tire' => 'active', 'lubricator' => '', 'garage' => '',
            'cardata' => '', 'tiredata' => 'active',
            'brandId' => '', 'model_name' => '', 'year' => '', 'modelofcarId' => '',
            'tire_brandId' => '', 'tire_modelId' => '', 'rimId' => '', 'tire_sizeId' => '',
            'car_tire_size_id' => '',
        ];

        $car_tire_size_id = $this->input->get('car_tire_sizeId');

        if (!empty($car_tire_size_id)) {
            $data['cardata'] = 'active';
            $data['tiredata'] = '';
            $data['brandId'] = $this->input->get('brandId');
            $data['model_name'] = $this->input->get('model_name');
            $data['year'] = $this->input->get('year');
            $data['car_tire_size_id'] = $this->input->get('car_tire_sizeId');
        }

        $rimId = $this->input->get('rimId');
        if (!empty($rimId)) {
            $data['tiredata'] = 'active';
            $data['cardata'] = '';
            $data['tire_brandId'] = $this->input->get('tire_brandId');
            $data['tire_modelId'] = $this->input->get('tire_modelId');
            $data['rimId'] = $this->input->get('rimId');
            $data['tire_sizeId'] = $this->input->get('tire_sizeId');
        }

        load_user_view("users/tire/content", 'users/tire/script', $data, false);
    }

}