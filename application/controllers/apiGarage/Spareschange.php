<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Spareschange extends BD_Controller {
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('Spareschangegarages');
    }

    public function createLubricatorchangegarage_post(){
        $lubricator_price = $this->post('spares_price');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->Spareschangegarages->data_check_create();
        $data = array(
            'spares_changeId' => null,
            'spares_price'  => $lubricator_price,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->Spareschangegarages,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_get(){
        $lubricator_changeId = $this->get('spares_changeId');
        $garageId = $this ->get('garageId');
        $data_check = $this->Spareschangegarages->getUpdate($spares_changeId,$garageId);
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
    public function update_post(){
        $lubricator_changeId = $this->post('spares_changeId');
        $garageId = $this->post('garageId');
        $lubricator_price = $this->post('spares_price');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->Spareschange->getLubricatorChangeById($spares_changeId,$garageId);
        $data_check = $this->Spareschange->data_check_update($spares_changeId,$garageId);

        $data = array(
            'lubricator_changeId' => $spares_changeId,
            'garageId' => $garageId,
            'lubricator_price'  => $spares_price,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->Spareschange,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deleteLubricatorchangegarage_get(){
        $lubricator_changeId = $this->get('lubricator_changeId');
        $garageId = $this->get('garageId');
        $data_check = $this->Spareschangegarages->getLubricatorChangeById($spares_changeId,$garageId);


        $option = [
            "data_check_delete" => $data_check,
            "data" => $spares_changeId,
            "data" => $garageId,
            "model" => $this->Spareschangegarages,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function searchLubricatorChange_post(){
        $columns = array( 
            0 => null,
            1 => 'lubricator_changeId'
        );
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->Spareschangegarages->allLubricatorschanges_count($garageId);
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricator_price')))
        {            
            $posts = $this->Spareschangegarages->allLubricatorchanges($limit,$start,$order,$dir,$garageId);
        }
        else {
            $search = $this->post('lubricator_price');
            $posts =  $this->Spareschangegarages->lubricatorchanges_search($limit,$start,$search,$order,$dir,$status,$garageId);
            $totalFiltered = $this->Spareschangegarages->lubricatorchanges_search_count($search,$status,$garageId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['spares_changeId'] = $post->spares_changeId;
                $nestedData['garageId'] = $post->garageId;
                $nestedData['spares_price'] = $post->spares_price;
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
