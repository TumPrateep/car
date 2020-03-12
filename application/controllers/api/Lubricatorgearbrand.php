<?php
//ยี่ห้อยาง นะ
defined('BASEPATH') OR exit('No direct script access allowed');
class Lubricatorgearbrand extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatorgearbrands");
    }

    function createlubricatorgearbrands_post(){

        $config['upload_path'] = 'public/image/lubricator_brand_gear/';
        $config['allowed_types'] = 'gif|jpg|png';
        $lubricator_gear_brandName = $this->post("lubricator_gear_brandName");
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
            $data_check = $this->lubricatorgearbrands->checklubricatorgearbrands($lubricator_gear_brandName);
                $data = array(
                    "gear_brandId"=> null,
                    "gear_picture"=> $imageName,
                    "gear_brandName"=> $lubricator_gear_brandName,
                    "status"=> 1,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId,
                    "activeFlag" => 1
                );
                $option = [
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->lubricatorgearbrands,
                    "image_path" => $file
                ];
        
                $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    
            }
        }

        function searchlubricatorgearbrands_post(){
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
            
            $totalData = $this->lubricatorgearbrands->allLubricatorgearbrands_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('lubricator_brandName')) && empty($this->post('status'))){            
                $posts = $this->lubricatorgearbrands->allLubricatorgearbrands($limit,$start,$order,$dir);
            }else{
                $search = $this->post('lubricator_brandName');
                $status = $this->post('status');
                $posts =  $this->lubricatorgearbrands->lubricatorgearbrands_search($limit,$start,$search,$order,$dir,$status);
                $totalFiltered = $this->lubricatorgearbrands->lubricatorgearbrands_search_count($search,$status);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $nestedData['lubricator_brandId'] = $post->gear_brandId;
                    $nestedData['lubricator_brandName'] = $post->gear_brandName;
                    $nestedData['lubricator_brandPicture'] = $post->gear_picture;
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

        function deleteLubricatorgearbrands_get(){
            $gear_brandId = $this->get('lubricator_brandId');
            $data_check = $this->lubricatorgearbrands->getlubricatorgearbrandsById($gear_brandId);
        
            $option = [
                "data_check_delete" => $data_check,
                "data" => $gear_brandId,
                "model" => $this->lubricatorgearbrands,
                "image_path" => "public/image/lubricator_brand_gear/" . $data_check->gear_picture
            ];
    
            $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
        }

        function getLubricatorgearbrandsById_post(){
            $gear_brandId = $this->post('lubricator_brandId');
            $data_check = $this->lubricatorgearbrands->getlubricatorgearbrandsFromId($gear_brandId);
            
            $option = [
                "data_check" => $data_check
            ];
    
            $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
        }

        function updateLubricatorgearbrands_post(){

            $config['upload_path'] = 'public/image/lubricator_brand_gear/';
            $config['allowed_types'] = 'gif|jpg|png';
            $userId = $this->session->userdata['logged_in']['id'];
            $lubricator_gear_brandName = $this->post("lubricator_gear_brandName");
            $gear_brandId = $this->post("lubricator_brandId");
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
                $data_check_update = $this->lubricatorgearbrands->getlubricatorgearbrandsById($gear_brandId);
                $data_check = $this->lubricatorgearbrands->wherenot($gear_brandId, $lubricator_gear_brandName);
                $userId = $this->session->userdata['logged_in']['id'];
                $data = array(
                    "gear_brandId"=> $gear_brandId,
                    "gear_picture"=> $imageName,
                    "gear_brandName"=> $lubricator_gear_brandName,
                    "status"=> 1,
                    'update_at' => date('Y-m-d H:i:s',time()),
                    'update_by' => $userId,
                    "activeFlag" => 1
                );
                $oldImage = null;
                if($data_check_update != null){
                    $oldImage = $config['upload_path'].$data_check_update->gear_picture;
                }
    
                $option = [
                    "data_check_update" => $data_check_update,
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->lubricatorgearbrands,
                    "image_path" => $file,
                    "old_image_path" => $oldImage,
                ];
        
                $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    
            }  
            
        }

        function changeStatus_post(){
            $gear_brandId = $this->post("lubricator_brandId");
            $status = $this->post("status");
            if($status == 1){
                $status = 2;
            }else{
                $status = 1;
            }
            $data_check_update = $this->lubricatorgearbrands->getlubricatorgearbrandsById($gear_brandId);
            $data = array(
                'gear_brandId' => $gear_brandId,
                'status' => $status,
                'activeFlag' => 1
            );
            $option = [
                "data_check_update" => $data_check_update,
                "data" => $data,
                "model" => $this->lubricatorgearbrands
            ];
    
            $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
        }

        ////
        

        function getAllLubricatorbrand_get(){
            $data_check = $this->lubricatorbrands->getAllLubricatorBrand();
            
            $option = [
                "data_check" => $data_check
            ];
    
            $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
        }

}