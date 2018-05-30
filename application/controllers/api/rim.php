<?php
// ขอบยาง นะ 

defined('BASEPATH') OR exit('No direct script access allowed');

class rim extends BD_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

    }

    function deleteRim_get(){
        $rimId = $this->get('rimId');
        $this->load->model("rims");
        $rim = $this->rims->getrimbyId($rimId);
        if($rim != null){
            $isDelete = $this->rims->delete($rimId);
            if($isDelete){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["message"] = REST_Controller::MSG_BE_USED;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function createRim_post(){

        $rimName = $this->post("rimName");

        $this->load->model("rims");
        $isCheck = $this->rims->checkrim($rimName);

        if($isCheck){
            $data = array(
                'rimId' => null,
                'rimName' => $rimName,
                'status' => 1
            );
            $result = $this->rims->insert_rim($data);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
            else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }

        }
        else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }


    }

    function searchrim_post(){
        $columns = array( 
            0 => null,
            1 => 'rimName' 
            
            
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $this->load->model("rims");
        $totalData = $this->rims->allrim_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('rimName')))
        {            
            $posts = $this->rims->allrim($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('rimName'); 

            $posts =  $this->rims->rim_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->rims->rim_search_count($search);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {

                $nestedData['rimId'] = $post->rimId;
                $nestedData['rimName'] = $post->rimName;

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
}