<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorbrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatorbrands");
    }
    function searchLubricatorbrand_post(){
            $columns = array( 
                0 => null,
                1 => null, 
                2 =>'lubricator_brandName',
                3 =>'status'
            );
            $limit = $this->post('length');
            $start = $this->post('start');
            $order = $columns[$this->post('order')[0]['column']];
            $dir = $this->post('order')[0]['dir'];
            
            $totalData = $this->lubricatorbrands->allLubricatorbrand_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('lubricator_brandName')) && empty($this->post('status'))){            
                $posts = $this->lubricatorbrands->allLubricatorbrand($limit,$start,$order,$dir);
            }else{
                $search = $this->post('lubricator_brandName');
                $status = $this->post('status');
                $posts =  $this->lubricatorbrands->lubricatorbrand_search($limit,$start,$search,$order,$dir,$status);
                $totalFiltered = $this->lubricatorbrands->lubricatorbrand_search_count($search,$status);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $nestedData['lubricator_brandId'] = $post->lubricator_brandId;
                    $nestedData['lubricator_brandName'] = $post->lubricator_brandName;
                    $nestedData['lubricator_brandPicture'] = $post->lubricator_brandPicture;
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
        
        function changeStatus_post(){
            $lubricator_brandId = $this->post("lubricator_brandId");
            $status = $this->post("status");
            if($status == 1){
                $status = 2;
            }else{
                $status = 1;
            }
            $data_check_update = $this->lubricatorbrands->getlubricatorById($lubricator_brandId);
            $data = array(
                'lubricator_brandId' => $lubricator_brandId,
                'status' => $status,
                'activeFlag' => 1
            );
            $option = [
                "data_check_update" => $data_check_update,
                "data" => $data,
                "model" => $this->lubricatorbrands
            ];
    
            $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
        }
            

        function createLubricatorbrands_post(){
        $config['upload_path'] = 'public/image/lubricator_brand/';
        $config['allowed_types'] = 'gif|jpg|png';
        $lubricator_brandName = $this->post("lubricator_brandName");
        $img = $this->post("lubricator_brandPicture");
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
            $data_check = $this->lubricatorbrands->checklubricatorbrand($lubricator_brandName);
                $data = array(
                    "lubricator_brandId"=> null,
                    "lubricator_brandPicture"=> $imageName,
                    "lubricator_brandName"=> $lubricator_brandName,
                    "status"=> 1,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId,
                    "activeFlag" => 1
                );
                $option = [
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->lubricatorbrands,
                    "image_path" => $file
                ];
        
                $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    
            }
        }

        function updateLubricatorbrands_post(){
            $config['upload_path'] = 'public/image/lubricator_brand/';
            $config['allowed_types'] = 'gif|jpg|png';
            $userId = $this->session->userdata['logged_in']['id'];
            $lubricator_brandName = $this->post("lubricator_brandName");
            $lubricator_brandId = $this->post("lubricator_brandId");
            $img = $this->post("lubricator_brandPicture");
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
                $data_check_update = $this->lubricatorbrands->getlubricatorById($lubricator_brandId);
                $data_check = $this->lubricatorbrands->wherenot($lubricator_brandId,$lubricator_brandName);
                $userId = $this->session->userdata['logged_in']['id'];
                $data = array(
                    "lubricator_brandId"=> $lubricator_brandId,
                    "lubricator_brandPicture"=> $imageName,
                    "lubricator_brandName"=> $lubricator_brandName,
                    "status"=> 1,
                    'update_at' => date('Y-m-d H:i:s',time()),
                    'update_by' => $userId,
                    "activeFlag" => 1
                );
                $oldImage = null;
                if($data_check_update != null){
                    $oldImage = $config['upload_path'].$data_check_update->lubricator_brandPicture;
                }
    
                $option = [
                    "data_check_update" => $data_check_update,
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->lubricatorbrands,
                    "image_path" => $file,
                    "old_image_path" => $oldImage,
                ];
        
                $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    
            }  
            
        }

        function deleteLubricatorbrands_get(){
            $lubricator_brandId = $this->get('lubricator_brandId');
            $data_check = $this->lubricatorbrands->getlubricatorById($lubricator_brandId);
        
            $option = [
                "data_check_delete" => $data_check,
                "data" => $lubricator_brandId,
                "model" => $this->lubricatorbrands,
                "image_path" => null
            ];
    
            $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
        }

        function getLubricatorbrandsById_post(){
            $lubricator_brandId = $this->post('lubricator_brandId');
            $data_check = $this->lubricatorbrands->geTubricatorbrandFromId($lubricator_brandId);
            
            $option = [
                "data_check" => $data_check
            ];
    
            $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
        }

        function getAllLubricatorbrand_get(){
            $data_check = $this->lubricatorbrands->getAllLubricatorBrand();
            
            $option = [
                "data_check" => $data_check
            ];
    
            $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
        }

}