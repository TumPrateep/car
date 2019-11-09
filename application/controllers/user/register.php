<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


	public function caraccessory(){
        $data = [
			'tire' => 'active', 'lubricator' => '', 'garage' => '',
			'cardata' => 'active', 'tiredata' => '',
			'brandId' => '', 'model_name' => '', 'year' => '', 'modelofcarId' => '',
			'tire_brandId' => '', 'tire_modelId' => '', 'rimId' => '', 'tire_sizeId' => ''
		];
		
		load_user_view("users/register/caraccessory/content", "users/register/caraccessory/script", $data);
    
	}

}