<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Carprofile extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->load->view("lib");
    }

    public function index()
    {
        $data = ['tire' => '', 'lubricator' => '', 'garage' => ''];

        load_user_view("users/car-profile/content", "users/car-profile/script", $data);
    }

    public function create()
    {
        $data = ['tire' => '', 'lubricator' => '', 'garage' => ''];
        load_user_view("users/car-profile/create/content", "users/car-profile/create/script", $data);
    }

    public function update($car_profileId)
    {
        $data = ['tire' => '', 'lubricator' => '', 'garage' => ''];
        $data["car_profileId"] = $car_profileId;
        load_user_view("users/car-profile/update/content", "users/car-profile/update/script", $data);

    }

    public function detail($car_profileId)
    {
        $data = ['tire' => '', 'lubricator' => '', 'garage' => ''];
        $data["car_profileId"] = $car_profileId;
        load_user_view("users/cardetail/content", "users/cardetail/script", $data);

    }

}