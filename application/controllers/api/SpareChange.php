<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Sparechange extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('sparechanges');
    }

    function searchspares_post(){
        $columns = array( 
            0 => null,
            1 => 'spares_change.spares_undercarriageId', 
            2 => 'spares_price'
        );
        $brandId = $this->post('brandId');

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->sparechanges->allSparechanges_count($brandId);
        $totalFiltered = $totalData; 
        if(empty($this->post('spares_undercarriageId')) && empty($this->post('status')))
        {         
            $posts = $this->sparechanges->allSparechanges($limit,$start,$order,$dir,$brandId);
        }
        else {
            $search = $this->post('spares_undercarriageId');
            $status = $this->post('status');
            $posts =  $this->sparechanges->sparechanges_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->sparechanges->sparechanges_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['spares_changeId'] = $post->spares_changeId;
                $nestedData['spares_price'] = $post->spares_price;
                $nestedData['spares_undercarriageName'] = $post->spares_undercarriageName;
                $nestedData['brandName'] = $post->brandName;
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

    public function createSparechange_post(){
        $brandId = $this->post('brandId');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $spares_price = $this->post('spares_price');
        $userId = $this->session->userdata['logged_in']['id'];

        $data["data"] = [
            "brandId" => $brandId,
            "spares_undercarriageId" => $spares_undercarriageId,
            "spares_price" => $spares_price
        ];

        // $data_check = $this->sparechanges->data_check_create($spares_undercarriageId,$brandId);
        $data["simple"] = array(
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1
        );
        $option = [
            "data_check" => null,
            "data" => $data,
            "model" => $this->sparechanges,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_get(){
        $spares_changeId = $this->get('spares_changeId');
        $data_check = $this->sparechanges->getUpdate($spares_changeId);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $spares_changeId = $this->post('spares_changeId');
        $brandId = $this->post('brandId');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $spares_price = $this->post('spares_price');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->sparechanges->getSpareChangeById($spares_changeId);
        $data_check = $this->sparechanges->data_check_update($spares_changeId,$spares_undercarriageId, $brandId);
        $data = array(
            'spares_changeId' => $spares_changeId,
            'brandId' => $brandId,
            'spares_undercarriageId' => $spares_undercarriageId,
            'spares_price'  => $spares_price,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->sparechanges,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deleteSpareChange_get(){
        $spares_changeId = $this->get('spares_changeId');
        $data_check = $this->sparechanges->getSpareChangeById($spares_changeId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $spares_changeId,
            "model" => $this->sparechanges,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getBrand_post(){

        $output["status"] = true;
        $result = $this->sparechanges->getBrand();
        if($result != null){
            $output["data"] = $result;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_ERROR;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    
    function getAllSparespartcarUndercarriage_get(){
        $brandId = $this->get("brandId");
        $result = $this->sparechanges->getAllSpareCharge($brandId);

        $this->set_response($result, REST_Controller::HTTP_OK);
    }

}