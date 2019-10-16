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

    // function deleteSparesPictire_get(){
    //     $spare_pictire_id = $this->get('spare_pictire_id');
    //     $config['upload_path'] = 'public/image/spare_picture/';

    //     $data_check = $this->sparespictures->getSparepictireById($spare_pictire_id);
            
    //     $option = [
    //         "data_check_delete" => $data_check,
    //         "data" => $spare_pictire_id,
    //         "model" => $this->sparespictures,
    //         "image_path" => $config['upload_path'].$data_check->picture
    //     ];
    //     $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    // }

    public function update_post(){
        
        $car_accessoriesId = $this->post('car_accessoriesId');
        $car_accessoriesName = $this->post('car_accessoriesName');
        $phone = $this->post('car_accessories_phone');
        $titlename = $this->post('titlename');
        $firstname = $this->post('firstname');
        $lastname = $this->post('lastname');
        $hno = $this->post('hno');
        $alley = $this->post('alley');
        $road = $this->post('road');
        $village = $this->post('village');
        $userId = $this->session->userdata['logged_in']['id'];
        $data_check_update = $this->managepartsshops->getUpdate($car_accessoriesId);
        $data_check = $this->managepartsshops->data_check_update($car_accessoriesId,$car_accessoriesName);
        $data = array(
            'car_accessoriesId' => $car_accessoriesId,
            'car_accessoriesName' => $car_accessoriesName,
            'phone' => $phone,
            'titlename' => $titlename,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'hno' => $hno,
            'alley' => $alley,
            'road' => $road,
            'village' => $village,
            'update_by' => $userId,
            'update_at' =>date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->managepartsshops,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }


}
