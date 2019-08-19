<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sparespicture extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("sparespictures");
	}
	
	function search_post(){
		$columns = array( 
            0 => null,//search หาเฉพาะค่า พวกลำดับกับรูปไม่ต้อง
            1 => null,
            2 => 'spares_undercarriage.spares_undercarriageId', 
            3 => 'spares_brand.spares_brandId'
			// 4 => 'name',
			// 5 => 'spare_product.status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->sparespictures->allData_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('spares_undercarriage.spares_undercarriageId'))  && empty($this->post('spares_brand.spares_brandId')))
        {            
            $posts = $this->sparespictures->allData($limit,$start,$order,$dir);
        } else {
            // $search = $this->post('spares_brandName'); 
            // $status = $this->post('status'); 
            // $posts =  $this->sparesbrand->spares_brand_search($limit,$start,$search,$order,$dir, $status);
            // $totalFiltered = $this->sparesbrand->spares_brand_search_count($search, $status);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['spare_pictire_id'] = $post->spare_pictire_id;
                $nestedData['picture'] = $post->picture;
                $nestedData['spares_undercarriageName'] = $post->spares_undercarriageName;
                $nestedData['spares_brandName'] = $post->spares_brandName;

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
    
    function create_post(){
        $spares_undercarriageId = $this->post("spares_undercarriageId");
        $spares_brandId = $this->post("spares_brandId");

        $userId = $this->session->userdata['logged_in']['id'];
        $config['upload_path'] = 'public/image/sparespicture/';
        $img = $this->post("picture");
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
            $data_check = $this->sparespictures->data_check_create($spares_undercarriageId,$spares_brandId);
            $data = array(
                "spare_pictire_id"=> null,
                "spares_undercarriageId"=> $spares_undercarriageId,
                "spares_brandId"=> $spares_brandId,
                "picture" => $imageName,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId,
            );

            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->sparespictures,
                "image_path" => $file
            ];
    
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

        }

    }

    function getUpdate_post(){
        $spare_pictire_id = $this->post('spare_pictire_id');
        $data_check = $this->sparespictures->getUpdate($spare_pictire_id);
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        //$this->load->model("spareproductdata");
        $spare_pictire_id = $this->post('spare_pictire_id');
        $spares_undercarriageId = $this->post("spares_undercarriageId");
        $spares_brandId = $this->post("spares_brandId");

        $config['upload_path'] = 'public/image/sparespicture/';
        $img = $this->post("picture");
        
        $file = null;
        $success = true;
        $imageName = null;
        $userId = $this->session->userdata['logged_in']['id'];
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
            $data_check_update = $this->sparespictures->getSpareById($spare_pictire_id);
            $data_check = $this->sparespictures->data_check_update($spare_pictire_id,$spares_undercarriageId);

            $data = array(
                'spare_pictire_id' => $spare_pictire_id,
                "spares_undercarriageId"=> $spares_undercarriageId,
                "spares_brandId"=> $spares_brandId,
                "picture" => $imageName,
                'update_by' => $userId,
                'update_at' => date('Y-m-d H:i:s',time())
            );
            $oldImage = null;
            if($data_check_update != null){
                $oldImage = $config['upload_path'].$data_check_update->picture;
            }

            $option = [
                "data_check_update" => $data_check_update,
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->sparespictures,
                "image_path" => $file,
                "old_image_path" => $oldImage,
            ];

            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }
    }
}
