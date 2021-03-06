<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mechanic extends BD_Controller {
    function __construct()
    {
        parent::__construct();
        $this->auth();
        $this->load->model("mechanics");
    }
    function deleteMechanic_get(){
        $mechanicId = $this->get('mechanicId');
        $data_check = $this->mechanics->getMechanicsById($mechanicId);        
        $option = [
            "data_check_delete" => $data_check,
            "data" => $mechanicId,
            "model" => $this->mechanics,
            "image_path" => null
        ];
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }
    function createMechanic_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $mechanicId = $this->post("mechanicId");
        // $titleName = $this->post("titleName");
        $firstName = $this->post("firstname");
        $lastName = $this->post("lastname");
        $nickName = $this->post("nickName");
        // $job = $this->post("job");
        $exp       = $this->post("exp");
        $phone     = $this->post("phone");
        $idCard = $this->post("personalid");
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $data_check = $this->mechanics->data_check_create($idCard,$garageId);

        $่jopsum = "";

		$job1 = $this->post('job1');
		$่jopsum .= (isset($job1) ? 1 : 0 );
		
		$job2 = $this->post('job2');
		$่jopsum .= (isset($job2) ? 1 : 0 );
		
		$job3 = $this->post('job3');
		$่jopsum .= (isset($job3) ? 1 : 0 );

		$job = $่jopsum;
        // $skill = $this->post("skill");
        $config['upload_path'] = 'public/image/mechanic/';
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
        }
        //$idcard = $this->post("idcard");
        $data =array(
            'mechanicId' => null,
            'titleName' => null,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'nickName' => $nickName,
            'exp' => $exp,
            'phone' => $phone,
            'personalid' => $idCard,
            'status' => 1,
            'activeFlag' => 1,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'garageId' => $garageId,
            'job' => $job,
            "picture"=> $imageName,
            "status"=>2,
            //'rols' => 2
            // 'skill' => $skill
        );
        // $data_check = $this->mechanics->data_check_create($firstName);
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->mechanics,
            "image_path" => $file
        ];
        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function createMechanicowner_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $mechanicId = $this->post("mechanicId");
        // $titleName = $this->post("titleName");
        $firstName = $this->post("firstname");
        $lastName = $this->post("lastname");
        $nickName = $this->post("nickName");
        // $job = $this->post("job");
        $exp       = $this->post("exp");
        $phone     = $this->post("phone");
        $idCard = $this->post("personalid");
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $data_check = $this->mechanics->data_check_create($idCard,$garageId);

        $่jopsum = "";

		$job1 = $this->post('job1');
		$่jopsum .= (isset($job1) ? 1 : 0 );
		
		$job2 = $this->post('job2');
		$่jopsum .= (isset($job2) ? 1 : 0 );
		
		$job3 = $this->post('job3');
		$่jopsum .= (isset($job3) ? 1 : 0 );

		$job = $่jopsum;
        // $skill = $this->post("skill");
        $config['upload_path'] = 'public/image/mechanic/';
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
        }
        //$idcard = $this->post("idcard");
        $data =array(
            'mechanicId' => null,
            'titleName' => null,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'nickName' => $nickName,
            'exp' => $exp,
            'phone' => $phone,
            'personalid' => $idCard,
            'status' => 1,
            'activeFlag' => 1,
            'create_by' => $userId,
            'create_at' => date('Y-m-d H:i:s',time()),
            'garageId' => $garageId,
            'job' => $job,
            "picture"=> $imageName,
            "status"=>1,
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->mechanics,
            "image_path" => $file
        ];
        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function searchMechanic_post(){

        $columns = array( 
            0 => 'firstname'
        );
        $garageId = $this->session->userdata['logged_in']['garageId'];

        // var_dump($this->session->userdata['logged_in']);
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $totalData = $this->mechanics->allmechanics_count($garageId);
        $totalFiltered = $totalData; 
        if(empty($this->post('firstName'))&& empty($this->post('skill')))
        {            
            $posts = $this->mechanics->allmechanics($limit,$start,$order,$dir,$garageId);
        }
        else {
            $firstname = $this->post('firstName'); 
            // $brandId = $this->post('skill');
            $posts =  $this->mechanics->mechanics_search($limit,$start,$order,$dir,$firstname,$garageId);
            $totalFiltered = $this->mechanics->mechanics_search_count($firstname,$garageId);
        }
        $data = array();
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
            foreach ($posts as $post)
            {
                
                $nestedData[$count]['mechanicId'] = $post->mechanicId;
                $nestedData[$count]['tire_dataId'] = $post->titleName;
                $nestedData[$count]['firstName'] = $post->firstName;
                $nestedData[$count]['lastName'] = $post->lastName;
                $nestedData[$count]['titleName'] = $post->titleName;  
                $nestedData[$count]['phone'] = $post->phone;
                $nestedData[$count]['personalid'] = $post->personalid;
                $nestedData[$count]['nickName'] = $post->nickName;
                $nestedData[$count]['exp'] = $post->exp;
                $nestedData[$count]['job'] = $post->job;
                $nestedData[$count]['picture'] = $post->picture;
                $data[$index] = $nestedData;
                if($count >= 3){
                    $count = -1;
                    $index++;
                    $nestedData = [];
                }
                
                $count++;

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

    function updateMechanic_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $config['upload_path'] = 'public/image/mechanic/';
        $mechanicId = $this->post("mechanicId");
        $firstName = $this->post("firstname");
        $lastName = $this->post("lastname");
        $nickName = $this->post("nickName");
        $exp       = $this->post("exp");
        $phone     = $this->post("phone");
        $idCard = $this->post("personalid");
        // $job = $this->post("job");

        $่jopsum = "";

		$job1 = $this->post('job1');
		$่jopsum .= (isset($job1) ? 1 : 0 );
		
		$job2 = $this->post('job2');
		$่jopsum .= (isset($job2) ? 1 : 0 );
		
		$job3 = $this->post('job3');
		$่jopsum .= (isset($job3) ? 1 : 0 );

		$job = $่jopsum;

        $img = $this->post("picture");
        $success = true;
        $file = null;
        $imageName = null; 
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $data_check = $this->mechanics->data_check_create($idCard,$garageId);
        $this->load->model("mechanics");
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
        $data_check_update = $this->mechanics->getMechanicsById($mechanicId);
        $data_check = $this->mechanics->data_check_update($mechanicId,$firstName,$idCard,$garageId);
        $data = array(
            'mechanicId' => $mechanicId,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'nickName' => $nickName,
            'exp' => $exp,
            'phone' => $phone,
            'personalid' => $idCard,
            'update_by' => $userId,
            'update_at' => date('Y-m-d H:i:s',time()),
            'garageId' => $garageId,
            'job' => $job,
            "picture"=> $imageName,
            "status"=>2
        );
        $oldImage = null;
        if($data_check_update != null){
            $oldImage = $config['upload_path'].$data_check_update->picture;
        }

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->mechanics,
            "image_path" => $file,
            "old_image_path" => $oldImage
        ];
        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }
    }

    function updateOwner_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $config['upload_path'] = 'public/image/mechanic/';
        $mechanicId = $this->post("mechanicId");
        $titleName = $this->post("titleName");
        $firstName = $this->post("firstName");
        $lastName = $this->post("lastName");
        $nickName = $this->post("nickName");
        $exp       = $this->post("exp");
        $phone     = $this->post("phone");
        $idCard = $this->post("personalid");
        $job = $this->post("job");
        $img = $this->post("Picture");
        $success = true;
        $file = null;
        $imageName = null; 
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $this->load->model("mechanics");
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
            $data_check = $this->mechanics->data_check_create($idCard,$garageId);
            if(empty($mechanicId)){
                $data =array(
                    'mechanicId' => null,
                    'titleName' => $titleName,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'nickName' => $nickName,
                    'exp' => $exp,
                    'phone' => $phone,
                    'personalid' => $idCard,
                    'status' => 1,
                    'activeFlag' => 1,
                    'create_by' => $userId,
                    'create_at' => date('Y-m-d H:i:s',time()),
                    'garageId' => $garageId,
                    'job' => $job,
                    "picture"=> $imageName,
                    "status"=>1,
                );
                $option = [
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->mechanics,
                    "image_path" => $file
                ];
                $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

            }else{
                $data_check_update = $this->mechanics->getMechanicsById($mechanicId);
                $data_check = $this->mechanics->data_check_update($mechanicId,$firstName,$idCard,$garageId);
                $data = array(
                    'mechanicId' => $mechanicId,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'nickName' => $nickName,
                    'titleName' => $titleName,
                    'exp' => $exp,
                    'phone' => $phone,
                    // 'skill' => $skill,
                    'personalid' => $idCard,
                    'update_by' => $userId,
                    'update_at' => date('Y-m-d H:i:s',time()),
                    'garageId' => $garageId,
                    'job' => $job,
                    "picture"=> $imageName,
                    "status"=>1
                );
                $oldImage = null;
                if($data_check_update != null){
                    $oldImage = $config['upload_path'].$data_check_update->picture;
                }

                $option = [
                    "data_check_update" => $data_check_update,
                    "data_check" => $data_check,
                    "data" => $data,
                    "model" => $this->mechanics,
                    "image_path" => $file,
                    "old_image_path" => $oldImage
                ];
                $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
            }
        
        }
    }

    function getMechanic_post(){
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $mechanicId = $this->post('mechanicId');
        $data_check = $this->mechanics->getMechanicsById($mechanicId);
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    function getOwner_get(){
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $owner = $this->mechanics->getOwnerGarage($garageId);
        $option = [
            "data" => $owner
        ];
        $this->set_response($option, REST_Controller::HTTP_OK);
    }
}