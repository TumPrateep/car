<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sparesmatching extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('sparesmatchings');
    }

    function create_post(){
        $spares_brand_id = $this->post('spares_brand_id');
        $spares_undercarriage_id = $this->post('spares_undercarriage_id');
        $userId = $this->session->userdata['logged_in']['id'];
        
        $brandId = $this->post("brandId");
        $modelofcar_id = $this->post("modelofcarId");

        $data_check = null;

        $data["model"] = array(
            'spares_undercarriage_id' => null,
            'spares_brand_id' => $spares_brand_id,
            'status' => 1,
            'brand_id' => $brandId
        );

        $data['modelofcar_id'] = $modelofcar_id;
        $data['spares_undercarriage_id'] = $spares_undercarriage_id;

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->sparesmatchings,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'brand.brandName', 
            2 => 'model.yearStart',
            3 => 'spares_undercarriage.spares_undercarriageName',
            4 => 'spares_matching.status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->sparesmatchings->all_count();
        $totalFiltered = $totalData;

        $posts = $this->sparesmatchings->allSparesmatching($limit,$start,$order,$dir);

        $json_data = array(
            "draw"            => intval($this->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $posts   
        );

        $this->set_response($json_data);

    }

    function delete_get(){
        $spares_matching_id = $this->get('spares_matching_id');
        $data_check = $this->sparesmatchings->getSparesMatchingById($spares_matching_id);
    
        $option = [
            "data_check_delete" => $data_check,
            "data" => $spares_matching_id,
            "model" => $this->sparesmatchings,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $spares_matching_id = $this->post("spares_matching_id");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data_check_update = $this->sparesmatchings->getSparesMatchingById($spares_matching_id);
        $data = array(
            'spares_matching_id' => $spares_matching_id,
            'status' => $status
        );
        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->sparesmatchings
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}
