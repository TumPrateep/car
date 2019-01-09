<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Orderapprove extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('orderapproves');
    }

    function searchOrderApprove_post(){
        $columns = array( 
            0 => null,
            1 => 'order.orderId'

        );
        // $garageId = $this->session->userdata['logged_in']['garageId'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->orderapproves->allOrderApproves_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('orderId')))
        {            
            $posts = $this->orderapproves->allOrderApproves($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('orderId');
            $posts =  $this->orderapproves->OrderApproves_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->orderapproves->OrderApproves_search($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['reserveStatus'] = $post->reserveStatus;
                // $nestedData['garageId'] = $post->garageId;
                $nestedData['orderId'] = $post->orderId;
               
                $nestedData['name'] = $post->name;
                $nestedData['paymentStatus'] = $post->paymentStatus;

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

    function changeStatus_post(){
        $orderId = $this->post("orderId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'orderId' => $orderId,
            'status' => $status,
            'activeFlag' => 1
        );
        $data_check_update = $this->orderapproves->getOrderApprovesById($orderId);

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->modelofcars
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }


}