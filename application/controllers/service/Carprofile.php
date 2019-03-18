<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;

class Carprofile extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("carprofiles");
    }


    function getCarProfile_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $car_profileId = $this->post('car_profileId');
        $data_check = $this->carprofiles->getCarProfileByUserIdAndCarprofileId($userId,$car_profileId);
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }


    function getAllProfile_get(){
        $data = $this->carprofiles->getAllCarProfile();
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    function getCarProfile_get(){
        $userId = $this->session->userdata['logged_in']['id'];
        $data = $this->carprofiles->getUserProfileByUserId($userId);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    function deleteCarProfile_get(){
        $car_profileId = $this->get('car_profileId');
        $data_check = $this->carprofiles->getCarProfileByUserId($car_profileId);        
        $option = [
            "data_check_delete" => $data_check,
            "data" => $car_profileId,
            "model" => $this->carprofiles,
            "image_path" => null
        ];
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function createCarProfile_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $character_plate = $this->post("character_plate");
        $number_plate = $this->post("number_plate");
        $province_plate = $this->post("province_plate");
        $mileage = $this->post("mileage");
        $color = $this->post("color");

        $config['upload_path'] = 'public/image/carprofile/';
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
        }

        $data_check = $this->carprofiles->data_check_create($character_plate,$number_plate ,$province_plate, $userId);

        $data =array(
            'car_profileId' => null,
            'pictureFront' => $imageName,
            'pictureBack' => null,
            'circlePlate' => null,
            'userId' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId,
            'status' => 1,
            'character_plate' => $character_plate,
            'number_plate' => $number_plate,
            'province_plate' => $province_plate,
            'mileage' => $mileage,
            'color' => $color,
            // "picture"=> $imageName
        );

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->carprofiles,
            "image_path" => $file
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function updateCarProfile_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $car_profileId = $this->post("car_profileId");
        $character_plate = $this->post("character_plate");
        $number_plate = $this->post("number_plate");
        $province_plate = $this->post("province_plate");
        $mileage = $this->post("mileage");
        $color = $this->post("color");

        $config['upload_path'] = 'public/image/carprofile/';
        $img = $this->post("picture");
        $success = true;
        $file = null;
        $imageName = null; 
        // $car_profileId = $this->session->userdata['logged_in']['car_profileId'];
        // $data_check = $this->carprofiles->data_check_update($idCard,$car_profileId);
        $this->load->model("carprofiles");
        if(!empty($img)){
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $imageName = uniqid().'.png';
            $file = $config['upload_path']. '/'. $imageName;
            $success = file_put_contents($file, $data);
        }
        if (!$success){
            unlink($file);
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{

        $data_check_update = $this->carprofiles->getCarProfileByUserIdAndCarprofileId($userId,$car_profileId);
        $data_check = $this->carprofiles->data_check_update($character_plate,$number_plate ,$province_plate, $userId,$car_profileId);

        $data =array(
            'car_profileId' => $car_profileId,
            'pictureFront' => $imageName,
            'pictureBack' => null,
            'circlePlate' => null,
            'userId' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId,
            'status' => 1,
            'character_plate' => $character_plate,
            'number_plate' => $number_plate,
            'province_plate' => $province_plate,
            'mileage' => $mileage,
            'color' => $color,
            // "picture"=> $imageName
        );
        $oldImage = null;
        if($data_check_update != null){
            $oldImage = $config['upload_path'].$data_check_update->pictureFront;
        }
        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->carprofiles,
            "image_path" => $file,
            "old_image_path" => $oldImage
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }
    }

    function searchCarProfile_post(){

        $columns = array( 
            0 => 'character_plate'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->carprofiles->allprofile_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('character_plate'))&& empty($this->post('number_plate'))&& empty($this->post('province_plate')))
        {            
            $posts = $this->carprofiles->allprofile($limit,$start,$order,$dir);
        }
        else {
            $character_plate = $this->post('character_plate'); 
            $number_plate = $this->post('number_plate');
            $province_plate = $this->post('province_plate');
            $provinceforcarName = $this->post('provinceforcarName');
            $posts =  $this->carprofiles->allprofile($limit,$start,$order,$dir,$character_plate, $number_plate, $province_plate, $provinceforcarName);
            $totalFiltered = $this->carprofiles->carprofile_search_count($character_plate, $number_plate, $province_plate);
        }
        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['car_profileId'] = $post->car_profileId;
                $nestedData[$count]['character_plate'] = $post->character_plate;
                $nestedData[$count]['number_plate'] = $post->number_plate;
                $nestedData[$count]['province_plate'] = $post->province_plate;
                $nestedData[$count]['provinceforcarName'] = $post->provinceforcarName;
                $nestedData[$count]['mileage'] = $post->mileage;
                $nestedData[$count]['color'] = $post->color;
                $nestedData[$count]['picture'] = $post->pictureFront;
                $data[$index] = $nestedData;
                if($count >= 3){
                    $count = -1;
                    $index++;
                    $nestedData = [];
                }
                
                $count++;

            }
        }
        $json_data = array(
            "draw"            => intval($this->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );
        $this->set_response($json_data);
    }

    function getModelofCar_post(){

        $districtId = $this->post("modelId");

        $output["status"] = true;
        $result = $this->carprofiles->getModelofCar($modelId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getModelCar_post(){

        $districtId = $this->post("brandId");

        $output["status"] = true;
        $result = $this->carprofiles->getModelCar($brandId);
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function getBrandCar_post(){

        $output["status"] = true;
        $result = $this->carprofiles->getBrandCar();
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }


}