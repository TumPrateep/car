<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Deliverorder extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("deliverorders");
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

        // $car_accessoriesId = $this->session->userdata['logged_in']['car_accessoriesId'];
        // $totalData = $this->deliverorders->allDeliverorders_count($car_accessoriesId);
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
        // $orderId = $this->post('orderId'); 
        // $posts =  $this->deliverorders->Deliverorders_search($limit,$start,$order,$dir,$status,$orderId);
        // $totalFiltered = $this->deliverorders->Deliverorders_search_count($orderId);
            
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
                // $nestedData['garageName'] = $post->garageName;
                // $nestedData['picture'] = $post->picture;
                $nestedData['data'] = getProductDetail($post->productId, $post->group);

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

    public function updatetraking_post(){
        $orderId = $this->post('orderId');
        $tracking_number = $this->post('tracking-number');
        $userId = $this->session->userdata['logged_in']['id'];
        // $car_accessoriesId = $this->session->userdata['logged_in']['car_accessoriesId'];

        // $data_check_update = $this->lubricatorchangegarages->getLubricatorChangeById($lubricator_change_garageId,$garageId);
        // $data_check = $this->lubricatorchangegarages->data_check_update($lubricator_change_garageId,$garageId);

        $data_check_update = $this->deliverorders->getorderById($orderId);
        // $data_check = $this->deliverorders->data_check_update($lubricator_change_garageId,$garageId);

        $data = array(
            'orderId' => $orderId,
            'status' => 4,
            'number_tracking'  => $tracking_number
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => null,
            "data" => $data,
            "model" => $this->deliverorders,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

}


