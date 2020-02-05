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
            $arrPrice[$i] = 0;
        }

        foreach ($data as $k => $v) {
            $arrPrice[($v->month - 1)] = floatval($v->price);
        }

        return $arrPrice;
    }

    public function getProfitOfMonth($data = [])
    {
        $arrPrice = [];
        for ($i = 0; $i < 12; $i++) {
            $arrPrice[$i] = 0;
        }

        foreach ($data as $k => $v) {
            $arrPrice[($v->month - 1)] = floatval($v->price);
        }

        return $arrPrice;
    }

    public function getPercentOfMonth($income_data = [], $profit_data = [])
    {
        $arrIncome = [];
        for ($i = 0; $i < 12; $i++) {
            $arrIncome[$i] = 0;
        }

        $arrProfit = [];
        for ($i = 0; $i < 12; $i++) {
            $arrProfit[$i] = 0;
        }

        $arrPrice = [];
        for ($i = 0; $i < 12; $i++) {
            $arrPrice[$i] = 0;
        }

        foreach ($income_data as $k => $v) {
            $arrIncome[($v->month - 1)] = floatval($v->price);
        }

        foreach ($profit_data as $k => $v) {
            $arrProfit[($v->month - 1)] = floatval($v->price);
        }

        foreach ($arrIncome as $k => $price) {
            if ($arrIncome[$k] > 0) {
                $arrPrice[$k] = number_format(floatval($arrProfit[$k] * 100 / $arrIncome[$k]), 2, '.', '');
            }
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
        $income_data = $this->profits->getAllIncome($month, $year);
        $profit_data = $this->profits->getAllProfit($month, $year);
        $data_check['income_data'] = $this->getPriceOfMonth($income_data);
        $data_check['profit_data'] = $this->getProfitOfMonth($profit_data);
        $option = [
            "data_check" => $data_check,
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function getPercentProfit_post()
    {
        $month = $this->post('month');
        $year = $this->post('year');

        $profit = $this->profits->getProfit($month, $year);
        if (!empty($profit)) {
            $profit->profit = $profit->charge_price + ($profit->min_product_price - $profit->real_product_price) + ($profit->carjaidee_service_price - $profit->garage_service_price);
        }
        $data_check['profit'] = $profit;
        $income_data = $this->profits->getAllIncome($month, $year);
        $profit_data = $this->profits->getAllProfit($month, $year);

        $data_check['profit_data'] = $this->getPercentOfMonth($income_data, $profit_data);

        $option = [
            "data_check" => $data_check,
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);

    }
}