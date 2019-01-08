<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Mechanic extends BD_Controller {
    function __construct()
    {
        parent::__construct();
       // $this->auth();
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
        $firstName = $this->post("firstName");
        $lastName = $this->post("lastName");
        $exp       = $this->post("exp");
        $phone     = $this->post("phone");
        $personalid = $this->post("personalid");
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $data_check = $this->mechanics->data_check_create($personalid,$garageId);
        // $skill = $this->post("skill");
        //$idcard = $this->post("idcard");
        $data =array(
            'mechanicId' => null,
            'titleName' => null,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'exp' => $exp,
            'phone' => $phone,
            'personalid' => $personalid,
            'status' => 1,
            'activeFlag' => 1,
            'create_by' => $userId,
            'update_by' => null,
            'garageId' => $garageId
            // 'skill' => $skill,
            //'rols' => 2
            //'idcard' => $idcard
        );
        // $data_check = $this->mechanics->data_check_create($firstName);
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->mechanics,
            "image_path" => null
        ];
        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }
    function searchMechanic_post(){
            $columns = array( 
                0 => null,
                1 => 'firstName',
                2 => 'skill',
                3 => 'phone',
                4 => 'rols'
            );
            $limit = $this->post('length');
            $start = $this->post('start');
            $order = $columns[$this->post('order')[0]['column']];
            $dir = $this->post('order')[0]['dir'];
            $totalData = $this->mechanics->allmechanics_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('firstName'))&& empty($this->post('skill')))
            {            
                $posts = $this->mechanics->allmechanics($limit,$start,$order,$dir);
            }
            else {
                $firstname = $this->post('firstName'); 
                $skill = $this->post('skill');
                $posts =  $this->mechanics->mechanics_search($limit,$start,$order,$dir,$firstname,$skill);
                $totalFiltered = $this->mechanics->mechanics_search_count($firstname,$skill);
            }
            $data = array();
            if(!empty($posts))
            {
                foreach ($posts as $post)
                {
                    $nestedData['mechanicId'] = $post->mechanicId;
                    $nestedData['firstName'] = $post->firstName;
                    $nestedData['lastName'] = $post->lastName;
                    $nestedData['phone'] = $post->phone;
                    $nestedData['personalid'] = $post->personalid;
                
                   
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
    function updateMechanic_post(){
        $userId = $this->session->userdata['logged_in']['id'];
        $mechanicId = $this->post("mechanicId");
        $firstName = $this->post("firstName");
        $lastName = $this->post("lastName");
        $exp       = $this->post("exp");
        $phone     = $this->post("phone");
        $personalid = $this->post("personalid");
        $garageId = $this->session->userdata['logged_in']['garageId'];
        $data_check = $this->mechanics->data_check_create($personalid,$garageId);
        //$userId = $this->session->userdata['logged_in']['id'];
        $this->load->model("mechanics");
        $data_check_update = $this->mechanics->getMechanicsById($mechanicId);
        $data_check = $this->mechanics->data_check_update($mechanicId,$firstName,$personalid,$garageId);
        $data = array(
            'mechanicId' => $mechanicId,
            'titleName' => null,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'exp' => $exp,
            'phone' => $phone,
            'personalid' => $personalid,
            'status' => 1,
            'activeFlag' => 1,
            'create_by' => $userId,
            'update_by' => null,
            'garageId' => $garageId
        );
        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->mechanics,
            "image_path" => null,
            "old_image_path" => null
        ];
        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }
    function getMechanic_post(){
        $mechanicId = $this->post('mechanicId');
        $data_check = $this->mechanics->getMechanicsById($mechanicId);
        $option = [
            "data_check" => $data_check
        ];
        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
}