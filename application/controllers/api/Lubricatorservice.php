<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorservice extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('lubricatorservices');
    }

    public function create_post(){

        $price = $this->post('price');
        $machineId = $this->post('machineId');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->lubricatorservices->data_check_create($machineId);
        
        $data = array(
            'machine_id' => $machineId,
            'price' => $price,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorservices,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
      
        $price = $this->post('price');
        $machineId = $this->post('machineId');
        $lubricator_serviceId = $this->post('lubricator_serviceId');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->lubricatorservices->getLubricatorServiceById($lubricator_serviceId);
        $data_check = $this->lubricatorservices->data_check_update($lubricator_serviceId, $machineId);
        $data = array(
            'lubricator_serviceId' => $lubricator_serviceId,
            'price' => $price,
            'machine_id' => $machineId,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorservices,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }


    public function getlubricatorservice_post(){
        $lubricator_serviceId = $this->post('lubricator_serviceId');

        $data_check = $this->lubricatorservices->getLubricatorServiceById($lubricator_serviceId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'machine_id',
            2 => 'lubricator_serviceId',
            3 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->lubricatorservices->alllubricatorService_count();
        $totalFiltered = $totalData;            
        $posts = $this->lubricatorservices->allLubricatorService($limit,$start,$order,$dir);

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['lubricator_serviceId'] = $post->lubricator_serviceId;
                $nestedData['price'] = $post->price;
                $nestedData['status'] = $post->status;
                $nestedData['machine_type'] = $post->machine_type;
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