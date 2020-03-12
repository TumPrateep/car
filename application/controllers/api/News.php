<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class News extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("newss");
    }

    function createnews_post(){

        $config['upload_path'] = 'public/image/news/';
        $config['allowed_types'] = 'gif|jpg|png';

        $news_title = $this->post("news_title");
        $news_category = $this->post("news_category");
        $news_content = $this->post("news_content");
        $end_date = $this->post("end_date");
        $img = $this->post("news_picture");

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
            $data_check = $this->newss->checkNewss($news_title, $news_category);
                $data = array(
                    "news_id"=> null,
                    "news_picture"=> $imageName,
                    "news_title"=> $news_title,
                    "news_category"=> $news_category,
                    "news_content"=> $news_content,
                    "end_date"=> $end_date,
                    "status"=> 1,
                    "create_at" => date('Y-m-d H:i:s',time()),
                    "create_by" => $userId
                );
                $option = [
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->newss,
                    "image_path" => $file
                ];
        
                $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    
            }
        }

        function searchnews_post(){
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
            
            $totalData = $this->newss->allnews_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('news_title')) && empty($this->post('status'))){            
                $posts = $this->newss->allnews($limit,$start,$order,$dir);
            }else{
                $search = $this->post('news_title');
                $status = $this->post('status');
                $posts =  $this->newss->allnews_search($limit,$start,$search,$order,$dir,$status);
                $totalFiltered = $this->newss->allnews_search_count($search,$status);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $nestedData['news_id'] = $post->news_id;
                    $nestedData['news_picture'] = $post->news_picture;
                    $nestedData['news_title'] = $post->news_title;
                    $nestedData['news_category'] = $post->news_category;
                    $nestedData['end_date'] = $post->end_date;
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

        function deleteNews_get(){
            $news_id = $this->get('news_id');
            $data_check = $this->newss->getnewsById($news_id);
        
            $option = [
                "data_check_delete" => $data_check,
                "data" => $news_id,
                "model" => $this->newss,
                "image_path" => "public/image/news/" . $data_check->news_picture,
            ];
    
            $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
        }

        function getNewsById_post(){
            $news_id = $this->post('news_id');
            $data_check = $this->newss->getnewsFromId($news_id);
            
            $option = [
                "data_check" => $data_check
            ];
    
            $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
        }

        function updateNews_post(){

            $config['upload_path'] = 'public/image/news/';
            $config['allowed_types'] = 'gif|jpg|png';
            $userId = $this->session->userdata['logged_in']['id'];

            $news_id = $this->post("news_id");
            $news_title = $this->post("news_title");
            $news_category = $this->post("news_category");
            $news_content = $this->post("news_content");
            $end_date = $this->post("end_date");
            $img = $this->post("news_picture");

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
                $data_check_update = $this->newss->getnewsById($news_id);
                $data_check = $this->newss->wherenot($news_id, $news_title, $news_category);
                $userId = $this->session->userdata['logged_in']['id'];
                $data = array(
                    "news_id"=> $news_id,
                    "news_picture"=> $imageName,
                    "news_title"=> $news_title,
                    "news_category"=> $news_category,
                    "news_content"=> $news_content,
                    "end_date"=> $end_date,
                    "status"=> 1,
                    'update_at' => date('Y-m-d H:i:s',time()),
                    'update_by' => $userId
                );
                $oldImage = null;
                if($data_check_update != null){
                    $oldImage = $config['upload_path'].$data_check_update->news_picture;
                }
    
                $option = [
                    "data_check_update" => $data_check_update,
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->newss,
                    "image_path" => $file,
                    "old_image_path" => $oldImage,
                ];
        
                $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    
            }  
            
        }

        function changeStatus_post(){
            $news_id = $this->post("news_id");
            $status = $this->post("status");
            // $userId = $this->session->userdata['logged_in']['id'];
            if($status == 1){
                $status = 2;
            }else{
                $status = 1;
            }
            $data_check_update = $this->newss->getnewsById($news_id);
            $data = array(
                'news_id' => $news_id,
                'status' => $status
            );
            $option = [
                "data_check_update" => $data_check_update,
                "data" => $data,
                "model" => $this->newss
            ];
    
            $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
        }

}