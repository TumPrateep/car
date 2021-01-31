<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Partsmapproduct extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model('partsmapproducts');
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'brand.brandName', //ค้นหา
            2 => 'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->partsmapproducts->allParts_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('brandId')) && empty($this->post('modelId')))
        {            
            $posts = $this->partsmapproducts->allParts($limit,$start,$order,$dir);
        }
        else {
            $brandId = $this->post('brandId');
            $modelId = $this->post('modelId');
            $posts =  $this->partsmapproducts->allPartsSearch($limit,$start,$brandId,$order,$dir,$modelId);
            $totalFiltered = $this->partsmapproducts->allPartsSearch_count($brandId,$modelId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['part_car_id'] = $post->part_car_id;
                $nestedData['modelofcarId'] = $post->modelofcarId;
                $nestedData['brandName'] = $post->brandName;
                $nestedData['modelName'] = $post->modelName;
                $nestedData['year'] = $post->yearStart;
                if(!empty($post->yearStart)){
                    $nestedData['year'] = $post->yearStart.'-'.$post->yearEnd;
                }
                $nestedData['detail'] = $post->detail;
                $nestedData['machineSize'] = $post->machineSize;
                $nestedData['modelofcarName'] = $post->modelofcarName;
                $nestedData['parts_table_id'] = $post->parts_table_id;
                $nestedData['parts_table_name'] = $post->parts_table_name;
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

    function update_post(){
        $modelofcarId = $this->post('modelofcarId');
        $parts_table_id = $this->post('parts_table_id');

        $result = $this->partsmapproducts->insert($modelofcarId, $parts_table_id);
        
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

    function changeStatus_post(){
        $part_car_id = $this->post("part_car_id");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->partsmapproducts->getPartsById($part_car_id);

        $data = array(
            'part_car_id' => $part_car_id,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->partsmapproducts
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}