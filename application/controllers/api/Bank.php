<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Bank extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('banks');
    }

    function searchBanks_post(){
        $columns = array( 
            0 => null,
            1 => 'bankName', //ค้นหา
            2 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->banks->allBank_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('lubricator_changeId')) && empty($this->post('status')))
        {            
            $posts = $this->banks->allBank($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('bankName');
            $status = $this->post('status');
            $posts =  $this->banks->allBank($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->banks->Bank_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['bankId'] = $post->bankId;
                $nestedData['bankName'] = $post->bankName;
                $nestedData['accountNumber'] = $post->accountNumber;
                $nestedData['fullName'] = $post->fullName;
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

    public function createBanks_post(){
        $bankName = $this->post('bankName');
        $accountNumber = $this->post('accountNumber');
        $fullName = $this->post('fullName');

        $data_check = $this->banks->data_check_create($accountNumber);
        $data = array(
            'bankId' => null,
            'bankName'  => $bankName,
            'accountNumber' => $accountNumber,
            'fullName'  => $fullName,
            'status' => 1 
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->banks,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    //นี้คือส่วนที่ทำให้ข้อมูลแสดงเวลาอยู่หน้าแก้ไข
    function getUpdate_get(){
        $bankId = $this->get('bankId');
        $data_check = $this->banks->getUpdate($bankId);
    
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $bankId = $this->post('bankId');
        $bankName = $this->post('bankName');
        $accountNumber = $this->post('accountNumber');
        $fullName = $this->post('fullName');

        $data_check_update = $this->banks->getBanksById($bankId);
        $data_check = $this->banks->data_check_update($accountNumber,$bankId);
        $data = array(
            'bankId' => $bankId,
            'bankName'  => $bankName,
            'accountNumber' => $accountNumber,
            'fullName'  => $fullName,
            'status' => 1 
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->banks,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function deletebank_get(){
        $bankId = $this->get('bankId');
        $data_check = $this->banks->getBanksById($bankId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $bankId,
            "model" => $this->banks,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

}