<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricator extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	
	function index(){
		$data = [
            'tire' => '', 'lubricator' => '', 'garage' => '',
            'cardata' => '', 'lubricatordata' => '',
			'lubricator_gear' => '', 'lubricator_number' => '', 'lubricator_brand' => '',
		];
		
		$rimId = $this->input->get('rimId');
		if (!empty($car_tire_size_id)) {
            $data['cardata'] = 'active';
           
        }

        $lubricator_brand = $this->input->get('lubricator_brand');
        if (!empty($lubricator_brand)) {
            $data['lubricatordata'] = 'active';
            $data['lubricator_brand'] = $this->input->get('lubricator_brand');
            $data['lubricator_number'] = $this->input->get('lubricator_number');
            $data['lubricator_gear'] = $this->input->get('lubricator_gear');
        }

		load_user_view("users/lubricator/content", 'users/lubricator/script', $data, false);

    }

}