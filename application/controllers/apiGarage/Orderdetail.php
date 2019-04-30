<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orderdetail extends BD_Controller {
    function __construct()
    {

        parent::__construct();
        $this->auth();
        $this->load->model("orderdetails"); 
        $this->load->model("orders");
    }

    function searchorder_post(){
      

        $columns = array( 
            0 => null
        );
        
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $totalData = $this->orderdetails->allorders_count($garageId);
        $totalFiltered = $totalData;  
        $posts = $this->orderdetails->allorders($limit,$start,$order,$dir,$garageId);
    
        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['orderDetailId'] = $post->orderDetailId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['group'] = $post->group;
                $nestedData['status'] = $post->status;
                $nestedData['productId'] = $post->productId;
                $nestedData['cost'] = $this->orders->getGarageCharge($post->productId, $post->group);
                // $nestedData['car_accessoriesName'] = $post->car_accessoriesName;
                // $nestedData['titleName'] = $post->titleName;
                // $nestedData['firstname'] = $post->firstname;
                // $nestedData['lastname'] = $post->lastname;
                // $nestedData['character_plate'] = $post->character_plate;
                // $nestedData['number_plate'] = $post->number_plate;
                // $nestedData['provinceforcarName'] = $post->provinceforcarName;
                // $nestedData['brandName'] = $post->brandName;
                // $nestedData['modelName'] = $post->modelName;
                // $nestedData['yearStart'] = $post->yearStart;
                // $nestedData['yearEnd'] = $post->yearEnd;
                // $nestedData['modelofcarName'] = $post->modelofcarName;
                // $nestedData['lubricator_price'] = $post->lubricator_price;
                // $nestedData['spares_price'] = $post->spares_price;
                // $nestedData['tire_price'] = $post->tire_price;
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

    function getuserdata_post(){
        // $garageId = $this->session->userdata['logged_in']['garageId'];
        $orderId = $this->post('orderId');
        $data_check = $this->orderdetails->getorderdata($orderId);
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }


    function changeStatus_get(){
        $orderDetailId = $this->get("orderDetailId");
        $status = $this->get("status");
        $data = array(
            'orderDetailId' => $orderDetailId,
            'status' => $status
          
        );
        $data_check_update = $this->orderdetails->getorderDetailById($orderDetailId);

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->orderdetails
        ];
        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}


