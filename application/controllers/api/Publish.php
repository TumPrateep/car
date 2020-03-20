<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Publish extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("advertisements");
    }

    function createadvertisement_post(){

        $config['upload_path'] = 'public/image/publish/';
        $config['allowed_types'] = 'gif|jpg|png';
        $advertisement_name = $this->post("advertisement_name");
        $img = $this->post("advertisement_picture");
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
            $data_check = $this->advertisements->checkadvertisements($advertisement_name);
                $data = array(
                    "advertisement_id"=> null,
                    "advertisement_picture"=> $imageName,
                    "advertisement_name"=> $advertisement_name,
                    "status"=> 2,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId
                );
                $option = [
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->advertisements,
                    "image_path" => $file
                ];
        
                $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    
            }
    }

    function searchadvertisement_post(){
        $columns = array( 
            0 => null,
            1 => null, 
            2 => null,
            3 => null,
            4 => null
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        
        $totalData = $this->advertisements->alladvertisement_count();
        $totalFiltered = $totalData; 
        if(empty($this->post('advertisement_name')) && empty($this->post('status'))){            
            $posts = $this->advertisements->alladvertisement($limit,$start,$order,$dir);
        }else{
            $search = $this->post('advertisement_name');
            $status = $this->post('status');
            $posts =  $this->advertisements->alladvertisement_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->advertisements->alladvertisement_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['advertisement_id'] = $post->advertisement_id;
                $nestedData['advertisement_picture'] = $post->advertisement_picture;
                $nestedData['advertisement_name'] = $post->advertisement_name;
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

    function deleteadvertisement_get(){
        $advertisement_id = $this->get('advertisement_id');
        $data_check = $this->advertisements->getadvertisementById($advertisement_id);
    
        $option = [
            "data_check_delete" => $data_check,
            "data" => $advertisement_id,
            "model" => $this->advertisements,
            "image_path" => "public/image/publish/" . $data_check->advertisement_picture,
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    function getadvertisementsById_post(){
        $advertisement_id = $this->post('advertisement_id');
        $data_check = $this->advertisements->getadvertisementFromId($advertisement_id);
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function getadvertisement_picture_post(){
        $data_check = $this->advertisements->advertisement_picture();
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function updateadvertisements_post(){

        $config['upload_path'] = 'public/image/publish/';
        $config['allowed_types'] = 'gif|jpg|png';
        $userId = $this->session->userdata['logged_in']['id'];

        $advertisement_id = $this->post("advertisement_id");
        $advertisement_name = $this->post("advertisement_name");
        $img = $this->post("advertisement_picture");

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
            $data_check_update = $this->advertisements->getadvertisementById($advertisement_id);
            $data_check = $this->advertisements->wherenot($advertisement_id, $advertisement_name);
            $userId = $this->session->userdata['logged_in']['id'];
            $data = array(
                "advertisement_id"=> $advertisement_id,
                "advertisement_picture"=> $imageName,
                "advertisement_name"=> $advertisement_name,
                "status"=> 2,
                'update_at' => date('Y-m-d H:i:s',time()),
                'update_by' => $userId
            );
            $oldImage = null;
            if($data_check_update != null){
                $oldImage = $config['upload_path'].$data_check_update->advertisement_picture;
            }

            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->advertisements,
                "image_path" => $file,
                "old_image_path" => $oldImage,
            ];
    
            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);

        }  
        
    }

    function changeStatus_post(){
        $advertisement_id = $this->post("advertisement_id");
        $status = $this->post("status");
        // $userId = $this->session->userdata['logged_in']['id'];
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->advertisements->getadvertisementByIdForstatusTwo($advertisement_id);
        if($status == 1){
            $is_check = $this->advertisements->getadvertisementByIdForstatusOne();
            // var_dump($is_check);
            if(!empty($is_check)){
                $data_check_update = null;
                $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }
        $data = array(
            'advertisement_id' => $advertisement_id,
            'status' => $status
        );
        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->advertisements
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}