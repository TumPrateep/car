<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managepartsshop extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("managepartsshops");
	}
	
	function search_post(){
		$columns = array( 
            0 => null,//search หาเฉพาะค่า พวกลำดับกับรูปไม่ต้อง
            1 => null,
            2 => null, 
            3 => null
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->managepartsshops->allData_count();

        $totalFiltered = $totalData; 
        // order กับ col หน้า models มันอันเดี่ยวกัน อย่าลืม ตั้งให้มันตรงๆๆกัน
        if(empty($this->post('car_accessoriesName'))  && empty($this->post('status')))// คืออยากรู้ว่า อิหาค่าไร รับ id มาก็หา id รับ name ก็หา name
        {            
            $posts = $this->managepartsshops->allData($limit,$start,$order,$dir);
        } else {
            $search = $this->post('car_accessoriesName'); 
            $status = $this->post('status');
            $posts =  $this->managepartsshops->sparesUndercarriage_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->managepartsshops->sparesUndercarriage_search_count($search,$status);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['car_accessoriesId'] = $post->car_accessoriesId;
                $nestedData['car_accessoriesName'] = $post->car_accessoriesName;
                $nestedData['name'] = $post->name;
                $nestedData['phone'] = $post->phone;
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

    function getUpdate_post(){
        $car_accessoriesId = $this->post('car_accessoriesId');
        $data_check = $this->managepartsshops->getSparepictireById($car_accessoriesId);
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function deleteSparesPictire_get(){
        $spare_pictire_id = $this->get('spare_pictire_id');
        $config['upload_path'] = 'public/image/spare_picture/';

        $data_check = $this->sparespictures->getSparepictireById($spare_pictire_id);
            
        $option = [
            "data_check_delete" => $data_check,
            "data" => $spare_pictire_id,
            "model" => $this->sparespictures,
            "image_path" => $config['upload_path'].$data_check->picture
        ];
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        //$this->load->model("spareproductdata");
        $spare_pictire_id = $this->post('spare_pictire_id');
        $spares_undercarriageId = $this->post("spares_undercarriageId");
        $spares_brandId = $this->post("spares_brandId");

        $config['upload_path'] = 'public/image/spare_picture/';
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
