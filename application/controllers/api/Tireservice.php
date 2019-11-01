<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Tireservice extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('tireservices');
    }

    public function create_post(){

        $rimId = $this->post('tire_rimId');
        $price = $this->post('price');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->tireservices->data_check_create($rimId);
        $data = array(
            'rimId' => $rimId,
            'price' => $price,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tireservices,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $rimId = $this->post('tire_rimId');
        $price = $this->post('price');
        $tire_serviceId = $this->post('tire_serviceId');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->tireservices->getTireServiceById($tire_serviceId);
        $data_check = $this->tireservices->data_check_update($tire_serviceId,$rimId);
        $data = array(
            'tire_serviceId' => $tire_serviceId,
            'price' => $price,
            'rimId' => $rimId,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tireservices,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    // public function deletetirechange_get(){
    //     $tire_changeId = $this->get('tire_changeId');
    //     $data_check = $this->tirechanges->getTireChangeById($tire_changeId);

    //     $option = [
    //         "data_check_delete" => $data_check,
    //         "data" => $tire_changeId,
    //         "model" => $this->tirechanges,
    //         "image_path" => null
    //     ];

    //     $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    // }

    public function gettireservice_post(){
        $tire_serviceId = $this->post('tire_serviceId');

        $data_check = $this->tireservices->getTireServiceById($tire_serviceId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'rimName', 
            2 => 'price'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->tireservices->allTireService_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('rimName')) && empty($this->post('status')))
        {            
            $posts = $this->tireservices->allTireService($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('rimName');
            $status = $this->post('status');
            $posts =  $this->tireservices->tireservice_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->tireservices->tirechanges_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['rimId'] = $post->rimId;
                $nestedData['tire_serviceId'] = $post->tire_serviceId;
                $nestedData['rimName'] = $post->rimName;
                $nestedData['price'] = $post->price;
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