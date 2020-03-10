<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Filter extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("filters");
        // $this->load->model("lubricatorgearnumbers");
    }

    function createfilter_post(){
        $filter_brandId = $this->post("filter_brandId");
        $filterName = $this->post("filterName");
        
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->filters->checkFilters($filter_brandId, $filterName);
        $data = array(
            'filter_id' => null,
            'filter_brandId' => $filter_brandId,  
            'filter_name' =>$filterName,
            'status' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId,
            'activeFlag' => 1
        );

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->filters,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function searchFilter_post(){
        $columns = array( 
            0 => null,
            1 => null,
            2 =>'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $filter_brandId = $this->post('filter_brandId');
        // var_dump($filter_brandId);
        // exit();
        $totalData = $this->filters->allfilter_count($filter_brandId);
        $totalFiltered = $totalData; 
        if(empty($this->post('filterName')) && empty($this->post('status')))
        {            
            $posts = $this->filters->allfilter($limit,$start,$order,$dir,$filter_brandId);
        }
        else {
            $search = $this->post('filterName');
            $status = $this->post('status');
            $posts =  $this->filters->filter_search($limit,$start,$search,$order,$dir,$status,$filter_brandId);
            $totalFiltered = $this->filters->filter_search_count($search,$status,$filter_brandId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['filter_id'] = $post->filter_id;
                $nestedData['filter_brandId'] = $post->filter_brandId;
                $nestedData['filter_name'] = $post->filter_name;
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

    public function delete_get(){
        $filter_id = $this->get('filter_id');
        
        $data_check = $this->filters->getfilterbyId($filter_id);        
        $option = [
            "data_check_delete" => $data_check,
            "data" => $filter_id,
            "model" => $this->filters,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getFilter_post(){

        $filter_id = $this->post('filter_id');

        $data_check = $this->filters->getfilterbyId($filter_id);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function updateFilter_post(){

        $filter_id = $this->post("filter_id");
        $filter_brandId = $this->post("filter_brandId");
        $filterName = $this->post("filterName");

        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->filters->getfilterbyId($filter_id);
        $data_check = $this->filters->checkbeforeupdate($filter_id, $filter_brandId, $filterName);
        $data = array(
            'filter_id' => $filter_id,
            'filter_brandId' => $filter_brandId,
            'filter_name' =>$filterName,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time()),
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->filters,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $filter_id = $this->post("filter_id");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'filter_id' => $filter_id,
            'status' => $status,
            'activeFlag' => 1
        );
        $data_check_update = $this->filters->getfilterbyId($filter_id);

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->filters
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}