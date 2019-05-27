<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Accessstatus extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('accessstatuss');
    }

    function searchAccessstatus_post(){
        $columns = array( 
            0 => null,
            1 => 'order.orderId'

        );
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->accessstatuss->allaccessstatuss_count($garageId);
        $totalFiltered = $totalData; 
        if(empty($this->post('date,reservename,status')))
        {            
            $posts = $this->accessstatuss->allaccessstatuss($limit,$start,$order,$dir,$garageId);
        }
        else {
            $search = $this->post('date,reservename,status');
            $posts =  $this->accessstatuss->accessstatuss_search($limit,$start,$search,$order,$dir,$status,$garageId);
            $totalFiltered = $this->accessstatuss->accessstatuss_search($search,$status,$garageId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['name'] = $post->name;
                $nestedData['reserveId'] = $post->reserveId;
                // $nestedData['garageId'] = $post->garageId;
                $nestedData['orderId'] = $post->orderId;
                $nestedData['reserveDate'] = $post->reserveDate;

                $date=date_create($post->reservetime);
                $post->reservetime = date_format($date,"H:i");
                $nestedData['reservetime'] = $post->reservetime;
                $nestedData['userId'] = $post->userId;
                $nestedData['status'] = $post->status;
                $nestedData['statusSuccess'] = $post->statusSuccess;

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

    function changeStatus_get(){
        
        $status = $this->get("status");
        $orderId = $this->get("orderId");
        $data = array(
            
            'orderId' => $orderId,  
            'statusSuccess' => $status
        );
        $data_check_update = $this->accessstatuss->getOrderById($orderId);

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->accessstatuss
        ];
        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}