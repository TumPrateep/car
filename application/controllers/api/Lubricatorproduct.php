<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lubricatorproduct extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("lubricatorproductdata");
        $this->load->model("lubricatorbrands");
        $this->load->model("lubricators");
        $this->load->model("lubricatortypes");
        $this->load->model("lubricatortypeformachines");
    }
    
    function search_post(){
		$columns = array( 
            0 => null,
            1 => null,
            2 => 'lubricator_brand.lubricator_brandName', 
            3 => 'lubricator.lubricatorName',
			4 => 'lubricator_number.lubricator_number',
            5 => 'lubricator_number.lubricator_gear',
            6 => 'lubricator_product.status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->lubricatorproductdata->allData_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('status')))
        {            
            $posts = $this->lubricatorproductdata->allData($limit,$start,$order,$dir);
        } else {
        //     $search = $this->post('brandName'); 
        //     $status = $this->post('status'); 

        //     $posts =  $this->brand->brand_search($limit,$start,$search,$order,$dir,$status);

        //     $totalFiltered = $this->brand->brand_search_count($search,$status);
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
                $nestedData['productId'] = $post->productId;
                $nestedData['picture'] = $post->picture;
                $nestedData['lubricator_brandName'] = $post->lubricator_brandName;
                $nestedData['lubricatorName'] = $post->lubricatorName;
                $nestedData['lubricator_number'] = $post->lubricator_number;
                $nestedData['lubricator_gear'] = $post->lubricator_gear;
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
        // $lubricator_brandId = $this->post("lubricator_brandId");
        $lubricatorId = $this->post("lubricatorId");
        // $lubricator_typeId = $this->post("lubricator_typeId");


        $userId = $this->session->userdata['logged_in']['id'];

        $config['upload_path'] = 'public/image/lubricatorproduct/';
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
		}else{
            $data_check = $this->lubricatorproductdata->data_check_create($lubricatorId);
            $data = array(
                // "lubricator_brandId"=> $lubricator_brandId,
                "lubricatorId"=> $lubricatorId,
                // "lubricator_typeId"=> $lubricator_typeId,
                "picture" => $imageName,
                "status"=> 1,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId
            );

            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->lubricatorproductdata,
                "image_path" => $file
            ];
    
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

        }

    }

    function getUpdate_post(){
        $productId = $this->post('productId');
        $data_check = $this->lubricatorproductdata->getUpdate($productId);
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }
    
    public function update_post(){
        $productId = $this->post('productId');
        $lubricatorId = $this->post("lubricatorId");

        $config['upload_path'] = 'public/image/lubricatorproduct/';
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
            $data_check_update = $this->lubricatorproductdata->getProductDataById($productId);
            $data_check = $this->lubricatorproductdata->data_check_update($productId,$lubricatorId);

            $data = array(
                'productId' => $productId,
                'lubricatorId'  => $lubricatorId,
                'picture'  =>  $imageName,
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
                "model" => $this->spareproductdata,
                "image_path" => $file,
                "old_image_path" => $oldImage,
            ];

            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }
    }

    function getAllLubricatorBrand_get(){
        $result = $this->lubricatorbrands->getAllLubricatorBrand();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllLubricator_get(){
        $lubricator_brandId = $this->get("lubricator_brandId");
        $lubricator_gear = $this->get("lubricator_gear");
        $result = $this->lubricatorproductdata->getAllLubricator($lubricator_brandId,$lubricator_gear);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAlllubricatortypeFormachine_get(){
        $result = $this->lubricatortypeformachines->getAlllubricatortypeFormachine();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    
}