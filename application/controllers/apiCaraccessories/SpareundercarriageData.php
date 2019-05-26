<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spareundercarriagedata extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
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

        $userId = $this->session->userdata['logged_in']['id'];
        $totalData = $this->spare_undercarriagedatas->allSpareData_count($userId);
        $totalFiltered = $totalData;
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
                $nestedData[$count]['brandName'] = $post->brandName;
                $nestedData[$count]['modelName'] = $post->modelName;
                $nestedData[$count]['spares_brandPicture'] = $post->spares_brandPicture;
                if($post->yearEnd != null){
                    $nestedData[$count]['year'] = $post->yearStart."-".$post->yearEnd;
                }else{
                    $nestedData[$count]['year'] = $post->yearStart;
                }
                $nestedData[$count]['modelofcarName'] = $post->modelofcarName;
                $nestedData[$count]['machineSize'] = $post->machineSize;

                //picture
                $option = [
                    'spares_undercarriageId' => $post->spares_undercarriageId,
                    'spares_brandId' => $post->spares_brandId,
                    'brandId' => $post->brandId,
                    'modelId' => $post->modelId,
                    'modelofcarId' => $post->modelofcarId
                ];
                $nestedData[$count]['picture'] = getPictureSpare($option);
                $data[$index] = $nestedData;
                if($count >= 3){
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
        $modelId = $this->post("modelId");
        $brandId = $this->post("brandId");
        $modelofcarId = $this->post("modelofcarId");
        $machineSize = $this->post("machineSize");
       
       
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check = $this->spare_undercarriagedatas->data_check_create($spares_brandId,$spares_undercarriageId,$brandId,$modelId,$modelofcarId,$userId);
    
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
        // 'spares_undercarriageDataPicture' => $image,
        'modelId' => $modelId,
        'brandId' => $brandId,
        'modelofcarId' => $modelofcarId,
        'machineSize' => $machineSize
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->spare_undercarriagedatas,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function update_post(){
        $spares_undercarriageDataId = $this->post('spares_undercarriageDateId');
        $spares_brandId = $this->post('spares_brandId');
        $spares_undercarriageId = $this->post('spares_undercarriageId');
        $userId = $this->session->userdata['logged_in']['id'];
        $price = $this->post('price');
        $warranty = $this->post('warranty');
        $warranty_year = $this->post('warranty_year');
        $warranty_distance = $this->post('warranty_distance');
        $modelId = $this->post("modelId");
        $brandId = $this->post("brandId");
        $modelofcarId = $this->post("modelofcarId");
        $machineSize = $this->post("machineSize");
        
       
        $data_check_update = $this->spare_undercarriagedatas->getSpareDatasById($spares_undercarriageDataId);
        $data_check = $this->spare_undercarriagedatas->data_check_update($spares_brandId,$spares_undercarriageId,$brandId,$modelId,$modelofcarId,$userId,$spares_undercarriageDataId);
           
        $data = array(
            'spares_undercarriageDataId' => $spares_undercarriageDataId,
            'spares_brandId' => $spares_brandId,
            'spares_undercarriageId' =>$spares_undercarriageId,
            'update_at' => date('Y-m-d H:i:s',time()),
            'update_by' => $userId,
            'price' => $price,
            'warranty' => $warranty,
            'warranty_year' => $warranty_year,
            'warranty_distance' => $warranty_distance,
            // 'spares_undercarriageDataPicture' => $imageName,
            'modelId' => $modelId,
            'brandId' => $brandId,
            'modelofcarId' => $modelofcarId,
            'machineSize' => $machineSize
        );
        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->spare_undercarriagedatas,
            "image_path" => null,
            "old_image_path" => null
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
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

    function changeStatus_post(){
        $spares_undercarriageDataId = $this->post("spares_undercarriageDataId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->spare_undercarriagedatas->getSpareDatasById($spares_undercarriageDataId);
        $data = array(
            'spares_undercarriageDataId' => $spares_undercarriageDataId,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->spare_undercarriagedatas
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }
}
