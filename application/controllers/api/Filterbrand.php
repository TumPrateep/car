<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Filterbrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("filterbrands");
    }

    function createfilter_post(){

        $config['upload_path'] = 'public/image/filter/';
        $config['allowed_types'] = 'gif|jpg|png';
        $filter_brandName = $this->post("filter_brandName");
        $img = $this->post("filter_brandPicture");
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);

        $userId = $this->session->userdata['logged_in']['id'];

        if (!$success){
            $output["message"] = REST_Controller::MSG_ERROR;
			$this->set_response($output, REST_Controller::HTTP_OK);
		}else{
            $data_check = $this->filterbrands->checkfiltersbrands($filter_brandName);
                $data = array(
                    "filter_brandId"=> null,
                    "filter_picture"=> $imageName,
                    "filter_brandName"=> $filter_brandName,
                    "status"=> 1,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId,
                    "activeFlag" => 1
                );
                $option = [
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->filterbrands,
                    "image_path" => $file
                ];
        
                $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    
            }
        }

        function searchfilter_post(){
            $columns = array( 
                0 => null,
                1 => null, 
                2 => null,
                3 =>'status'
            );
            $limit = $this->post('length');
            $start = $this->post('start');
            $order = $columns[$this->post('order')[0]['column']];
            $dir = $this->post('order')[0]['dir'];
            
            $totalData = $this->filterbrands->allFiltersbrands_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('filter_brandName')) && empty($this->post('status'))){            
                $posts = $this->filterbrands->allFiltersbrands($limit,$start,$order,$dir);
            }else{
                $search = $this->post('filter_brandName');
                $status = $this->post('status');
                $posts =  $this->filterbrands->Filtersbrands_search($limit,$start,$search,$order,$dir,$status);
                $totalFiltered = $this->filterbrands->Filtersbrands_search_count($search,$status);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $nestedData['filter_brandId'] = $post->filter_brandId;
                    $nestedData['filter_brandNames'] = $post->filter_brandName;
                    $nestedData['filter_pictures'] = $post->filter_picture;
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

        function deleteFilter_get(){
            $filter_brandId = $this->get('filter_brandId');
            $data_check = $this->filterbrands->getfiltersbrandsById($filter_brandId);
        
            $option = [
                "data_check_delete" => $data_check,
                "data" => $filter_brandId,
                "model" => $this->filterbrands,
                "image_path" => null
            ];
    
            $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
        }

        function getFilterById_post(){
            $filter_brandId = $this->post('filter_brandId');
            $data_check = $this->filterbrands->getfiltersbrandsFromId($filter_brandId);
            
            $option = [
                "data_check" => $data_check
            ];
    
            $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
        }

        function updateFilterbrands_post(){

            $config['upload_path'] = 'public/image/filter/';
            $config['allowed_types'] = 'gif|jpg|png';
            $userId = $this->session->userdata['logged_in']['id'];
            $filter_brandName = $this->post("filter_brandName");
            $filter_brandId = $this->post("filter_brandId");
            $img = $this->post("filter_brandPicture");
            $success = true;
            $file = null;
            $imageName = null; 
            if(!empty($img)){
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
    
                $imageName = uniqid().'.png';
                $file = $config['upload_path']. '/'. $imageName;
                $success = file_put_contents($file, $data);
            }
    
            if (!$success){
                unlink($file);
                $output["message"] = REST_Controller::MSG_ERROR;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $data_check_update = $this->filterbrands->getfiltersbrandsById($filter_brandId);
                $data_check = $this->filterbrands->wherenot($filter_brandId, $filter_brandName);
                $userId = $this->session->userdata['logged_in']['id'];
                $data = array(
                    "filter_brandId"=> $filter_brandId,
                    "filter_picture"=> $imageName,
                    "filter_brandName"=> $filter_brandName,
                    "status"=> 1,
                    'update_at' => date('Y-m-d H:i:s',time()),
                    'update_by' => $userId,
                    "activeFlag" => 1
                );
                $oldImage = null;
                if($data_check_update != null){
                    $oldImage = $config['upload_path'].$data_check_update->filter_picture;
                }
    
                $option = [
                    "data_check_update" => $data_check_update,
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->filterbrands,
                    "image_path" => $file,
                    "old_image_path" => $oldImage,
                ];
        
                $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    
            }  
            
        }

        function changeStatus_post(){
            $filter_brandId = $this->post("filter_brandId");
            $status = $this->post("status");
            // $userId = $this->session->userdata['logged_in']['id'];
            if($status == 1){
                $status = 2;
            }else{
                $status = 1;
            }
            $data_check_update = $this->filterbrands->getfiltersbrandsById($filter_brandId);
            $data = array(
                'filter_brandId' => $filter_brandId,
                'status' => $status,
                'activeFlag' => 1
            );
            $option = [
                "data_check_update" => $data_check_update,
                "data" => $data,
                "model" => $this->filterbrands
            ];
    
            $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
        }

}