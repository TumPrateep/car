<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Garagegroup extends BD_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('garagegroups');
        $this->load->model('tirelimits');
        $this->load->model('garage');
        $this->load->model('lubricatorlimits');
    }

    public function getMaxPriceService_get()
    {
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $rimId = $this->get('rimId');

        $garageData = $this->garage->getGaragesmanagementById($garageId);
        $data['max'] = null;
        if (!empty($garageData)) {
            $limit = $this->tirelimits->getMaxPrice($garageData->group, $rimId);
            if (!empty($limit)) {
                $data['max'] = $limit->price;
            }
        }

        $this->set_response($data, REST_Controller::HTTP_OK);
    }
    public function getMaxPriceLubricatorlimitService_get()
    {
        $garageId = $this->session->userdata['logged_in']['garageId'];


        $garageData = $this->garage->getGaragesmanagementById($garageId);
        $data['max'] = null;
        if (!empty($garageData)) {
            $limit = $this->lubricatorlimits->getMaxPrice($garageData->group);
            if (!empty($limit)) {
                $data['max'] = $limit->price;
            }
        }

        $this->set_response($data, REST_Controller::HTTP_OK);
    }

}