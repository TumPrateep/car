<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Tirecredit extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('tire_credit_charge');
    }

    public function createtirechange_post(){

        $credit_price = $this->post('credit_price');
        $unit_id = $this->post('unit_id');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->tire_credit_charge->getTireCredit();

        $data = array(
            'credit_price' => $credit_price,
            'create_by' => $userId,
            'unit_id' => $unit_id,
            'create_at' => date('Y-m-d H:i:s',time()),
            'status' => 1,
            'activeFlag' => 1
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tire_credit_charge,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $credit_price = $this->post('credit_price');
        $tire_creditId = $this->post('tire_creditId');
        $unit_id = $this->post('unit_id');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->tire_credit_charge->getTireCreditById($tire_creditId);
        $data_check = null;
        $data = array(
            'tire_creditId' => $tire_creditId,
            'credit_price' => $credit_price,
            'unit_id' => $unit_id,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->tire_credit_charge,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deletetirechange_get(){
        $tire_creditId = $this->get('tire_creditId');
        $data_check = $this->tire_credit_charge->getTireCreditById($tire_creditId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $tire_creditId,
            "model" => $this->tire_credit_charge,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    // public function getalltirechange_post(){
    //     $tire_changeId = $this->post('tire_changeId');
    //     $this->set_response($isCheck, REST_Controller::HTTP_OK);
    //     $getAlldata = $this->tirechanges->getallTire($tire_changeId);
    //     if($getAlldata != null){
    //         $output["data"] = $getAlldata;
    //         $output["message"] = REST_Controller::MSG_SUCCESS;
    //         $this->set_response($output, REST_Controller::HTTP_OK);
    //     }else{
    //         $output["message"] = REST_Controller::MSG_BE_DELETED;
    //         $this->set_response($output, REST_Controller::HTTP_OK);
    //     }
    // }

    function searchTireChange_post(){
        $columns = array( 
            0 => null,
            1 => 'credit_price',
            2 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->tire_credit_charge->allTirechanges_count();
        $totalFiltered = $totalData; 
        $posts = $this->tire_credit_charge->allTirechanges($limit,$start,$order,$dir);
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['tire_creditId'] = $post->tire_creditId;
                $nestedData['credit_price'] = $post->credit_price;
                $nestedData['unit'] = $post->unit;
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

    // function searchTriesize_post(){
    //     $columns = array( 
    //         0 => null,
    //         1 => 'tire_size',
    //         2 => 'status'      
    //     );
    //     $limit = $this->post('length');
    //     $start = $this->post('start');
    //     $order = $columns[$this->post('order')[0]['column']];
    //     $dir = $this->post('order')[0]['dir'];
    //     $rimId = $this->post("rimId");
    //     $totalData = $this->triesizes->alltrieSize_count($rimId);
    //     $totalFiltered = $totalData; 
    //     if(empty($this->post('tire_size')) && empty($this->post('status')))
    //     {            
    //         $posts = $this->triesizes->allTriesize($limit,$start,$order,$dir, $rimId);
    //     }else{
    //         $search = $this->post('tire_size'); 
    //         $status = $this->post('status'); 
    //         $posts =  $this->triesizes->trie_size_search($limit,$start,$search,$order,$dir,$rimId,$status);
    //         $totalFiltered = $this->triesizes->trie_size_search_count($search, $rimId,$status);
    //     }
    //     $data = array();
    //     if(!empty($posts))
    //     {
    //         foreach ($posts as $post)
    //         {
    //             $nestedData['tire_sizeId'] = $post->tire_sizeId;
    //             $nestedData['tire_size'] = $post->tire_size;
    //             $nestedData['tire_series'] = $post->tire_series;
    //             $nestedData['rim'] = $post->rimName;
    //             $nestedData['rimId'] = $post->rimId;
    //             $nestedData['status'] = $post->status;
    //             $data[] = $nestedData;
    //         }
    //     }
    //     $json_data = array(
    //         "draw"            => intval($this->post('draw')),  
    //         "recordsTotal"    => intval($totalData),  
    //         "recordsFiltered" => intval($totalFiltered), 
    //         "data"            => $data   
    //     );
    //     $this->set_response($json_data);
    // }
    

    function changeStatus_post(){
        $tire_creditId = $this->post('tire_creditId');
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->tire_credit_charge->getTireCreditById($tire_creditId);
        $data = array(
            'tire_creditId' => $tire_creditId,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->tire_credit_charge
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }  
    
    function getTireChange_get(){
        $tire_creditId = $this->get('tire_creditId');
        $data_check = $this->tire_credit_charge->getUpdate($tire_creditId);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    // function getAllunit_get(){
    //     $result = $this->tirechanges->getAllunit();
    //     $output["data"] = $result;
    //     $this->set_response($output, REST_Controller::HTTP_OK);
    // }
}