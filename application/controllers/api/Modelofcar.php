<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Modelofcar extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // $this->auth();
    }
    public function create_post(){
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $machineCode = $this->post('$machineCode');
        $bodyCode = $this->post('$machineCode');
        $modelofcarName = $this->post('modelofcarName');
        $userId = $this->session->userdata['logged_in']['id'];
        $this->load->model("modelofcars");
        $isCheck = $this->modelofcars->checkduplicate($modelofcarName,$modelId,$brandId);
        if($isCheck){
            $data = array(
                'modelofcarId' => null,
                'modelofcarName' => $modelofcarName,
                'brandId' => $brandId,
                'modelId' => $modelId,
                'create_by' => $userId,
                'machineCode' => $machineCode,
                'bodyCode' => $bodyCode,
                'create_at' =>date('Y-m-d H:i:s',time()),
                'status' => 1,
                'activeFlag' => 1
            );
            $result = $this->modelofcars->insert($data);
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_CREATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }
        }else{
            $output["status"] = false;
            $output["message"] = REST_Controller::MSG_CREATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    public function update_post(){
        $brandId = $this->post('brandId');
        $modelId = $this->post('modelId');
        $machineCode = $this->post('$machineCode');
        $bodyCode = $this->post('$machineCode');
        $modelofcarName = $this->post('modelofcarName');
        $userId = $this->session->userdata['logged_in']['id'];
        $modelofcarId = $this->post('modelofcarId');
        $this->load->model("modelofcars");
        $isCheck = $this->modelofcars->checkduplicateforupdate($modelofcarName,$modelId,$brandId,$modelofcarId);
        if($isCheck){
            $data = array(
                'modelofcarId' => $modelofcarId,
                'brandId' => $brandId,
                'modelId' => $modelId,
                'modelofcarName' => $modelofcarName,
                'status' => 1,
                'activeFlag' => 1,
                'machineCode' => $machineCode,
                'bodyCode' => $bodyCode,
                'update_by' => $userId,
                'update_at' =>date('Y-m-d H:i:s',time())
            );
            $result = $this->modelofcars->update($data,$modelofcarId);
            $output["status"] = $result;
            if($result){
                $output["message"] = REST_Controller::MSG_SUCCESS;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }else{
                $output["status"] = false;
                $output["message"] = REST_Controller::MSG_NOT_UPDATE;
                $this->set_response($output, REST_Controller::HTTP_OK);
            }

        }else{
            $output["message"] = REST_Controller::MSG_UPDATE_DUPLICATE;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

    function delete_get(){
        $modelofcarId = $this->get('modelofcarId');
        $this->load->model("modelofcars");
        $isCheck = $this->modelofcars->Check($modelofcarId);
        if($isCheck){
            $result = $this->modelofcars->delete($modelofcarId);
            if($result){
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

<<<<<<< HEAD
    function search_post(){
        $columns = array( 
            0 => null,
            1 => 'modelofcarName',
            2 => 'bodyCode',
            3 => 'machineCode',
            4 => 'status'  
        );
        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];
        $this->load->model("modelofcars");
        $totalData = $this->modelofcars->all_modelofcar_count($modelofcarId);
        $totalFiltered = $totalData; 
        if(empty($this->post('modelofcarName'))&& empty($this->post('status')))
        {            
            $posts = $this->modelofcars->allmodelofcars($limit,$start,$order,$dir);
        }
        else {
            $search = $this->post('modelofcarName'); 
            $status = $this->post('status');
            $posts =  $this->modelofcars->modelofcar_search($limit,$start,$search,$order,$dir,$status);
            $totalFiltered = $this->modelofcars->modelofcar_search_count($search,$status);
        }
        $data = array();
        if(!empty($posts))
        {
=======
    function searchModelofcar_post(){
        $columns = array( 
            0 =>null, 
            1 =>'modelofcarName',
            2 => 'yearStart',
            3 => 'status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $column;
        $dir = $sort;

        $modelofcarId = $this->post("modelofcarId");
        $this->load->model("modelofcars");
        $totalData = $this->modelofcars->all_modelofcar_count($modelofcarId);

        $totalFiltered = $totalData; 

        if(empty($this->post('modelofcarName'))  && empty($this->post('status')))
        {            
            $posts = $this->modelofcars->allmodelofcars($limit,$start,$order,$dir, $modelofcarId);
        }
        else {
            $search = $this->post('modelofcarName');
            $status = $this->post('status'); 

            $posts =  $this->modelofcars->modelofcar_search($limit,$start,$search,$order,$dir, $modelofcarId, $status);

            $totalFiltered = $this->modelofcars->modelofcar_search_count($search, $modelofcarId, $status);
        }
        $data = array();        
        if(!empty($posts))
        {
            $index = 0;
            $count = 0;
>>>>>>> 4117c2abfba7e5e1e51a59c63f9b20bde389046e
            foreach ($posts as $post)
            {
                $nestedData['modelofcarId'] = $post->modelofcarId;
                $nestedData['modelofcarName'] = $post->modelofcarName;
                $nestedData['brandId'] = $post->brandId;
                $nestedData['modelId'] = $post->modelId;
<<<<<<< HEAD
                $nestedData['machineCode'] = $post->machineCode;
                $nestedData['bodyCode'] = $post->bodyCode;
=======
                $nestedData['yearStart'] = $post->yearStart;
                $nestedData['yearEnd'] = $post->yearEnd;
>>>>>>> 4117c2abfba7e5e1e51a59c63f9b20bde389046e
                $nestedData['status'] = $post->status;
                $data[] = $nestedData;
            }
        }
<<<<<<< HEAD
=======

>>>>>>> 4117c2abfba7e5e1e51a59c63f9b20bde389046e
        $json_data = array(
            "draw"            => intval($this->post('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );
<<<<<<< HEAD
        $this->set_response($json_data);
    }

=======

        $this->set_response($json_data);
    }

    function changeStatusModelofcar_post(){
        $modelofcarId = $this->post("modelofcarId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }
        $data = array(
            'status' => $status,
            'activeFlag' => 1
        );
        $this->load->model("modelofcars");
        $result = $this->modelofcars->updateStatus($modelofcarId,$data);
        if($result){
            $output["message"] = REST_Controller::MSG_SUCCESS;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }else{
            $output["message"] = REST_Controller::MSG_BE_DELETED;
            $this->set_response($output, REST_Controller::HTTP_OK);
        }
    }

>>>>>>> 4117c2abfba7e5e1e51a59c63f9b20bde389046e
}