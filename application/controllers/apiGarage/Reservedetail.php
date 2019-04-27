<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Reservedetail extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('Reservedetails');
    }

    function searchReservedetails_post(){
        $columns = array( 
            0 => null,
            1 => 'order.orderId'

        );
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->Reservedetails->allReservedetails_count($garageId);
        $totalFiltered = $totalData; 
        if(empty($this->post('date,reservename,status')))
        {            
            $posts = $this->Reservedetails->allReservedetails($limit,$start,$order,$dir,$garageId);
        }
        else {
            $search = $this->post('date,reservename,status');
            $posts =  $this->Reservedetails->Reservedetails_search($limit,$start,$search,$order,$dir,$status,$garageId);
            $totalFiltered = $this->Reservedetails->Reservedetails_search($search,$status,$garageId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['orderId'] = $post->orderId;
                $nestedData['quantity'] = $post->quantity;
                $nestedData['group'] = $post->group;
                $nestedData['productId'] = $post->productId;
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


    

}