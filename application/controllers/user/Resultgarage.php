<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resultgarage extends CI_Controller {


	function __construct()
    {
        // Construct the parent class
		parent::__construct();
		// $this->load->view("lib");
	}
	function index($tire_modelId, $tire_sizeId, $tire_dataId){
		$data = ['tire'=>'active', 'lubricator' => '', 'garage' => ''];
		$data['tire_modelId'] = $tire_modelId;
		$data['tire_sizeId'] = $tire_sizeId;
		$data['tire_dataId'] = $tire_dataId;

		load_user_view("users/tire/resultgarage/content", "users/tire/resultgarage/script", $data, false);

	}
	
	function lubricator($machine_id, $lubricator_numberId, $lubricator_dataId){
		$data = ['tire'=>'', 'lubricator' => '', 'garage' => ''];
		$data['machine_id'] = $machine_id;
		$data['lubricator_numberId'] = $lubricator_numberId;
		$data['lubricator_dataId'] = $lubricator_dataId;

		load_user_view("users/lubricator/resultgarage/content", "users/lubricator/resultgarage/script", $data, false);

    }

}