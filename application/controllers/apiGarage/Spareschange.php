<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Spareschange extends BD_Controller {
    
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
        $this->load->model('spareschangegarages');
    }

    public function createLubricatorchangegarage_post(){
        $spares_price = $this->post('spares_price');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $userId = $this->session->userdata['logged_in']['id'];
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $data_check = $this->spareschangegarages->data_check_create($garageId,$spares_undercarriageId);
        $data = array(
            'spares_changeId' => null,
            'spares_undercarriageId' => $spares_undercarriageId,
            'spares_price'  => $spares_price,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1,
            'garageId' => $garageId
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->spareschangegarages,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function getUpdate_get(){
        $spares_changeId = $this->get('spares_changeId');
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $data_check = $this->spareschangegarages->getUpdate($spares_changeId,$garageId);
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
    public function update_post(){
        $spares_changeId = $this->post('spares_changeId');
        $garageId = $this->session->userdata['logged_in']['garageId'];        
        $spares_price = $this->post('spares_price');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->spareschangegarages->getSparesChangeById($spares_changeId,$garageId);
        $data_check = $this->spareschangegarages->data_check_update($spares_changeId,$garageId,$spares_undercarriageId);

        $data = array(
            'spares_changeId' => $spares_changeId,
            'garageId' => $garageId,
            'spares_price'  => $spares_price,
            'spares_undercarriageId' => $spares_undercarriageId,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->spareschangegarages,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deleteSpareschangegarage_get(){
        $spares_changeId = $this->get('spares_changeId');
        $data_check = $this->spareschangegarages->getSparesChangeById($spares_changeId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $spares_changeId,
            "model" => $this->spareschangegarages,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function searchSpareChange_post(){
        $columns = array( 
            0 => null,
            1 => 'spares_undercarriageName',
            2 => 'spares_price'
        );
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->spareschangegarages->allSpareschanges_count($garageId);
        $totalFiltered = $totalData; 
        if(empty($this->post('price')))
        {            
            $posts = $this->spareschangegarages->allSpareschanges($limit,$start,$order,$dir,$garageId);
        }else {
            $search = $this->post('price');
            $status = null;
            $posts =  $this->spareschangegarages->spareschanges_search($limit,$start,$search,$order,$dir,$status,$garageId);
            $totalFiltered = $this->spareschangegarages->spareschanges_search_count($search,$status,$garageId);
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
                $nestedData['spares_undercarriageName'] = $post->spares_undercarriageName;
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
