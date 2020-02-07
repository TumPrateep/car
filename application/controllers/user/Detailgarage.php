<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Detailgarage extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->load->view("lib");
        $this->load->model('garage');
    }
    public function index($garageId)
    {
        $data = ['tire' => 'active', 'lubricator' => '', 'garage' => ''];
        $data['garageId'] = $garageId;
        $data['garageData'] = $this->garage->getViewGarageByGarageId($garageId);
        load_user_facebook_view("users/garage/detailgarage/content", null, $data);
    }

}