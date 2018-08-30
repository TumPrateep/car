<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SpareundercarriageData extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("spare_undercarriagedatas");
    }
    public function search_post(){
        $column = "spares_undercarriageDataId";
        $sort = "asc";
        if($this->post('column') == 3){
            $column = "status";
        }else if($this->post('column') == 2){
            $sort = "desc";
        }else{
            $sort = "asc";
        }

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;

        
        $totalData = $this->spare_undercarriagedatas->allSpareData_count();
        $totalFiltered = $totalData;
        $userId = $this->session->userdata['logged_in']['id'];
        if(empty($this->post('spares_brandId')) && empty($this->post('spares_undercarriageId'))  && empty($this->post('price')) )
        {            
            $posts = $this->spare_undercarriagedatas->allSpareData($limit,$start,$order,$dir,$userId);
        }
        else {
            
            $spares_brandId = $this->post('spares_brandId');
            $spares_undercarriageId = $this->post('spares_undercarriageId');
            $price = $this->post('price');
            
            $status = null; 
            $posts =  $this->spare_undercarriagedatas->SpareData_search($limit,$start,$order,$dir,$status,$spares_undercarriageId, $spares_brandId, $price, $userId);

            $totalFiltered = $this->spare_undercarriagedatas->SpareDatas_search_count($spares_undercarriageId, $spares_brandId, $price, $userId);
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['spares_undercarriageDataId'] = $post->spares_undercarriageDataId;
                $nestedData[$count]['spares_brandName'] = $post->spares_brandName;
                $nestedData[$count]['spares_undercarriageName'] = $post->spares_undercarriageName;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['price'] = $post->price;
                $nestedData[$count]['warranty_year'] = $post->warranty_year;
                $nestedData[$count]['warranty_distance'] = $post->warranty_distance;
                $nestedData[$count]['warranty'] = $post->warranty;
                $nestedData[$count]['spares_undercarriageDataPicture'] = $post->spares_undercarriageDataPicture;
                
                $data[$index] = $nestedData;
                if($count >= 2){
                    $count = -1;
                    $index++;
                    $nestedData = [];
                }
                
                $count++;

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
    function create_post(){
        $spares_brandId = $this->post('spares_brandId');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $userId = $this->session->userdata['logged_in']['id'];
        $price = $this->post('price');
        $warranty = $this->post('warranty');
        $warranty_year = $this->post('warranty_year');
        $warranty_distance = $this->post('warranty_distance');
        
        $config['upload_path'] = 'public/image/spareundercarriage/';

        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        // $config['overwrite'] = TRUE;
        // $config['encrypt_name'] = TRUE;
        // $config['remove_spaces'] = TRUE;
        // $this->load->library('upload', $config);
        // $checknotDuplicate = $this->spare_undercarriageDatas->checknotDuplicated($spares_brandId,$spares_undercarriageId);
        
        $userId = $this->session->userdata['logged_in']['id'];
        $img = $this->post('spares_undercarriageDataPicture');
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);

        if (!$success){
            $output["message"] = REST_Controller::MSG_ERROR;
			$this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $image =  $imageName;
            $data_check = $this->spare_undercarriagedatas->data_check_create($spares_brandId,$spares_undercarriageId,$userId);
            if($data_check){
                unlink($file);
                $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $data = array(
                'spares_undercarriageDataId' => null,
                'spares_brandId' => $spares_brandId,
                'spares_undercarriageId' =>$spares_undercarriageId,
                'status' => 1,
                'create_at' => date('Y-m-d H:i:s',time()),
                'create_by' => $userId,
                "activeFlag" => 1,
                'price' => $price,
                'warranty' => $warranty,
                'warranty_year' => $warranty_year,
                'warranty_distance' => $warranty_distance,
                'spares_undercarriageDataPicture' => $image
                );
                $option = [
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->spare_undercarriagedatas,
                    "image_path" => $file
                ];

                $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
            }
        }
    }

    function update_post(){
        $spares_undercarriageDataId = $this->post('spares_undercarriageDataId');
        $spares_brandId = $this->post('spares_brandId');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $userId = $this->session->userdata['logged_in']['id'];
        $price = $this->post('price');
        $warranty = $this->post('warranty');
        $warranty_year = $this->post('warranty_year');
        $warranty_distance = $this->post('warranty_distance');
        
        $config['upload_path'] = 'public/image/spareundercarriage/';
        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        // $config['overwrite'] = TRUE;
        // $config['encrypt_name'] = TRUE;
        // $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $img = $this->post('spares_undercarriageDataPicture');
        $success = true;
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
            $image =  $imageName;
            $data_check_update = $this->spare_undercarriagedatas->getspares_undercarriageDatabyId($spares_undercarriageDataId);
            $data_check = $this->spare_undercarriagedatas->data_check_update($spares_brandId,$spares_undercarriageId,$spares_undercarriageDataId);
            $oldImage = null;
            if($data_check != null){
                $oldImage = $config['upload_path'].$data_check->spares_undercarriageDataPicture;
            }
            if($data_check){
                    $data = array(
                        'spares_undercarriageDataId' => $spares_undercarriageDataId,
                        'spares_brandId' => $spares_brandId,
                        'spares_undercarriageId' =>$spares_undercarriageId,
                        'status' => 2,
                        'update_at' => date('Y-m-d H:i:s',time()),
                        'update_by' => $userId,
                        "activeFlag" => 1,
                        'price' => $price,
                        'warranty' => $warranty,
                        'warranty_year' => $warranty_year,
                        'warranty_distance' => $warranty_distance,
                        'spares_undercarriageDataPicture' => $image
                    );
                    $option = [
                        "data_check_update" => $data_check_update,
                        "data_check" => $data_check,
                        "data" => $data,
                        "model" => $this->spare_undercarriagedatas,
                        "image_path" => $file,
                        "old_image_path" => $oldImage,
                    ];

                $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
            
        }
        
    }
}
    function delete_get(){
        $spares_undercarriageDataId = $this->get('spares_undercarriageDataId');
        $data_check = $this->spare_undercarriagedatas->getspares_undercarriageDatabyId($spares_undercarriageDataId);
        
        $option = [
            "data_check_delete" => $data_check,
            "data" => $spares_undercarriageDataId,
            "model" => $this->spare_undercarriagedatas,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getSpareUndercarriageData_get(){
        $spares_undercarriageDataId = $this->get('spares_undercarriageDataId');
        $data_check = $this->spare_undercarriagedatas->getupdate($spares_undercarriageDataId);
        $option = [
                "data_check" => $data_check
        ];
    
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
        
    }
}
