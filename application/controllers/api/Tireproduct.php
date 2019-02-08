<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tireproduct extends BD_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->auth();
        $this->load->model("tireproductdata");
        $this->load->model("triebrands");
        $this->load->model("triemodels");
        $this->load->model("triesizes");
        $this->load->model("rims");
	}

    function create_post(){
        $tire_brandId = $this->post("tire_brandId");
        $tire_modelId = $this->post("tire_seriesId");
        $rimId = $this->post("rimId");
        $tire_sizeId = $this->post("tire_sizeId");

        $userId = $this->session->userdata['logged_in']['id'];

        $config['upload_path'] = 'public/image/tireproduct/';
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
            $data_check = $this->tireproductdata->data_check_create($tire_brandId,$tire_modelId,$rimId,$tire_sizeId);
            $data = array(
                "tire_brandId"=> $tire_brandId,
                "tire_modelId"=> $tire_modelId,
                "rimId"=> $rimId,
                "tire_sizeId"=> $tire_sizeId,
                "picture" => $imageName,
                "status"=> 1,
                "create_at" => date('Y-m-d H:i:s',time()),
                "create_by" => $userId
            );

            $option = [
                "data_check" => $data_check,
                "data" => $data,
                "model" => $this->tireproductdata,
                "image_path" => $file
            ];
    
            $this->set_response(decision_create($option), REST_Controller::HTTP_OK);

        }

    }

    function getAllTireBrand_get(){
        
        $result = $this->triebrands->getAllTriebrands();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllTireModel_get(){
        $tire_brandId = $this->get("tire_brandId");
        
        $result = $this->triemodels->getAllTireModelByTireBrandId($tire_brandId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function getAllTireSize_get(){
        $rimId = $this->get("rimId");
        
        $result = $this->triesizes->getAllTireSizeByrimId($rimId);
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }
    function getAllTireRims_get(){
        
        $result = $this->rims->getAllRims();
        $output["data"] = $result;
        $this->set_response($output, REST_Controller::HTTP_OK);
    }

    function search_post(){
		$columns = array( 
            0 => null,
            1 => null,
            2 => 'tire_brand.tire_brandName', 
            3 => 'tire_model.tire_modelName',
            4 => 'tire_size',
            5 => 'spare_product.status'
        );

        $limit = $this->post('length');
        $start = $this->post('start');
        $order = $columns[$this->post('order')[0]['column']];
        $dir = $this->post('order')[0]['dir'];

        $totalData = $this->tireproductdata->allData_count();

        $totalFiltered = $totalData; 

        if(empty($this->post('status')) && empty($this->post('tire_size')))
        {            
            $posts = $this->tireproductdata->allData($limit,$start,$order,$dir);
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
                $nestedData['tire_brandName'] = $post->tire_brandName;
                $nestedData['tire_modelName'] = $post->tire_modelName;
                $nestedData['tire_size'] = $post->tire_size;
                // $nestedData['tire_size'] = $post->tire_size;
                $nestedData['status'] = $post->status;
                $nestedData['picture'] = $post->picture;
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

    
    public function delete_get(){
        $productId = $this->get('productId');
        $data_check = $this->tireproductdata->getProductDataById($productId);

        $option = [
            "data_check_delete" => $data_check,
            "data" => $productId,
            "model" => $this->tireproductdata,
            "image_path" => "public/image/tireproduct/".$data_check->picture
        ];

        $this->set_response(decision_delete($option), REST_Controller::HTTP_OK);
    }

    
    function getUpdate_post(){
        $productId = $this->post('productId');
        $data_check = $this->tireproductdata->getUpdate($productId);
        
        $option = [
            "data_check" => $data_check
        ];

        $this->set_response(decision_getdata($option), REST_Controller::HTTP_OK);
    }

    public function update_post(){
        $productId = $this->post('productId');
        $tire_brandId = $this->post("tire_brandId");
        $tire_modelId = $this->post('tire_seriesId');
        $rimId = $this->post('rimId');
        $tire_sizeId = $this->post('tire_sizeId');
        $config['upload_path'] = 'public/image/tireproduct/';
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
            $data_check_update = $this->tireproductdata->getProductDataById($productId);
            $data_check = $this->tireproductdata->data_check_update($productId,$tire_brandId);

            $data = array(
                'productId' => $productId,
                'tire_brandId'  => $tire_brandId,
                'tire_modelId'  => $tire_modelId,
                'rimId'  => $rimId,
                'tire_sizeId'  => $tire_sizeId,
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
                "model" => $this->tireproductdata,
                "image_path" => $file,
                "old_image_path" => $oldImage,
            ];

            $this->set_response(decision_update($option), REST_Controller::HTTP_OK);
        }
    }

    function changeStatus_post(){
        $productId = $this->post("productId");
        $status = $this->post("status");
        if($status == 1){
            $status = 2;
        }else{
            $status = 1;
        }

        $data_check_update = $this->tireproductdata->getProductDataById($productId);
        $data = array(
            'productId' => $productId,
            'status' => $status
        );

        $option = [
            "data_check_update" => $data_check_update,
            "data" => $data,
            "model" => $this->tireproductdata
        ];

        $this->set_response(decision_update_status($option), REST_Controller::HTTP_OK);
    }

}