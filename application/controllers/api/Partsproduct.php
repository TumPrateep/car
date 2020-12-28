<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Partsproduct extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('partsproducts');
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'partsName', //ค้นหา
            2 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->partsproducts->allParts_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('partsNames')) && empty($this->post('status')))
        {            
            $posts = $this->partsproducts->allParts($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('partsName');
            $status = $this->post('status');
            // $posts =  $this->partsproducts->allParts($limit,$start,$search,$order,$dir,$status);
            // $totalFiltered = $this->partsproducts->Bank_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['partId'] = $post->partId;
                $nestedData['partsName'] = $post->partsName;
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

    public function create_post(){
        $partsName = $this->post('partsName');

        $data_check = $this->partsproducts->data_check_create($partsName);
        $data = array(
            'partsName' => $partsName,
            'status' => 1 
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->partsproducts,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_get(){
        $partId = $this->get('partId');
        $data_check = $this->partsproducts->getUpdate($partId);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $partId = $this->post('partId');
        $partsName = $this->post('partsName');

        $data_check_update = $this->partsproducts->getPartsById($partId);
        $data_check = $this->partsproducts->data_check_update($partsName,$partId);
        $data = array(
            'partId' => $partId,
            'partsName'  => $partsName
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->partsproducts,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function delete_get(){
        $partId = $this->get('partId');
        $data_check = $this->partsproducts->getPartsById($partId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $partId,
            "model" => $this->partsproducts,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $partId = $this->post("partId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->partsproducts->getPartsById($partId);

        $data = array(
            'partId' => $partId,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->partsproducts
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}