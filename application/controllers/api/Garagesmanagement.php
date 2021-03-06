<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Garagesmanagement extends BD_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("garage");
        $this->load->model("garagesmanagements");
        $this->load->model("location");
    }

    public function search_post()
    {
        $columns = array(
            0 => null, //search หาเฉพาะค่า พวกลำดับกับรูปไม่ต้อง
            1 => null,
            2 => 'garage.garageName',
            3 => null,
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->garage->allData_count();

        $totalFiltered = $totalData;
        // order กับ col หน้า models มันอันเดี่ยวกัน อย่าลืม ตั้งให้มันตรงๆๆกัน
        if (empty($this->post('garageName')) && empty($this->post('status'))) // คืออยากรู้ว่า อิหาค่าไร รับ id มาก็หา id รับ name ก็หา name
        {
            $posts = $this->garage->allData($limit, $start, $order, $dir);
        } else {
            $search = $this->post('garageName');
            $status = $this->post('status');
            $posts = $this->garage->Garagesmanagement_search($limit, $start, $search, $order, $dir, $status);
            $totalFiltered = $this->garage->Garagesmanagement_search_count($search, $status);
        }

        $data = array();
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $nestedData['garageId'] = $post->garageId;
                $nestedData['picture'] = $post->picture;
                $nestedData['garageName'] = $post->garageName;
                $nestedData['titleName'] = $post->titleName;
                $nestedData['firstName'] = $post->firstName;
                $nestedData['lastName'] = $post->lastName;
                $nestedData['phone'] = $post->phone;
                $nestedData['status'] = $post->status;
                $nestedData['view'] = $post->view;

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($this->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );

        $this->set_response($json_data);
    }

    public function getUpdate_post()
    {
        $garageId = $this->post('garageId');
        $data_check = $this->garage->getGaragesmanagementById($garageId);

        $option = [
            "data_check" => $data_check,
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post()
    {

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
        $latitude = $this->post('latitude');
        $longtitude = $this->post('longtitude');
        $userId = $this->session->userdata['logged_in']['id'];
        $group = $this->post('group');

        $mechanicId = $this->post('mechanicId');
        $phone1 = $this->post('phone1');
        $titlename = $this->post('titleName');
        $firstname = $this->post('firstname');
        $lastname = $this->post('lastname');

        $data_check_update = $this->garage->getUpdate($garageId);
        $data_check = $this->garage->data_check_update($garageId, $garageName);
        $data['garagedata'] = array(
            'garageId' => $garageId,
            'garageName' => $garageName,
            'phone' => $phone,
            'hno' => $hno,
            'alley' => $alley,
            'road' => $road,
            'village' => $village,
            'provinceId' => $provinceId,
            'districtId' => $districtId,
            'subdistrictId' => $subdistrictId,
            'latitude' => $latitude,
            'longtitude' => $longtitude,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s', time()),
            'group' => $group,
        );
        $data['mechanicdata'] = array(
            'mechanicId' => $mechanicId,
            'phone' => $phone1,
            'titleName' => $titlename,
            'firstName' => $firstname,
            'lastName' => $lastname,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s', time()),
            'garageId' => $garageId,
            'status' => 1,
            'activeFlag' => 1,
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->garagesmanagements,
            "image_path" => null,
            "old_image_path" => null,
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    public function getusers_post()
    {

        $garageId = $this->post('garageId');
        $garage = $this->garage->getbygarageuser($garageId);
        if ($garage != null) {
            $result = $this->garage->getshowuser($garageId);
            // var_dump($result);
            // exit();
            if ($result != null) {
                $result->provinceName = $this->location->getProvinceNameByProvinceId($result->provinceId);
                $result->districtName = $this->location->getDistrictNameByDistrictId($result->districtId);
                $result->subdistrictName = $this->location->getSubDistrictBySubDistrictId($result->subdistrictId);
            }
            $result->create_at = REST_Controller::DateThai($result->create_at);
            $output["profile"] = $result;
            $output["other"] = $this->garage->getGaragesmanagementById($garageId);
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        } else {
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }

    }

    public function changeStatus_post()
    {
        $garageId = $this->post("garageId");
        $view = $this->post("view");
        if ($view == 1) {
            $view = 2;
        } else {
            $view = 1;
        }

        $data_check_update = $this->garage->getGaragesmanagementById($garageId);
        $data = array(
            'garageId' => $garageId,
            'view' => $view,
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->garage,
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}