<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Reserve extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('reserves');
    }

    function searchReserve_post(){
        $columns = array( 
            0 => null,
            1 => 'order.orderId'

        );
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->reserves->allReserve_count($garageId);
        $totalFiltered = $totalData; 
        if(empty($this->post('orderId')))
        {            
            $posts = $this->reserves->allReserve($limit,$start,$order,$dir,$garageId);
        }
        else {
            $search = $this->post('orderId');
            $posts =  $this->reserves->reserves_search($limit,$start,$search,$order,$dir,$status,$garageId);
            $totalFiltered = $this->reserves->reserves_search($search,$status,$garageId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['reserveId'] = $post->reserveId;
                // $nestedData['garageId'] = $post->garageId;
                $nestedData['orderId'] = $post->orderId;
                $nestedData['reserveDate'] = $post->reserveDate;
                $nestedData['reservetime'] = $post->reservetime;
                $nestedData['userId'] = $post->userId;
                $nestedData['status'] = $post->status;

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


}