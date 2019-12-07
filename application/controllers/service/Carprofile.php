<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Carprofile extends BD_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("carprofiles");
        $this->load->model("orderdetails");
    }

    public function getCarProfile_post()
    {
        $userId = $this->session->userdata['logged_in']['id'];
        $car_profileId = $this->post('car_profileId');
        $data_check = $this->carprofiles->getCarProfileByUserIdAndCarprofileId($userId, $car_profileId);
        // dd();
        $option = [
            "data_check" => $data_check,
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function getAllProfile_get()
    {
        $data = $this->carprofiles->getAllCarProfile();
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function getAllCarProfileByUserId_get()
    {
        $userId = $this->session->userdata['logged_in']['id'];
        $data = $this->carprofiles->getAllCarProfileByUserId($userId);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function getCarProfile_get()
    {
        $userId = $this->session->userdata['logged_in']['id'];
        $data = $this->carprofiles->getUserProfileByUserId($userId);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function deleteCarProfile_get()
    {
        $car_profileId = $this->get('car_profileId');
        $data_check = $this->carprofiles->getCarDeleteById($car_profileId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $car_profileId,
            "model" => $this->carprofiles,
            "image_path" => [
                'public/image/carprofile/' . $data_check->pictureFront,
                'public/image/carprofile/' . $data_check->pictureBack,
                'public/image/carprofile/' . $data_check->circlePlate,
            ],
        ];
        $this->set_response(decision_delete_mutiimg($option), REST_Controller::HTTP_OK);
    }

    public function createCarProfile_post()
    {
        $userId = $this->session->userdata['logged_in']['id'];
        $character_plate = $this->post("character_plate");
        $number_plate = $this->post("number_plate");
        $province_plate = $this->post("province_plate");
        $brandId = $this->post("brandId");
        $modelId = $this->post("modelId");
        $year = $this->post("detail");
        // $modelofcarId = $this->post("modelofcarId");
        $mileage = $this->post("mileage");
        $color = $this->post("color");

        $config['upload_path'] = 'public/image/carprofile/';

        $img = $this->post("picture1");
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName1 = uniqid() . '.png';
        $file = $config['upload_path'] . '/' . $imageName1;
        $success = file_put_contents($file, $data);
        if (!$success) {
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

        $img = $this->post("picture2");
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName2 = uniqid() . '.png';
        $file = $config['upload_path'] . '/' . $imageName2;
        $success = file_put_contents($file, $data);
        if (!$success) {
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

        $img = $this->post("picture-form");
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName3 = uniqid() . '.png';
        $file = $config['upload_path'] . '/' . $imageName3;
        $success = file_put_contents($file, $data);
        if (!$success) {
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

        $data_check = $this->carprofiles->data_check_create($character_plate, $number_plate, $province_plate, $userId);

        $data = array(
            'car_profileId' => null,
            'pictureFront' => $imageName1,
            'pictureBack' => $imageName2,
            'circlePlate' => $imageName3,
            'userId' => $userId,
            'create_at' => date('Y-m-d H:i:s', time()),
            'create_by' => $userId,
            'status' => 1,
            'character_plate' => $character_plate,
            'number_plate' => $number_plate,
            'province_plate' => $province_plate,
            'brandId' => $brandId,
            'modelId' => $modelId,
            'year' => $year,
            'mileage' => $mileage,
            'color' => $color,
            // "picture"=> $imageName
        );

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->carprofiles,
            "image_path" => $file,
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function updateCarProfile_post()
    {
        $userId = $this->session->userdata['logged_in']['id'];
        $car_profileId = $this->post("car_profileId");
        $character_plate = $this->post("character_plate");
        $number_plate = $this->post("number_plate");
        $province_plate = $this->post("province_plate");
        $mileage = $this->post("mileage");
        $color = $this->post("color");

        $brandId = $this->post("brandId");
        $modelId = $this->post("modelId");
        $year = $this->post("detail");

        $config['upload_path'] = 'public/image/carprofile/';
        $img = $this->post("picture1");
        $success = true;
        $file = null;
        $imageName1 = null;
        $imageName2 = null;
        $imageName3 = null;
        $this->load->model("carprofiles");
        if (!empty($img)) {
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $imageName1 = uniqid() . '.png';
            $file = $config['upload_path'] . '/' . $imageName1;
            $success = file_put_contents($file, $data);
        }

        $img = $this->post("picture2");
        if (!empty($img)) {
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $imageName2 = uniqid() . '.png';
            $file = $config['upload_path'] . '/' . $imageName2;
            $success = file_put_contents($file, $data);
        }

        $img = $this->post("picture-form");
        if (!empty($img)) {
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $imageName3 = uniqid() . '.png';
            $file = $config['upload_path'] . '/' . $imageName3;
            $success = file_put_contents($file, $data);
        }

        if (!$success) {
            unlink($file);
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {

            $data_check_update = $this->carprofiles->getCarProfileByUserIdAndCarprofileId($userId, $car_profileId);
            $data_check = $this->carprofiles->data_check_update($character_plate, $number_plate, $province_plate, $userId, $car_profileId);

            $data = array(
                'car_profileId' => $car_profileId,
                'pictureFront' => $imageName1,
                'pictureBack' => $imageName2,
                'circlePlate' => $imageName3,
                'userId' => $userId,
                'create_at' => date('Y-m-d H:i:s', time()),
                'create_by' => $userId,
                'status' => 1,
                'character_plate' => $character_plate,
                'number_plate' => $number_plate,
                'province_plate' => $province_plate,
                'mileage' => $mileage,
                'color' => $color,
                'brandId' => $brandId,
                'modelId' => $modelId,
                'year' => $year,
                // "picture"=> $imageName
            );
            $oldImage = null;
            $newImage = null;
            if ($data_check_update != null) {
                $oldImage = [];
                if ($data_check_update->pictureFront != null) {
                    $oldImage[] = $config['upload_path'] . $data_check_update->pictureFront;
                }
                if ($data_check_update->pictureBack != null) {
                    $oldImage[] = $config['upload_path'] . $data_check_update->pictureBack;
                }
                if ($data_check_update->circlePlate != null) {
                    $oldImage[] = $config['upload_path'] . $data_check_update->circlePlate;
                }

                $newImage = [];
                if ($imageName1 != null) {
                    $newImage[] = $config['upload_path'] . $imageName1;
                }
                if ($imageName2 != null) {
                    $newImage[] = $config['upload_path'] . $imageName2;
                }
                if ($imageName3 != null) {
                    $newImage[] = $config['upload_path'] . $imageName3;
                }
            }
            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->carprofiles,
                "image_path" => $newImage,
                "old_image_path" => $oldImage,
            ];

            $this->set_response(decision_update_multiimg($option), REST_Controller::HTTP_OK);
        }
    }

    public function searchCarProfile_post()
    {
        $userId = $this->session->userdata['logged_in']['id'];
        $columns = array(
            0 => 'character_plate',
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->carprofiles->allprofile_count($userId);
        $totalFiltered = $totalData;

        if (empty($this->post('search'))) {
            $posts = $this->carprofiles->allprofile($limit, $start, $order, $dir, $userId);
        } else {
            // $character_plate = $this->post('character_plate');
            // $number_plate = $this->post('number_plate');
            // $province_plate = $this->post('province_plate');
            // $provinceforcarName = $this->post('provinceforcarName');
            // $search = $this->post("search");
            // $posts =  $this->carprofiles->profileSearch($limit,$start,$order,$dir,$search,$userId);
            // $totalFiltered = $this->carprofiles->carprofile_search_count($search,$userId);
        }
        $data = array();
        if (!empty($posts)) {
            $index = 0;
            $count = 0;
            foreach ($posts as $post) {

                $nestedData[$count]['car_profileId'] = $post->car_profileId;
                $nestedData[$count]["car_profile"] = $this->orderdetails->getDatacarprofile($post->car_profileId);
                $nestedData[$count]['character_plate'] = $post->character_plate;
                $nestedData[$count]['number_plate'] = $post->number_plate;
                $nestedData[$count]['province_plate'] = $post->province_plate;
                $nestedData[$count]['provinceforcarName'] = $post->provinceforcarName;
                $nestedData[$count]['mileage'] = $post->mileage;
                $nestedData[$count]['color'] = $post->color;
                $nestedData[$count]['picture'] = $post->pictureFront;
                $nestedData[$count]['point'] = $post->point;
                $nestedData[$count]['year'] = $post->year;
                $nestedData[$count]['brandpicture'] = base_url() . "public/image/brand/" . $post->brandPicture;
                $data[$index] = $nestedData;
                if ($count >= 2) {
                    $count = -1;
                    $index++;
                    $nestedData = [];
                }

                $count++;

            }
        }
        $json_data = array(
            "draw" => intval($this->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );
        $this->set_response($json_data);
    }

    public function getModelofCar_post()
    {

        $districtId = $this->post("modelId");

        $output["status"] = true;
        $result = $this->carprofiles->getModelofCar($modelId);
        if ($result != null) {
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    public function getModelCar_post()
    {

        $districtId = $this->post("brandId");

        $output["status"] = true;
        $result = $this->carprofiles->getModelCar($brandId);
        if ($result != null) {
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    public function getBrandCar_post()
    {

        $output["status"] = true;
        $result = $this->carprofiles->getBrandCar();
        if ($result != null) {
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

}