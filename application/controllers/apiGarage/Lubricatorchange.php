<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorchange extends BD_Controller {
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('lubricatorchangegarages');
    }
      
    public function createLubricatorchangegarage_post(){
        $lubricator_price = $this->post('lubricator_price');
        $userId = $this->session->userdata['logged_in']['id'];
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $machine_id = $this->post('machine_id');

        $data_check = $this->lubricatorchangegarages->data_check_create($garageId, $machine_id);
        $data = array(
            'lubricator_change_garageId' => null,
            'lubricator_price'  => $lubricator_price,
            'create_by' => $userId,
            'garageId' => $garageId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1,
            'machine_id' => $machine_id
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorchangegarages,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_get(){
        $lubricator_change_garageId = $this->get('lubricator_change_garageId');
        $garageId = $this ->get('garageId');
        $data_check = $this->lubricatorchangegarages->getUpdate($lubricator_change_garageId,$garageId);
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
    public function update_post(){
        $lubricator_change_garageId = $this->post('lubricator_change_garageId');
        $lubricator_price = $this->post('lubricator_price');
        $userId = $this->session->userdata['logged_in']['id'];
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $machine_id = $this->post('machine_id');

        $data_check_update = $this->lubricatorchangegarages->getLubricatorChangeById($lubricator_change_garageId,$garageId);
        $data_check = $this->lubricatorchangegarages->data_check_update($lubricator_change_garageId,$garageId, $machine_id);

        $data = array(
            'lubricator_change_garageId' => $lubricator_change_garageId,
            'lubricator_price'  => $lubricator_price,
            'machine_id' => $machine_id,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->lubricatorchangegarages,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deleteLubricatorchangegarage_get(){
        $lubricator_change_garageId = $this->get('lubricator_change_garageId');
        $garageId = $this->get('garageId');
        $data_check = $this->lubricatorchangegarages->getLubricatorChangeById($lubricator_change_garageId,$garageId);
        
        $option = [
            "data_check_delete" => $data_check,
            "data" => $lubricator_change_garageId,
            "model" => $this->lubricatorchangegarages,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function searchLubricatorChange_post(){
        $columns = array( 
            0 => null,
            1 => null,
            2 => 'lubricator_change_garageId'

        );
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->lubricatorchangegarages->allLubricatorschanges_count($garageId);
        $totalFiltered = $totalData; 
        if(empty($this->post('price')))
        {            
            $posts = $this->lubricatorchangegarages->allLubricatorchanges($limit,$start,$order,$dir,$garageId);
        }
        else {
            $search = $this->post('price');
            $status = null;
            $posts =  $this->lubricatorchangegarages->lubricatorchanges_search($limit,$start,$search,$order,$dir,$status,$garageId);
            $totalFiltered = $this->lubricatorchangegarages->lubricatorchanges_search_count($search,$status,$garageId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['lubricator_change_garageId'] = $post->lubricator_change_garageId;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['lubricator_price'] = $post->lubricator_price;
                $nestedData['machine_type'] = $post->machine_type;
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
