<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricatorproduct extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatorproductdata");
        $this->load->model("lubricatorbrands");
        $this->load->model("lubricators");
        $this->load->model("lubricatortypes");
        $this->load->model("lubricatortypeformachines");
	}

    function create_post(){
        $lubricator_brandId = $this->post("lubricator_brandId");
        $lubricatorId = $this->post("lubricatorId");
        $lubricator_typeId = $this->post("lubricator_typeId");


        $userId = $this->session->userdata['logged_in']['id'];

        $config['upload_path'] = 'public/image/lubricatorproduct/';
        $img = $this->post("picture");
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);

        if (!$success){
            $output["message"] = REST_Controller::MSG_ERROR;
			$this->set_response($output, REST_Controller::HTTP_OK);
		}else{
            $data_check = $this->lubricatorproductdata->data_check_create($lubricator_brandId,$lubricatorId,$lubricator_typeId);
            $data = array(
                "lubricator_brandId"=> $lubricator_brandId,
                "lubricatorId"=> $lubricatorId,
                "lubricator_typeId"=> $lubricator_typeId,
                "picture" => $imageName,
                "status"=> 1,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId
            );

            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->lubricatorproductdata,
                "image_path" => $file
            ];
    
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

        }

    }
    

    function getAllLubricatorBrand_get(){
        $result = $this->lubricatorbrands->getAllLubricatorBrand();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllLubricator_get(){
        $lubricator_brandId = $this->get("lubricator_brandId");
        $lubricator_gear = $this->get("lubricator_gear");
        $result = $this->lubricatorproductdata->getAllLubricator($lubricator_brandId,$lubricator_gear);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAlllubricatortypeFormachine_get(){
        $result = $this->lubricatortypeformachines->getAlllubricatortypeFormachine();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    
}