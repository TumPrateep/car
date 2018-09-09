<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Triebrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("triebrands");
    }
    
    function createBrand_post(){
        $config['upload_path'] = 'public/image/tire_brand/';
        $img = $this->post("tire_brandPicture");
        $img = str_replace('data:image/png;base64,', '', $img);
	    $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imageName = uniqid().'.png';
        $file = $config['upload_path']. '/'. $imageName;
        $success = file_put_contents($file, $data);
        $tire_brandName = $this->post("tire_brandName");
        
        $userId = $this->session->userdata['logged_in']['id'];
        if (!$success){
            $output["message"] = REST_Controller::MSG_ERROR;
			$this->set_response($output, REST_Controller::HTTP_OK);
		}
		else
		{
            $data_check = $this->triebrands->data_check_create($tire_brandName);
            $data = array(
                "tire_brandId"=> null,
                "tire_brandName"=> $tire_brandName,
                "tire_brandPicture"=> $imageName,
                "status"=> 1,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId,
                "activeFlag" => 1
            );
            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->triebrands,
                "image_path" => $file
            ];
    
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    
		}
    }
    function deletetriebrand_get(){
        $tire_brandId = $this->get('tire_brandId');
        $config['upload_path'] = 'public/image/tire_brand/';
        $data_check = $this->triebrands->getTireBrandById($tire_brandId);
        $imagePath = $config['upload_path'].$data_check->tire_brandPicture;
        $option = [
            "data_check_delete" => $data_check,
            "data" => $tire_brandId,
            "model" => $this->triebrands,
            "image_path" => $imagePath
        ];
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function updateTireBrand_post(){
        $config['upload_path'] = 'public/image/tire_brand/';
        $userId = $this->session->userdata['logged_in']['id'];
        $tire_brandId = $this->post("tire_brandId");
        $img = $this->post("tire_brandPicture");
        $tire_brandName = $this->post("tire_brandName");
       
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
            $data_check_update = $this->triebrands->getTireBrandById($tire_brandId);
            $data_check = $this->triebrands->wherenot($tire_brandId,$tire_brandName);
            $userId = $this->session->userdata['logged_in']['id'];
            $data = array(
                'tire_brandId' =>$tire_brandId,
                "tire_brandName"=> $tire_brandName,
                "tire_brandPicture"=> $imageName,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId,
                "activeFlag" => 1
            );
            $oldImage = null;
            if($data_check_update != null){
                $oldImage = $config['upload_path'].$data_check_update->tire_brandPicture;
            }

            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->triebrands,
                "image_path" => $file,
                "old_image_path" => $oldImage
            ];
    
            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);

        }	
    }

    function searchTirebrand_post(){
        $columns = array( 
            0 => null,
            1 => null, 
            2 =>'tire_brandName',
            3 =>'status'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->triebrands->allTirebrand_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('tire_brandName')) && empty($this->post('status')))
        {            
            $posts = $this->triebrands->allTirebrand($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('tire_brandName');
            $status = $this->post('status');
            $posts =  $this->triebrands->tirebrand_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->triebrands->tirebrand_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['tire_brandId'] = $post->tire_brandId;
                $nestedData['tire_brandName'] = $post->tire_brandName;
                $nestedData['tire_brandPicture'] = $post->tire_brandPicture;
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
    
    function getTireBrandforupdate_post(){
        $tire_brandId = $this->post('tire_brandId');
        $data_check = $this->triebrands->getUpdate($tire_brandId);
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $tire_brandId = $this->post("tire_brandId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->triebrands->getTireBrandById($tire_brandId);
        $data = array(
            'tire_brandId' => $tire_brandId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->triebrands
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }
}