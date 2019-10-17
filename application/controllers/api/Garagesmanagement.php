<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Garagesmanagement extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("garage");
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

        $totalData = $this->garage->allData_count();

        $totalFiltered = $totalData; 
        // order กับ col หน้า models มันอันเดี่ยวกัน อย่าลืม ตั้งให้มันตรงๆๆกัน
        if(empty($this->post('garageName'))  && empty($this->post('status')))// คืออยากรู้ว่า อิหาค่าไร รับ id มาก็หา id รับ name ก็หา name
        {            
            $posts = $this->garage->allData($limit,$start,$order,$dir);
        } else {
            $search = $this->post('garageName'); 
            $status = $this->post('status');
            $posts =  $this->garage->Garagesmanagement_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->garage->Garagesmanagement_search_count($search,$status);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['garageId'] = $post->garageId;
                $nestedData['picture'] = $post->picture;
                $nestedData['garageName'] = $post->garageName;
                $nestedData['titleName'] = $post->titleName;
                $nestedData['firstName'] = $post->firstName;
                $nestedData['lastName'] = $post->lastName;
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
        $garageId = $this->post('garageId');
        $data_check = $this->garage->getGaragesmanagementById($garageId);
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        
        $garageId = $this->post('garageId');
        $garageName = $this->post('garageName');
        $phone = $this->post('phone');
        $hno = $this->post('hno');
        $alley = $this->post('alley');
        $road = $this->post('road');
        $village = $this->post('village');
        $provinceId = $this->post('provinceId');
        $districtId = $this->post('districtId');
        $subdistrictId = $this->post('subdistrictId');
        // $titlename = $this->post('titleName');
        // $firstname = $this->post('firstname');
        // $lastname = $this->post('lastname');
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check_update = $this->garage->getUpdate($garageId);
        $data_check = $this->garage->data_check_update($garageId,$garageName);
        $data = array(
            'garageId' => $garageId,
            'garageName' => $garageName,
            'phone' => $phone,
            // 'titlename' => $titlename,
            // 'firstname' => $firstname,
            // 'lastname' => $lastname,
            'hno' => $hno,
            'alley' => $alley,
            'road' => $road,
            'village' => $village,
            'provinceId' => $provinceId,
            'districtId' => $districtId,
            'subdistrictId' => $subdistrictId,
            'update_by' => $userId,
            'update_at' =>date('Y-m-d H:i:s',time())
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->garage,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }


}
