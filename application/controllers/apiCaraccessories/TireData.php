<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class TireData extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    public function delete_get(){
        $tire_dataId = $this->get('tire_dataId');
        $this->load->model("TireDatas");
        $tire = $this->TireDatas->getireById($tire_dataId);
        $userId = $this->session->userdata['logged_in']['id'];
        if($tire != null){
        
            $isDelete = $this->TireDatas->delete($tire_dataId);
            if($isDelete){
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

    public function create_post(){
        $rimId = $this->post('rimId');
        $tire_sizeId = $this->post('tire_sizeId');
        $tire_brandId = $this->post('tire_brandId');
        $tire_modelId = $this->post('tire_modelId');
        $price = $this->post('price');
        $warranty = $this->post('warranty');
        $warranty_year = $this->post('warranty_year');
        $warranty_distance = $this->post('warranty_distance');
        $can_change = $this->post('can_change');
        $userId = $this->session->userdata['logged_in']['id'];
        $car_accessoriesId = $userId;
        $config['upload_path'] = 'public/image/tirebranddata/';

        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        // $config['overwrite'] = TRUE;
        // $config['encrypt_name'] = TRUE;
        // $config['remove_spaces'] = TRUE;
        // $this->load->library('upload', $config);

        $this->load->model("TireDatas");
        // $userId = $this->session->userdata['logged_in']['id'];
        $img = $this->post('tire_picture');
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
            $isDuplicated = $this->TireDatas->checkduplicated($tire_brandId,$tire_modelId,$tire_sizeId,$rimId,$car_accessoriesId);
            if($isDuplicated){
                unlink($file);
                $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $data = array(
                    'tire_dataId' => null,
                    'tire_brandId' => $tire_brandId,
                    'tire_modelId' => $tire_modelId,
                    'tire_sizeId' => $tire_sizeId,
                    'rimId' => $rimId,
                    'car_accessoriesId' => $car_accessoriesId,
                    'tire_picture' => $image,
                    'status' => 1,
                    'activeFlag' => 1,
                    'create_by' => $userId,
                    'create_at'=>date('Y-m-d H:i:s',time()),
                    'price' => $price,
                    'warranty' => $warranty,
                    'warranty_year' => $warranty_year,
                    'warranty_distance' => $warranty_distance,
                    'warranty' => $warranty,
                    'can_change' =>$can_change
                );
                $result = $this->TireDatas->insert($data);
                if($result){
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    unlink($file);
                    $output["message"] = REST_Controller::MSG_NOT_CREATE;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }   
            }
        }
    }

    public function update_post(){
        $tire_dataId = $this->post('tire_dataId');
        $rimId = $this->post('rimId');
        $tire_sizeId = $this->post('tire_sizeId');
        $tire_brandId = $this->post('tire_brandId');
        $tire_modelId = $this->post('tire_modelId');
        $price = $this->post('price');
        $warranty = $this->post('warrnty');
        $warranty_year = $this->post('warranty_year');
        $warranty_distance = $this->post('warranty_distance');
        $can_change = $this->post('can_change');
        $userId = $this->session->userdata['logged_in']['id'];
        $car_accessoriesId = $userId;
        $config['upload_path'] = 'public/image/tirebranddata/';
        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = '100';
        // $config['max_width']  = '1024';
        // $config['max_height']  = '768';
        // $config['overwrite'] = TRUE;
        // $config['encrypt_name'] = TRUE;
        // $config['remove_spaces'] = TRUE;
        // $this->load->library('upload', $config);

        $this->load->model("TireDatas");
        $userId = $this->session->userdata['logged_in']['id'];

        $img = $this->post('tire_picture');
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
            $isDuplicated = $this->TireDatas->checkduplicatedUpdate($tire_brandId,$tire_modelId,$tire_sizeId,$rimId,$car_accessoriesId,$tire_dataId);
            if(!$isDuplicated){
                $data = array(
                    'tire_dataId' => $tire_dataId,
                    'tire_brandId' => $tire_brandId,
                    'tire_modelId' => $tire_modelId,
                    'tire_sizeId' => $tire_sizeId,
                    'rimId' => $rimId,
                    'car_accessoriesId' => $car_accessoriesId,
                    'status' => 2,
                    'activeFlag' => 2,
                    'update_by' => $userId,
                    'update_at'=>date('Y-m-d H:i:s',time()),
                    'price' => $price,
                    'warranty' => $warranty,
                    'warranty_year' => $warranty_year,
                    'warranty_distance' => $warranty_distance,
                    'warranty' => $warranty,
                    'can_change' =>$can_change
                );
                if(!empty($img)){
                    $data["tire_picture"] = $image;
                }
                
                $result = $this->TireDatas->update($data, $tire_dataId);
                if($result){
                    unlink($config['upload_path'].$oldData->tire_picture);
                    $output["message"] = REST_Controller::MSG_SUCCESS;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }else{
                    unlink($config['upload_path'].$image);
                    $output["status"] = false;
                    $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                    $this->set_response($output, REST_Controller::HTTP_OK);
                }
                
            }else{
                unlink($file);
                $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }
    }

    function getTireData_get(){
        $tire_dataId = $this->get('tire_dataId');
        $this->load->model("TireDatas");
        $tire_data = $this->TireDatas->gettire_dataById($tire_dataId);
        if($tire_data != null){
            $output["data"] = $tire_data;
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }
    function search_post(){
        $column = "tire_brandId";
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

        $this->load->model('TireDatas');
        $totalData = $this->TireDatas->allTire_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('tire_brandId')) && empty($this->post('tire_modelId')) && empty($this->post('rimId')) && empty($this->post('tire_sizeId')) && empty($this->post('price')) &&empty($this->post('can_change')))
        {            
            $posts = $this->TireDatas->allTires($limit,$start,$order,$dir);
        }
        else {
            // $search = $this->post('brandName'); 
            $tire_brandId = $this->post('tire_brandId');
            $tire_modelId = $this->post('tire_modelId');
            $rimId = $this->post('rimId');
            $tire_sizeId = $this->post('tire_sizeId');
            $price = $this->post('price');
            $can_change = $this->post('can_change');
            
            $status = null; 
            $posts =  $this->TireDatas->tireData_search($limit,$start,$order,$dir,$status,$tire_brandId, $tire_modelId, $rimId, $tire_sizeId, $price, $can_change, $can_change);

            $totalFiltered = $this->TireDatas->TireDatas_search_count($tire_brandId, $tire_modelId, $rimId, $tire_sizeId, $price, $can_change, $can_change);
        }

        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['tire_dataId'] = $post->tire_dataId;
                $nestedData[$count]['rimName'] = $post->rimName;
                $nestedData[$count]['tire_size'] = $post->tire_size;
                $nestedData[$count]['tire_modelName'] = $post->tire_modelName;
                $nestedData[$count]['tire_brandName'] = $post->tire_brandName;
                $nestedData[$count]['status'] = $post->status;
                $nestedData[$count]['price'] = $post->price;
                $nestedData[$count]['warranty_year'] = $post->warranty_year;
                $nestedData[$count]['can_change'] = $post->can_change;
                $nestedData[$count]['warranty_distance'] = $post->warranty_distance;
                $nestedData[$count]['activeFlag'] = $post->activeFlag;
                $nestedData[$count]['create_by'] = $post->create_by;
                $nestedData[$count]['warranty'] = $post->warranty;
                $nestedData[$count]['tire_picture'] = $post->tire_picture;
                $nestedData[$count]['tire_brandPicture'] = $post->tire_brandPicture;
                
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

}