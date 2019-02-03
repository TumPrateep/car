<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Managegarage extends BD_Controller {
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('managegarages');
        $this->load->model('mechanics');
        $this->load->model("location");
        
    }
      
    // function getUpdate_get(){
    //     $garageId = $this->session->userdata['logged_in']['garageId'];
    //     $lubricator_change_garageId = $this->get('lubricator_change_garageId');
    //     $data_check = $this->lubricatorchangegarages->getUpdate($lubricator_change_garageId,$garageId);
        
    //     $option = [
    //         "data_check" => $data_check
    //     ];

    //     $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    // }

    public function update_post(){
        
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $garageName = $this->post('garageName');
        $phone = $this->post('phone');
        $businessRegistration = $this->post('businessRegistration');
        $hno = $this->post('hno');
        $village = $this->post('village');
        $road = $this->post('road');
        $provinceId = $this->post('provinceId');
        $districtId = $this->post('districtId');
        $subdistrictId = $this->post('subdistrictId');
        $postCode = $this->post('postCode');
        $alley = $this->post('alley');
        $latitude = $this->post('latitude');
        $longtitude = $this->post('longtitude');

        $this->load->model("managegarages");
        $config['upload_path'] = 'public/image/garage/';
        $img = $this->post("garagePicture");
        $success = true;
        $file = null;
        $imageName = null; 
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

        $data_check_update = $this->managegarages->getmanagegaragesById($garageId);
        $data_check = $this->managegarages->data_check_update($garageId,$garageName);

        $data = array(
           'garageId' => $garageId,
            'garageName' => $garageName,
            'phone' => $phone,
            'businessRegistration' => $businessRegistration,
            'hno' => $hno,
            'village' => $village,
            'road' => $road,
            'provinceId' => $provinceId,
            'districtId' => $districtId,
            'subdistrictId' => $subdistrictId,
            'postCode' => $postCode,
            'alley' => $alley,
            'latitude' => $latitude,
            'latitude' => $latitude,
            "picture"=> $imageName
        );
        $oldImage = null;
        if($data_check_update != null){
            $oldImage = $config['upload_path'].$data_check_update->picture;
        }


        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->managegarages,
            "image_path" => $file,
            "old_image_path" => $oldImage
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }
    }


    // function searchLubricatorChange_post(){
    //     $columns = array( 
    //         0 => null,
    //         1 => 'garageId'

    //     );
    //     $garageId = $this->session->userdata['logged_in']['garageId'];
    //     $limit = $this->post('length');
    //     $start = $this->post('start');
    //     $order = $columns[$this->post('order')[0]['column']];
    //     $dir = $this->post('order')[0]['dir'];
    //     $totalData = $this->lubricatorchangegarages->allLubricatorschanges_count($garageId);
    //     $totalFiltered = $totalData; 
    //     if(empty($this->post('price')))
    //     {            
    //         $posts = $this->lubricatorchangegarages->allLubricatorchanges($limit,$start,$order,$dir,$garageId);
    //     }
    //     else {
    //         $search = $this->post('price');
    //         $status = null;
    //         $posts =  $this->lubricatorchangegarages->lubricatorchanges_search($limit,$start,$search,$order,$dir,$status,$garageId);
    //         $totalFiltered = $this->lubricatorchangegarages->lubricatorchanges_search_count($search,$status,$garageId);
    //     }
    //     $data = array();
    //     if(!empty($posts))
    //     {
    //         foreach ($posts as $post)
    //         {
    //             $nestedData['lubricator_change_garageId'] = $post->lubricator_change_garageId;
    //             $nestedData['garageId'] = $post->garageId;
    //             $nestedData['lubricator_price'] = $post->lubricator_price;
    //             $nestedData['status'] = $post->status;
    //             $data[] = $nestedData;
    //         }
    //     }
    //     $json_data = array(
    //         "draw"            => intval($this->post('draw')),  
    //         "recordsTotal"    => intval($totalData),  
    //         "recordsFiltered" => intval($totalFiltered), 
    //         "data"            => $data   
            
    //     );
    //     $this->set_response($json_data);
    // }

    function getmanagegarage_post(){

        $garageId = $this->session->userdata['logged_in']['garageId'];

        $data_check = $this->managegarages->getmanagegaragesById($garageId);
        $data_check->owner = $this->mechanics->getOwnerGarage($garageId);
        if($data_check != null){
            $data_check->provinceName = $this->location->getProvinceNameByProvinceId($data_check->provinceId);
            $data_check->districtName = $this->location->getDistrictNameByDistrictId($data_check->districtId);
            $data_check->subdistrictName = $this->location->getSubDistrictBySubDistrictId($data_check->subdistrictId);
        }

        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

}
