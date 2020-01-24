<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Profit extends BD_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('profits');
    }

    public function getPriceOfMonth($data)
    {
        $arrPrice = [];
        for ($i = 0; $i < 12; $i++) {
            $arrPrice[$i] = null;
        }

        foreach ($data as $k => $v) {
            $arrPrice[($v->month - 1)] = floatval($v->price);
        }

        return $arrPrice;
    }

    public function getProfit_post()
    {
        $month = $this->post('month');
        $year = $this->post('year');

        $profit = $this->profits->getProfit($month, $year);
        if (!empty($profit)) {
            $profit->profit = $profit->charge_price + ($profit->min_product_price - $profit->real_product_price) + ($profit->carjaidee_service_price - $profit->garage_service_price);
        }
        $data_check['profit'] = $profit;
        $profit_data = $this->profits->getAllProfit($month, $year);
        $data_check['profit_data'] = $this->getPriceOfMonth($profit_data);
        $option = [
            "data_check" => $data_check,
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
}