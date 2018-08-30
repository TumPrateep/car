<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Machinetype extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("machinetypes");
    }

    function search_post(){
        $columns = array( 
            0 => null,
            1 =>'machinetype',
            2 =>'gear'
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $modelofcar_modelofcarId = $this->post("modelofcar_modelofcarId");
        
        $totalData = $this->machinetypes->allMachinetype_count($modelofcar_modelofcarId);
        $totalFiltered = $totalData; 
        if(empty($this->post('machinetype')) && empty($this->post('status')))
        {            
            $posts = $this->machinetypes->allMachinetype($limit,$start,$order,$dir,$modelofcar_modelofcarId);
        }
        else {
            $search = $this->post('machinetype');
            $status = $this->post('status');
            $posts =  $this->machinetypes->machinetype_search($limit,$start,$search,$order,$dir,$status,$modelofcar_modelofcarId);
            $totalFiltered = $this->machinetypes->machinetype_search_count($search,$status,$modelofcar_modelofcarId);
        }
        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['machinetypeId'] = $post->machinetypeId;
                $nestedData['machinetype'] = $post->machinetype;
                $nestedData['gear'] = $post->gear;
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

    function create_post(){

        $machinetype = $this->post("machinetype");
        $modelofcar_modelofcarId = $this->post("modelofcar_modelofcarId");
        $gear = $this->post("gear");
        $userId = $this->session->userdata['logged_in']['id'];

        $data_check = $this->machinetypes->data_check_create($machinetype,$modelofcar_modelofcarId,$gear);
        $data = array(
            'machinetypeId' => null,
            'machinetype' => $machinetype,
            'modelofcar_modelofcarId' => $modelofcar_modelofcarId,
            'gear' => $gear,
            'status' => 1,
            'activeFlag' => 1,
            'create_at' => date('Y-m-d H:i:s',time()),
            'create_by' => $userId
        );
        $option = [
            "data_check" => $data_check,
            "data" => $data,
            "model" => $this->machinetypes,
        ];

        $this->set_response(decision_create($option), REST_Controller::HTTP_OK);
    }

    function changeStatus_post(){
        $machinetypeId = $this->post('machinetypeId');
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->machinetypes->getmachinetypebyId($machinetypeId);
        $data = array(
            'machinetypeId' => $machinetypeId,
            'status' => $status,
            'activeFlag' => 1
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->machinetypes
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }
    
    function delete_get(){
        $machinetypeId = $this->get('machinetypeId');
        $machinetype = $this->machinetypes->getmachinetypebyId($machinetypeId);

        $data_check = $this->machinetypes->getmachinetypebyId($machinetypeId);
        $option = [
            "data_check_delete" => $data_check,
            "data" => $machinetypeId,
            "model" => $this->machinetypess,
            "image_path" => null
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }


}