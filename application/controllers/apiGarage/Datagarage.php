<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
class Datagarage extends BD_Controller {

    function __construct()
    {
        parent::__construct();
       // $this->auth();
        $this->load->model("mechanic");
    }

    function deleteMechaniccreates_get(){
        $mechanicId = $this->get('mechanicId');

        $data_check = $this->mechanic->getMechanicById($mechanicId);        
        $option = [
            "data_check_delete" => $data_check,
            "data" => $mechanicId,
            "model" => $this->mechanic,
            "image_path" => null
        ];
        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }


    function createMechaniccreates_post(){
       // $mechanicId = $this->post("mechanicId");
        $firstName = $this->post("firstName");
        $lastName = $this->post("lastName");
        $exp       = $this->post("exp");
        $phone     = $this->post("phone");
        $personalid = $this->post("personalid");
        $skill = $this->post("skill");
        //$idcard = $this->post("idcard");

        $data =array(

            'mechanicId' => null,
            'titleName' => null,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'exp' => $exp,
            'phone' => $phone,
            'personalid' => $personalid,
            'skill' => $skill
            //'idcard' => $idcard
        );

        $data_check = $this->mechanic->data_check_create($firstName);

        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->mechanic,
            "image_path" => null
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function searchMechaniccreates_post(){

            $columns = array( 
                0 => null,
                1 => 'firstName',
                2 => null,
                3 => 'phone' 
            );
            $limit = $this->post('length');
            $start = $this->post('start');
            $order = $columns[$this->post('order')[0]['column']];
            $dir = $this->post('order')[0]['dir'];
            $totalData = $this->mechanic->allmechanic_count();
            $totalFiltered = $totalData; 
            if(empty($this->post('firstName'))&& empty($this->post('phone')))
            {            
                $posts = $this->mechanic->allmechanic($limit,$start,$order,$dir);
            }
            else {
                $search = $this->post('firstName'); 
                $status = $this->post('phone');
                $posts =  $this->mechanic->mechanic_search($limit,$start,$search,$order,$dir,$status);
                $totalFiltered = $this->mechanic->mechanic_search_count($search,$status);
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
                    $nestedData['skill'] = $post->skill;
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

    function updateMechaniccreates_post(){

        $mechanicId = $this->post('mechanicId');
        $firstName = $this->post('firstName');
        $lastName = $this->post('lastName');
        $exp = $this->post('exp');
        $phone = $this->post('phone');
        $personalid = $this->post('personalid');
        $skill = $this->post('skill');
        //$userId = $this->session->userdata['logged_in']['id'];

        $this->load->model("mechanic");
        $data_check_update = $this->mechanic->getMechanicById($mechanicId);
        $data_check = $this->mechanic->data_check_update($mechanicId,$firstName);
        $data = array(
            'mechanicId' => $mechanicId,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'exp' => $exp,
            'phone' => $phone,
            'personalid' => $personalid,
            'skill' => $skill
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->mechanic,
            "image_path" => null,
            "old_image_path" => null
        ];

        $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
    }

    function getMechaniccreates_post(){

        $mechanicId = $this->post('mechanicId');

        $data_check = $this->mechanic->getMechanicById($mechanicId);
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

}