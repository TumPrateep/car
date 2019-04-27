<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Deliverorder extends BD_Controller {
    function __construct()
    {
        // Construct the parent class  location
        parent::__construct();
        $this->auth();
        $this->load->model("deliverorders");
        $this->load->model("location");
    }

    function searchorder_post(){
        $column = "	orderId";

        $sort = "asc";
        if($this->post('column') == 3){
            $column = "status";
        }else if($this->post('column') == 2){
            $sort = "desc";
        }else{
            $sort = "asc";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;
        $totalData = $this->deliverorders->allDeliverorders_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('orderId')))
        {            
            $posts = $this->deliverorders->allDeliverorders($limit,$start,$order,$dir);
        }else{

            $status = $this->post('status');
            $productId = $this->post('productId');
            
            $status = null; 
            $posts =  $this->deliverorders->Deliverorders_search($limit,$start,$order,$dir,$status,$orderId);
            $totalFiltered = $this->deliverorders->Deliverorders_search_count($orderId);
                
        }
            
        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['group'] = $post->group;
                $nestedData['productId'] = $post->productId;
                $nestedData['garageName'] = $post->garageName;
                $nestedData['data'] = getProductDetail($post->productId, $post->group);

                $data[] = $nestedData;
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
    
    function getexport_post(){
        // $garageId = $this->session->userdata['logged_in']['garageId'];
        $orderId = $this->post('orderId');
        $data_check = $this->deliverorders->getDeliverordersById($orderId);
        if($data_check != null){
            $data_check->provinceName = $this->location->getProvinceNameByProvinceId($data_check->provinceId);
            $data_check->districtName = $this->location->getDistrictNameByDistrictId($data_check->districtId);
            $data_check->subdistrictName = $this->location->getSubDistrictBySubDistrictId($data_check->subdistrictId);

            $data_check->carprovinceName = $this->location->getProvinceNameByProvinceId($data_check->carprovinceId);
            $data_check->cardistrictName = $this->location->getDistrictNameByDistrictId($data_check->cardistrictId);
            $data_check->carsubdistrictName = $this->location->getSubDistrictBySubDistrictId($data_check->carsubdistrictId);
        }
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }


    function getorder_get(){
        $lubricator_dataId = $this->get('lubricator_dataId');
        $data_check = $this->lubricatordatas->getupdate($lubricator_dataId);
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $lubricator_dataId = $this->post("lubricator_dataId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->lubricatordatas->getlubricatorDatasById($lubricator_dataId);
        $data = array(
            'lubricator_dataId' => $lubricator_dataId,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->lubricatordatas
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

    
    function updateimgtraking_post(){
        $orderId = $this->post('orderId');
        $status = $this->post('status');
        // $config['upload_path'] = 'public/image/deliverorder/';
        $config['upload_path'] = 'public/image/deliverorder/';
        $userId = $this->session->userdata['logged_in']['id'];
        $img = $this->post('picture_tracking');
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
            $image =  $imageName;
            $data_check = $this->brand->data_check_create($brandName);
            $data = array(
                "orderId" => $orderId,
                "picture_tracking"=> $imageName,
                "status" => 4,
                "update_at" => date('Y-m-d H:i:s',time())
            );
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->deliverorders,
                "image_path" => $file
            ];
    
            $this->set_response(user_decision_update($option), REST_Controller::HTTP_OK);

        }       
    }
    function createteimgtraking_post(){
        $orderId = $this->post('orderId');
        $config['upload_path'] = 'public/image/deliverorder/';
        $userId = $this->session->userdata['logged_in']['id'];
        $img = $this->post('picture_tracking');
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $status = ('status');
        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);
        
		if (!$success){
            $output["message"] = REST_Controller::MSG_ERROR;
			$this->set_response($output, REST_Controller::HTTP_OK);
		}else{
            $image =  $imageName;
            $data_check = $this->deliverorders->data_check_create($orderId);
            $data = array(
                "numbertrakingId"=> null,
                "numbertrakingName"=> $image,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId,
                "update_at" => null,
                "update_by" => null,
                "status" => null

            );
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->deliverorders,
                "image_path" => $file
            ];
    
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
        
		}
    }
}


