<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class TireChange extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    public function createtirechange_post(){
        $tire_front = $this->post('tire_front');
        $tire_back = $this->post('tire_back');
        $rimId = $this->post('tire_rimId');
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model('tirechanges');
        $isDuplicate = $this->tirechanges->checkDuplicate($rimId);
        if($isDuplicate){
            $data = array(
                'tire_changeId' => null,
                'tire_front' => $tire_front,
                'tire_back'  => $tire_back,
                'rimId' => $rimId,
                'create_by' => $userId,
                'create_at' => date('Y-m-d H:i:s',time()),
                'status' => 1,
                'activeFlag' => 1
            );
            $result = $this->tirechanges->insert($data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }

        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    public function update_post(){
        $tire_front = $this->post('tire_front');
        $tire_back = $this->post('tire_back');
        $rimId = $this->post('rimId');
        $tire_changeId = $this->post('tire_changeId');
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model('tirechanges');
        $isDuplicate = $this->tirechanges->checkDuplicateById($tire_changeId,$rimId);
        if($isDuplicate){
            $data = array(
                'tire_changeId' => $tire_changeId,
                'tire_front' => $tire_front,
                'tire_back' => $tire_back,
                'rimId' => $rimId,
                'update_by' => $userId,
                'update_at' => date('Y-m-d H:i:s',time()),
                'status' => 1 ,
                'activeFlag' => 1
            );
            $result = $this->tirechanges->update($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    public function deletetirechange_get(){
        $tire_changeId = $this->get('tire_changeId');
        $this->load->model('tirechanges');
        $checkData = $this->tirechanges->checkData($tire_changeId);
        if($checkData != null){
            $checkDelete = $this->tirechanges->delete($tire_changeId);
            if($checkDelete){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_USED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    public function getalltirechange_post(){
        $tire_changeId = $this->post('tire_changeId');
        $this->load->model('tirechanges');
        $this->set_response($isCheck, REST_Controller::HTTP_OK);
        $getAlldata = $this->tirechanges->getallTire($tire_changeId);
        if($getAlldata != null){
            $output["data"] = $getAlldata;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function searchTireChange_post(){
        $columns = array( 
            0 => null,
            1 => 'tire_front', 
            2 => 'tire_back',
            3 => 'rimName',
            4 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $this->load->model("tirechanges");
        $totalData = $this->tirechanges->allTirechanges_count();
        $totalFiltered = $totalData; 
        $search = $this->post('rimName');
        if(empty($this->post('rimName')) && empty($this->post('status')))
        {            
            $posts = $this->tirechanges->allTirechanges($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('rimName');
            $status = $this->post('status');
            $posts =  $this->tirechanges->tirechanges_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->tirechanges->tirechanges_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['tire_changeId'] = $post->tire_changeId;
                $nestedData['tire_front'] = $post->tire_front;
                $nestedData['tire_back'] = $post->tire_back;
                $nestedData['rimName'] = $post->rimName;
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